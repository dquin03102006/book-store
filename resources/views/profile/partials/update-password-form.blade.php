<section>
    <header class="mb-6 border-b border-gray-100 pb-4">
        <p class="mt-2 text-sm text-gray-500">
            Hãy sử dụng mật khẩu đủ mạnh để bảo vệ tài khoản của bạn.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-5">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password"
                   class="block text-sm font-semibold mb-2 text-gray-700">
                Mật khẩu hiện tại
            </label>
            <input
                id="update_password_current_password"
                name="current_password"
                type="password"
                autocomplete="current-password"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:border-transparent"
                style="--tw-ring-color:#405078"
            >
            @if ($errors->updatePassword->has('current_password'))
                <p class="mt-2 text-sm text-red-600">
                    {{ $errors->updatePassword->first('current_password') }}
                </p>
            @endif
        </div>

        <div>
            <label for="update_password_password"
                   class="block text-sm font-semibold mb-2 text-gray-700">
                Mật khẩu mới
            </label>
            <input
                id="update_password_password"
                name="password"
                type="password"
                autocomplete="new-password"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:border-transparent"
                style="--tw-ring-color:#405078"
            >
            @if ($errors->updatePassword->has('password'))
                <p class="mt-2 text-sm text-red-600">
                    {{ $errors->updatePassword->first('password') }}
                </p>
            @endif
        </div>

        <div>
            <label for="update_password_password_confirmation"
                   class="block text-sm font-semibold mb-2 text-gray-700">
                Xác nhận mật khẩu mới
            </label>
            <input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                autocomplete="new-password"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:border-transparent"
                style="--tw-ring-color:#405078"
            >
            @if ($errors->updatePassword->has('password_confirmation'))
                <p class="mt-2 text-sm text-red-600">
                    {{ $errors->updatePassword->first('password_confirmation') }}
                </p>
            @endif
        </div>

        <div class="flex flex-wrap items-center gap-4 pt-2">
            <button
                type="submit"
                class="rounded-lg px-6 py-3 text-sm font-semibold text-white transition hover:opacity-90"
                style="background:#212842"
            >
                Cập nhật mật khẩu
            </button>

            @if (session('status') === 'password-updated')
                <p class="text-sm font-medium text-green-600">
                    Đã cập nhật mật khẩu thành công!
                </p>
            @endif
        </div>
    </form>
</section>