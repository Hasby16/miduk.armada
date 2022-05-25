<x-app-layout>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <header class="shadow-lg sticky top-0 bg-white">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Tambah User') }}
                    </h2>
                    <div>
                        <a href="{{ url()->previous() }}"
                            class="inline-flex justify-center py-2 px-4 border border-gray shadow-sm text-sm font-medium rounded-md text-gray focus:outline-none focus:ring-2 focus:ring-offset-2 mr-4">
                            Kembali
                        </a>

                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-4">
                            Simpan
                        </button>

                    </div>
                </div>
        </header>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                <div class="md:grid mt-5 md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Profile Information</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                This information will be displayed publicly so be careful what you create.
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow sm:rounded-md sm:overflow-hidde">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="nama_perusahaan" class="block text-sm font-medium text-gray-700">Nama
                                        Perusahaan</label>
                                    <input type="text" name="nama_perusahaan" id="nama_perusahaan"
                                        autocomplete="nama_perusahaan" value="{{ old('nama_perusahaan') }}"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <x-jet-input-error for="nama_perusahaan" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" name="name" id="name" autocomplete="name"
                                        value="{{ old('name') }}"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <x-jet-input-error for="name" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" name="email" id="email" autocomplete="email"
                                        value="{{ old('email') }}"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <x-jet-input-error for="email" class="mt-2" />
                                </div>

                                <div class="grid grid-cols-6 gap-6">

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="telepon"
                                            class="block text-sm font-medium text-gray-700">Telepon</label>
                                        <input type="tel" name="telepon" id="telepon" autocomplete="telepon"
                                            value="{{ old('telepon') }}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <x-jet-input-error for="telepon" class="mt-2" />
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="role_id"
                                            class="block text-sm font-medium text-gray-700">Role</label>
                                        <select id="role_id" name="role_id" autocomplete="role_id"
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="2">Approval</option>
                                            <option value="3">Customer</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label for="alamat" class="block text-sm font-medium text-gray-700">
                                        Alamat
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="alamat" name="alamat" rows="3"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                            placeholder="alamat for more informations">{{ old('alamat') }}</textarea>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">
                                        Brief address for new user.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <x-jet-section-border />

                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Create Password</h3>
                            <p class="mt-1 text-sm text-gray-600">Ensure this account is using a long, random password
                                to stay secure.
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow sm:rounded-md sm:overflow-hidde">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="password"
                                        class="block text-sm font-medium text-gray-700">Pasword</label>
                                    <input type="password" name="password" id="password" autocomplete="password"
                                        value="{{ old('password') }}"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <x-jet-input-error for="password" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="password_confirmation"
                                        class="block text-sm font-medium text-gray-700">Password Confirmation</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        autocomplete="password_confirmation"
                                        value="{{ old('password_confirmation') }}"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <x-jet-input-error for="password_confirmation" class="mt-2" />
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
