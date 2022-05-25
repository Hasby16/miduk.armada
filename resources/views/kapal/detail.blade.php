<x-app-layout>
    <div x-data="{showModal: false}">
        <div x-show="showModal" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
            aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Konfirmasi ajukan sewa
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Silahkan klik tombol di bawah ini untuk mengajukan sewa sesuai dengan kebutuhan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                        @if ($kapal->sewa_jam)
                            <a href="{{ route('kapal.sewa.create', ['kapal' => $kapal, 'pages' => 'jam']) }}"
                                class="w-full inline-flex justify-center rounded-md border border-gray shadow-sm px-4 py-2 text-base font-medium text-gray focus:outline-none focus:ring-2 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
                                Per jam
                            </a>
                        @endif


                        @if ($kapal->sewa_hari)
                            <a href="{{ route('kapal.sewa.create', ['kapal' => $kapal, 'pages' => 'harian']) }}"
                                class="w-full inline-flex justify-center rounded-md border border-gray shadow-sm px-4 py-2 text-base font-medium text-gray focus:outline-none focus:ring-2 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
                                Harian
                            </a>
                        @endif

                        @if ($kapal->sewa_sekali_jalan)
                            <a href="{{ route('kapal.sewa.create', ['kapal' => $kapal, 'pages' => 'sekali_jalan']) }}"
                                class="w-full inline-flex justify-center rounded-md border border-gray shadow-sm px-4 py-2 text-base font-medium text-gray focus:outline-none focus:ring-2 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
                                Sekali Jalan
                            </a>
                        @endif

                        <button type="button" @click="showModal = !showModal"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <header class="shadow-lg sticky top-0 bg-white">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Detail kapal') }}
                    </h2>
                    <div>
                        <a href="{{ route('kapal.index') }}"
                            class="inline-flex justify-center py-2 px-4 border border-gray shadow-sm text-sm font-medium rounded-md text-gray focus:outline-none focus:ring-2 focus:ring-offset-2 mr-4">
                            Kembali
                        </a>

                        <button type="button" @click="showModal = !showModal"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-4">
                            Ajukan sewa
                        </button>

                    </div>
                </div>
        </header>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            <div class="md:grid mt-5 md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1 mr-12">
                    <div class="px-4 sm:px-0">

                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 rounded-md">
                            <div class="space-y-1 text-center">
                                <div class="flex flex-wrap justify-center mb-6">

                                    <img src="{{ asset('storage/' . $kapal->image_url) }}"
                                        class="img-preview max-w-sm h-auto shadow-lg rounded-lg" alt="" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow sm:rounded-md sm:overflow-hidde">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama kapal</label>
                                <input type="text" name="name" id="name" autocomplete="name"
                                    value="{{ old('name', $kapal->name) }}" disabled
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis</label>
                                <input type="text" name="jenis" id="jenis" autocomplete="jenis"
                                    value="{{ old('jenis', $kapal->jenis) }}" disabled
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <x-jet-input-error for="jenis" class="mt-2" />
                            </div>

                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="kapasitas" class="block text-sm font-medium text-gray-700">Kapasitas
                                        (GT)</label>
                                    <input type="number" min="1" name="kapasitas" id="kapasitas"
                                        autocomplete="kapasitas" value="{{ old('kapasitas', $kapal->kapasitas) }}"
                                        disabled
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <x-jet-input-error for="kapasitas" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="panjang" class="block text-sm font-medium text-gray-700">Panjang
                                        (M)</label>
                                    <input type="number" min="1" name="panjang" id="panjang" autocomplete="panjang"
                                        value="{{ old('panjang', $kapal->panjang) }}" disabled
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <x-jet-input-error for="panjang" class="mt-2" />
                                </div>
                            </div>
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">
                                    Description
                                </label>
                                <div class="mt-1">
                                    <textarea id="description" name="description" rows="3" disabled
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                        placeholder="Description for more informations">{{ old('description', $kapal->description) }}</textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">
                                    Brief description for new product.
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
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Biaya sewa</h3>
                        <p class="mt-1 text-sm text-gray-600">Berikut perincian biaya sewa untuk jenis kapal ini.</p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow sm:rounded-md sm:overflow-hidde">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                            @if ($kapal->sewa_sekali_jalan)
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="sekali_jalan" class="block text-sm font-medium text-gray-700">Sewa
                                        sekali
                                        jalan</label>
                                    <input type="text" name="sekali_jalan" id="sekali_jalan"
                                        value="{{ old('sekali_jalan', $kapal->sewa_sekali_jalan) }}" disabled
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            @endif

                            @if ($kapal->sewa_hari)
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="sewa_hari" class="block text-sm font-medium text-gray-700">Sewa
                                        harian</label>
                                    <input type="text" name="sewa_hari" id="sewa_hari"
                                        value="{{ old('sewa_hari', $kapal->sewa_hari) }}" disabled
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            @endif

                            @if ($kapal->sewa_jam)
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="sewa_jam" class="block text-sm font-medium text-gray-700">Sewa per
                                        jam</label>
                                    <input type="text" name="sewa_jam" id="sewa_jam"
                                        value="{{ old('sewa_jam', $kapal->sewa_jam) }}" disabled
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
