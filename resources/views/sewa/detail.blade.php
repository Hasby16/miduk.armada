<x-app-layout>
    <div x-data="{showModal: false, tolakModal: false}">
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
                                    Konfirmasi Kirim
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Silahkan klik tombol di bawah ini untuk konfirmasi pengajuan sewa.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <form action="{{ route('sewa.update', $sewa) }}" method="POST">

                            @csrf
                            @method('put')
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-4">
                                Terima pengajuan
                            </button>
                        </form>

                        <button type="button" @click="showModal = !showModal"
                            class="inline-flex justify-center py-2 px-4 border border-gray shadow-sm text-sm font-medium rounded-md text-gray focus:outline-none focus:ring-2 focus:ring-offset-2 mr-4">
                            Batal
                        </button>

                    </div>
                </div>
            </div>
        </div>

        <div x-show="tolakModal" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
            aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Konfirmasi Penolakan
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Apakah anda yakin ingin menolak pengajuan sewa ini ?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <form action="{{ route('sewa.tolak', $sewa) }}" method="POST">

                            @csrf
                            @method('put')
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 mr-4">
                                Tolak pengajuan
                            </button>
                        </form>

                        <button type="button" @click="tolakModal = !tolakModal"
                            class="inline-flex justify-center py-2 px-4 border border-gray shadow-sm text-sm font-medium rounded-md text-gray focus:outline-none focus:ring-2 focus:ring-offset-2 mr-4">
                            Batal
                        </button>

                    </div>
                </div>
            </div>
        </div>

        <header class="shadow-lg sticky top-0 bg-white">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">

                        @if ($sewa->jenis_sewa == 'sekali_jalan')
                            @can('approval')
                                {{ __('Pengajuan sewa - Sekali jalan ( ' . $sewa->user->name . ' )') }}
                            @else
                                {{ __('Pengajuan sewa - Sekali jalan (Rp. ' . number_format($sewa->kapal->sewa_sekali_jalan, 2) . ' )') }}
                            @endcan

                        @elseif($sewa->jenis_sewa == 'harian')
                            {{ __('Pengajuan sewa - Harian') }}
                        @else
                            {{ __('Pengajuan sewa - Perjam') }}
                        @endif
                    </h2>
                    <div>

                        @if ($sewa->status != 'Menunggu pembayaran')
                            <h3 class="font-semibold inline-block mr-4 text-xl text-gray-800 leading-tight">
                                {{ $sewa->status }}
                            </h3>
                        @endif

                        <a href="{{ url()->previous() }}"
                            class="inline-flex justify-center py-2 px-4 border border-gray shadow-sm text-sm font-medium rounded-md text-gray focus:outline-none focus:ring-2 focus:ring-offset-2 mr-4">
                            Kembali
                        </a>

                        @if ($sewa->status != 'Diterima')
                            @can('approval')
                                @if ($sewa->status != 'Telah dibayar')
                                    <button type="button" @click="tolakModal = !tolakModal"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 mr-4">
                                        Tolak
                                    </button>
                                @endif
                                <button type="button" @click="showModal = !showModal"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-4">
                                    Konfirmasi
                                </button>
                            @endcan

                            @cannot('approval')
                                @if ($sewa->status == 'Menunggu pembayaran')
                                    <a href="{{ route('pembayaran.sewa.create', ['sewa' => $sewa]) }}"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 mr-4">
                                        Pembayaran
                                    </a>
                                @endif
                            @endcannot
                        @endif

                    </div>
                </div>
        </header>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            @if (!empty($pembayaran))
                <div class="md:grid mt-5 md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Detail Pembayaran</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Informasi ini sebagai bukti pembayaran user terhadap penyewaan kapal.
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Bukti pembayaran
                            </label>
                            <div
                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">

                                    <div class="flex flex-wrap justify-center mb-6">
                                        <img class="img-preview max-w-sm h-auto shadow-lg rounded-lg"
                                            src="{{ asset('storage/' . $pembayaran->image_url) }}" alt="" />
                                    </div>

                                </div>
                            </div>
                            <x-jet-input-error for="image_url" class="mt-2" />
                        </div>
                    </div>
                </div>
                <x-jet-section-border />
            @endif

            <div class="md:grid mt-5 md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1 mr-12">
                    <div class="px-4 sm:px-0">

                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 rounded-md">
                            <div class="space-y-1 text-center">
                                <div class="flex flex-wrap justify-center mb-6">

                                    <img src="{{ asset('storage/' . $sewa->kapal->image_url) }}"
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
                                <label for="nama_perusahaan" class="block text-sm font-medium text-gray-700">Nama
                                    perusahaan</label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan"
                                    value="{{ $sewa->user->nama_perusahaan }}" disabled
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama penanggung
                                    jawab</label>
                                <input type="text" name="name" id="name" value="{{ $sewa->user->name }}" disabled
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            @if ($sewa->jenis_sewa == 'jam')
                                <div class="grid grid-cols-6 gap-6">

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="tanggal_sewa"
                                            class="block text-sm font-medium text-gray-700">Tanggal
                                            sewa</label>
                                        <input type="text" name="tanggal_sewa" id="tanggal_sewa"
                                            autocomplete="tanggal_sewa" value="{{ $sewa->tanggal_sewa }}" disabled
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="jam_sewa" class="block text-sm font-medium text-gray-700">Jam
                                            mulai (WIB)</label>
                                        <input type="text" name="jam_sewa" id="jam_sewa" autocomplete="jam_sewa"
                                            value="{{ $sewa->jam_sewa }}" disabled
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="jam_selesai" class="block text-sm font-medium text-gray-700">Jam
                                            selesai (WIB)</label>
                                        <input type="text" name="jam_selesai" id="jam_selesai"
                                            autocomplete="jam_selesai" value="{{ $sewa->jam_selesai }}" disabled
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                </div>
                            @else
                                <div class="grid grid-cols-6 gap-6">

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="tanggal_sewa"
                                            class="block text-sm font-medium text-gray-700">Tanggal
                                            sewa</label>
                                        <input type="text" name="tanggal_sewa" id="tanggal_sewa"
                                            autocomplete="tanggal_sewa" value="{{ $sewa->tanggal_sewa }}" disabled
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    @if ($sewa->jenis_sewa == 'sekali_jalan')
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="jam_sewa" class="block text-sm font-medium text-gray-700">Jam
                                                sewa (WIB)</label>
                                            <input type="text" name="jam_sewa" id="jam_sewa" autocomplete="jam_sewa"
                                                value="{{ $sewa->jam_sewa }}" disabled
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    @else
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="tanggal_selesai"
                                                class="block text-sm font-medium text-gray-700">Tanggal
                                                selesai</label>
                                            <input type="text" name="tanggal_selesai" id="tanggal_selesai"
                                                autocomplete="tanggal_selesai" value="{{ $sewa->tanggal_selesai }}"
                                                disabled
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    @endif
                                </div>
                            @endif

                            @if ($sewa->jenis_sewa == 'sekali_jalan')
                                <div>
                                    <label for="uang_muka" class="block text-sm font-medium text-gray-700">
                                        Uang muka
                                    </label>

                                    <div class="mt-1 mb-4 flex rounded-md shadow-sm">
                                        <span
                                            class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                            Rp.
                                        </span>
                                        <input type="hidden" name="uang_muka" id="uang_muka" value="84000000">
                                        <input type="text" name="uangMmuka" id="uangMuka"
                                            value="{{ number_format($sewa->uang_muka, 2) }}" disabled
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">

                                    </div>

                                    <p class="mt-2 text-sm text-gray-500">
                                        *Pembayaran uang muka dilakukan ketika sudah disetujui dari pihak
                                        perusahaan.
                                    </p>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            <x-jet-section-border />

            <div class="md:grid mt-5 md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Detail kapal</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            This information will be displayed publicly so be careful what you create.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow sm:rounded-md sm:overflow-hidde">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama kapal</label>
                                <input type="text" name="name" id="name" value="{{ $sewa->kapal->name }}" disabled
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis</label>
                                <input type="text" name="jenis" id="jenis" value="{{ $sewa->kapal->jenis }}" disabled
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <x-jet-input-error for="jenis" class="mt-2" />
                            </div>

                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="kapasitas" class="block text-sm font-medium text-gray-700">Kapasitas
                                        (GT)</label>
                                    <input type="number" min="1" name="kapasitas" id="kapasitas"
                                        value="{{ $sewa->kapal->kapasitas }}" disabled
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <x-jet-input-error for="kapasitas" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="panjang" class="block text-sm font-medium text-gray-700">Panjang
                                        (M)</label>
                                    <input type="number" min="1" name="panjang" id="panjang" autocomplete="panjang"
                                        value="{{ $sewa->kapal->panjang }}" disabled
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
                                        placeholder="Description for more informations">{{ $sewa->kapal->description }}</textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">
                                    Brief description for new product.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
