<section>
    <header class="mb-6 border-b border-gray-100 pb-4">
        <p class="mt-2 text-sm text-gray-500">
            Cập nhật họ tên và địa chỉ email dùng cho tài khoản của bạn.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="block text-sm font-semibold mb-2 text-gray-700">
                Họ và tên
            </label>
            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:border-transparent"
                style="--tw-ring-color:#405078"
            >
            @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-semibold mb-2 text-gray-700">
                Địa chỉ email
            </label>
            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:border-transparent"
                style="--tw-ring-color:#405078"
            >
            @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 rounded-lg bg-amber-50 p-4 text-sm text-amber-800">
                    Email của bạn chưa được xác minh.

                    <button
                        form="send-verification"
                        class="ml-1 font-semibold underline hover:text-amber-900"
                    >
                        Gửi lại email xác minh
                    </button>
                </div>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 text-sm text-green-600">
                        Đã gửi email xác minh mới đến địa chỉ email của bạn.
                    </p>
                @endif
            @endif
        </div>

        <div class="flex flex-wrap items-center gap-4 pt-2">
            <button
                type="submit"
                class="rounded-lg px-6 py-3 text-sm font-semibold text-white transition hover:opacity-90"
                style="background:#212842"
            >
                Lưu thay đổi
            </button>

            @if (session('status') === 'profile-updated')
                <p class="text-sm font-medium text-green-600">
                    Đã cập nhật thông tin thành công!
                </p>
            @endif
        </div>
    </form>
</section>