<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

abstract class UserManagementController extends Controller
{
    protected string $role;

    protected string $title;

    protected string $prefix;

    public function index(Request $request)
    {
        $users = User::where('role', $this->role)
            ->withCount('orders')
            ->withSum('orders', 'total_amount')
            ->when($request->q, fn ($query, $q) => $query->where(
                fn ($w) => $w->where('name', 'like', "%$q%")->orWhere('email', 'like', "%$q%")
            ))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.users.index', $this->data(['users' => $users]));
    }

    public function create()
    {
        return view('admin.users.form', $this->data(['user' => new User]));
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        $user = new User($data);
        $user->role = $this->role;
        $user->save();

        return redirect()->route("{$this->prefix}.index")->with('success', 'Thêm thành công.');
    }

    public function show(User $user)
    {
        $this->ensureRole($user);

        $orders = $user->orders()->latest()->get();

        return view('admin.users.show', $this->data(['user' => $user, 'orders' => $orders]));
    }

    public function edit(User $user)
    {
        $this->ensureRole($user);

        return view('admin.users.form', $this->data(['user' => $user]));
    }

    public function update(Request $request, User $user)
    {
        $this->ensureRole($user);

        $data = $request->validate($this->rules($user));

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route("{$this->prefix}.index")->with('success', 'Cập nhật thành công.');
    }

    public function destroy(Request $request, User $user)
    {
        $this->ensureRole($user);

        if ($user->id === $request->user()->id) {
            return back()->with('error', 'Không thể tự xoá tài khoản của mình.');
        }

        if ($user->orders()->exists()) {
            return back()->with('error', 'Không thể xoá tài khoản đã có đơn hàng.');
        }

        $user->delete();

        return redirect()->route("{$this->prefix}.index")->with('success', 'Đã xoá tài khoản.');
    }

    private function rules(?User $user = null): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user?->id)],
            'password' => [$user ? 'nullable' : 'required', 'string', 'min:8', 'confirmed'],
        ];
    }

    private function ensureRole(User $user): void
    {
        abort_unless($user->role === $this->role, 404);
    }

    private function data(array $extra): array
    {
        return $extra + [
            'role' => $this->role,
            'title' => $this->title,
            'prefix' => $this->prefix,
        ];
    }
}
