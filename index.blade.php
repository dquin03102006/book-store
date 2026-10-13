<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thanh toán đơn hàng') }}
        </h2>
    </x-slot>

    py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('checkout.process') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf
                <!-- Thông tin giao hàng -->
                <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Thông tin nhận hàng</h3>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Họ tên người nhận</label>
                        <input type="text" name="shipping_name" value="{{ old('shipping_name', Auth::user()->name ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                        <input type="text" name="shipping_phone" value="{{ old('shipping_phone') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Địa chỉ giao hàng</label>
                        <textarea name="shipping_address" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>{{ old('shipping_address') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phương thức thanh toán</label>
                        <div class="space-y-2">
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="payment_method" value="cod" checked class="text-indigo-600 focus:ring-indigo-500">
                                    <span class="ml-2">Thanh toán khi nhận hàng (COD)</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="payment_method" value="vnpay" class="text-indigo-600 focus:ring-indigo-500">
                                    <span class="ml-2">Ví VNPAY / Thẻ ngân hàng nội địa</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tóm tắt giỏ hàng -->
                <div class="bg-white p-6 shadow-sm sm:rounded-lg h-fit">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Đơn hàng của bạn</h3>
                    <div class="divide-y divide-gray-200 mb-4">
                        @foreach($cartItems as $item)
                            <div class="py-2 flex justify-between text-sm">
                                <span>{{ $item->title }} (x{{ $item->quantity }})</span>
                                <span class="font-medium">{{ number_format($item->price * $item->quantity) }} đ</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="border-t border-gray-200 pt-4 flex justify-between font-bold text-lg mb-6">
                        <span>Tổng cộng:</span>
                        <span class="text-indigo-600">{{ number_format($total) }} đ</span>
                    </div>

                    <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition font-medium text-center">
                        Đặt hàng ngay
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>