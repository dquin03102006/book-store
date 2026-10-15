namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    // Hiển thị trang thanh toán với dữ liệu giỏ hàng từ Session
    public function index()
    {
        $cart = session()->get('cart', []);
        
        // Dữ liệu mẫu nếu giỏ hàng trống (để test giao diện)
        if (empty($cart)) {
            $cart = [
                1 => [
                    'name' => 'Sách Laravel Cơ Bản',
                    'price' => 150000,
                    'quantity' => 1
                ]
            ];
        }

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('checkout', compact('cart', 'total'));
    }

    // Xử lý lưu đơn hàng
    public function process(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            // Dữ liệu mẫu cho test
            $cart = [
                1 => [
                    'name' => 'Sách Laravel Cơ Bản',
                    'price' => 150000,
                    'quantity' => 1
                ]
            ];
        }

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        DB::beginTransaction();
        try {
            // Tạo đơn hàng mới
            $order = Order::create([
                'user_id' => auth()->id() ?? 1, // Tạm gán ID 1 nếu test nhanh
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'payment_method' => $request->payment_method,
                'total_price' => $total,
                'status' => 'pending',
            ]);

            // Lưu chi tiết sản phẩm đơn hàng
            foreach ($cart as $id => $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            DB::commit();

            // Xóa giỏ hàng sau khi đặt thành công
            session()->forget('cart');

            return redirect()->route('checkout.success', $order->id)
                             ->with('success', 'Đặt hàng thành công!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại!')->withInput();
        }
    }

    // Trang thông báo đặt hàng thành công
    public function success($id)
    {
        $order = Order::with('orderItems')->findOrFail($id);
        return view('order-success', compact('order'));
    }
}
