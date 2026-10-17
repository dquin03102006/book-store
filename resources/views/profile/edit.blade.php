<x-app-layout>
    <div class="min-h-screen py-8" style="background:#f5f3ef">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Tiêu đề --}}
            <div class="mb-7">
                <a href="{{ url('/') }}"
                   class="text-sm hover:underline"
                   style="color:#405078">
                    ← Quay về trang chủ
                </a>

                <h1 class="text-2xl sm:text-3xl font-bold mt-3"
                    style="color:#212842">
                    Tài khoản của tôi
                </h1>

                <p class="mt-1 text-gray-500">
                    Quản lý thông tin cá nhân và tài khoản của bạn.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                {{-- Menu bên trái --}}
                <aside class="md:col-span-1">
                    <div class="bg-white rounded-xl shadow-sm p-4">
                        <div class="pb-4 mb-3 border-b">
                            <div class="font-semibold text-lg"
                                 style="color:#212842">
                                {{ Auth::user()->name }}
                            </div>
                            <div class="text-sm text-gray-500 break-all">
                                {{ Auth::user()->email }}
                            </div>
                        </div>

                        <nav class="space-y-1">
                            <a href="#thong-tin"
                               class="flex items-center gap-3 px-3 py-3 rounded-lg hover:bg-gray-100"
                               style="color:#212842">
                                <span>Thông tin cá nhân</span>
                            </a>

                            <a href="{{ route('orders.index') }}"
                               class="flex items-center gap-3 px-3 py-3 rounded-lg hover:bg-gray-100"
                               style="color:#212842">
                                <span>Đơn hàng của tôi</span>
                            </a>

                            <a href="#mat-khau"
                               class="flex items-center gap-3 px-3 py-3 rounded-lg hover:bg-gray-100"
                               style="color:#212842">
                                <span>Đổi mật khẩu</span>
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full text-left px-3 py-3 rounded-lg hover:bg-red-50 text-red-600">
                                    Đăng xuất
                                </button>
                            </form>
                        </nav>
                    </div>
                </aside>

                {{-- Nội dung bên phải --}}
                <main class="md:col-span-3 space-y-6">

                    <section id="thong-tin"
                             class="bg-white rounded-xl shadow-sm p-5 sm:p-7">
                        <h2 class="text-xl font-semibold mb-5"
                            style="color:#212842">
                            Thông tin cá nhân
                        </h2>

                        @include('profile.partials.update-profile-information-form')
                    </section>

                    <section id="mat-khau"
                             class="bg-white rounded-xl shadow-sm p-5 sm:p-7">
                        <h2 class="text-xl font-semibold mb-5"
                            style="color:#212842">
                            Đổi mật khẩu
                        </h2>

                        @include('profile.partials.update-password-form')
                    </section>

                    <section class="bg-white rounded-xl shadow-sm p-5 sm:p-7">
                        <h2 class="text-xl font-semibold mb-2 text-red-600">
                            Xóa tài khoản
                        </h2>

                        <p class="text-sm text-gray-500 mb-5">
                            Thao tác này có thể khiến bạn mất quyền truy cập tài khoản.
                            Hãy cân nhắc trước khi thực hiện.
                        </p>

                        @include('profile.partials.delete-user-form')
                    </section>

                </main>
            </div>
        </div>
    </div>
</x-app-layout>