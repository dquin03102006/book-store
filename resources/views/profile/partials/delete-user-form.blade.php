<section class="space-y-5">
    

    <button
        type="button"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="rounded-lg px-5 py-3 text-sm font-semibold text-white transition hover:opacity-90"
        style="background:#b42318"
    >
        Xóa tài khoản
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-xl font-bold text-red-700">
                Xác nhận xóa tài khoản
            </h2>

            <p class="mt-3 text-sm leading-6 text-gray-600">
                Bạn có chắc chắn muốn xóa tài khoản không? Thao tác này không thể hoàn tác.
                Vui lòng nhập mật khẩu hiện tại để xác nhận.
            </p>

            <div class="mt-5">
                <label for="delete_account_password"
                       class="mb-2 block text-sm font-semibold text-gray-700">
                    Mật khẩu hiện tại
                </label>

                <input
                    id="delete_account_password"
                    name="password"
                    type="password"
                    required
                    autocomplete="current-password"
                    placeholder="Nhập mật khẩu để xác nhận"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:outline-none focus:ring-2"
                >

                @if ($errors->userDeletion->has('password'))
                    <p class="mt-2 text-sm text-red-600">
                        {{ $errors->userDeletion->first('password') }}
                    </p>
                @endif
            </div>

            <div class="mt-6 flex flex-wrap justify-end gap-3">
                <button
                    type="button"
                    x-on:click="$dispatch('close')"
                    class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-50"
                >
                    Hủy
                </button>

                <button
                    type="submit"
                    class="rounded-lg px-5 py-2.5 text-sm font-semibold text-white hover:opacity-90"
                    style="background:#b42318"
                >
                    Xác nhận xóa
                </button>
            </div>
        </form>
    </x-modal>
</section>
