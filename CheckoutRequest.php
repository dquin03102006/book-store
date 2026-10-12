<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'shipping_name'    => 'required|string|max:100',
            'shipping_phone'   => ['required', 'regex:/^(0|\+84)[0-9]{9}$/'],
            'shipping_address' => 'required|string|max:255',
            'payment_method'   => 'required|in:cod,bank',
            'coupon_code'      => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'shipping_name.required'    => 'Vui lòng nhập tên người nhận.',
            'shipping_phone.required'   => 'Vui lòng nhập số điện thoại.',
            'shipping_phone.regex'      => 'Số điện thoại không hợp lệ.',
            'shipping_address.required' => 'Vui lòng nhập địa chỉ giao hàng.',
            'payment_method.required'   => 'Vui lòng chọn phương thức thanh toán.',
            'payment_method.in'         => 'Phương thức thanh toán không hợp lệ.',
        ];
    }
}
