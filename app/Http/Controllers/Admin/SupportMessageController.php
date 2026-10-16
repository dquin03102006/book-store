<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupportMessage;
use Illuminate\Http\Request;

class SupportMessageController extends Controller
{
    public function index()
    {
        $messages = SupportMessage::latest()->paginate(10);

        return view('admin.support-messages.index', compact('messages'));
    }

    public function updateStatus(Request $request, $id)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,processing,resolved',
        ]);

        $message = SupportMessage::findOrFail($id);
        $message->update($data);

        return redirect()
            ->route('admin.support-messages.index')
            ->with('success', 'Cập nhật trạng thái yêu cầu thành công!');
    }
}