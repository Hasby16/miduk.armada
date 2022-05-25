<x-app-layout>
    <header class="shadow-lg sticky top-0 bg-white">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Update data kapal') }}
                </h2>
                <div>
                    <a href="{{ route('kapal.index') }}"
                        class="inline-flex justify-center py-2 px-4 border border-gray shadow-sm text-sm font-medium rounded-md text-gray focus:outline-none focus:ring-2 focus:ring-offset-2 mr-4">
                        Batal
                    </a>

                    <form class="inline-block" action="{{ route('kapal.destroy', $kapal) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Are you sure?')"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 mr-4">
                            Hapus
                        </button>
                    </form>

                    <form class="inline-block" action="{{ route('kapal.update', $kapal) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('put')

                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-4">
                            Simpan
                        </button>

                </div>
            </div>
    </header>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

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
                            <input type="text" name="name" id="name" autocomplete="name"
                                value="{{ old('name', $kapal->name) }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis</label>
                            <input type="text" name="jenis" id="jenis" autocomplete="jenis"
                                value="{{ old('jenis', $kapal->jenis) }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <x-jet-input-error for="jenis" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="kapasitas" class="block text-sm font-medium text-gray-700">Kapasitas
                                    (GT)</label>
                                <input type="number" min="1" name="kapasitas" id="kapasitas" autocomplete="kapasitas"
                                    value="{{ old('kapasitas', $kapal->kapasitas) }}"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <x-jet-input-error for="kapasitas" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="panjang" class="block text-sm font-medium text-gray-700">Panjang
                                    (M)</label>
                                <input type="number" min="1" name="panjang" id="panjang" autocomplete="panjang"
                                    value="{{ old('panjang', $kapal->panjang) }}"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <x-jet-input-error for="panjang" class="mt-2" />
                            </div>
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">
                                Description
                            </label>
                            <div class="mt-1">
                                <textarea id="description" name="description" rows="3"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                    placeholder="Description for more informations">{{ old('description', $kapal->description) }}</textarea>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">
                                Brief description for new product.
                            </p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Gambar kapal
                            </label>
                            <div
                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">

                                    <div class="flex flex-wrap justify-center mb-6">
                                        @if ($kapal->image_url)
                                            <img src="{{ asset('storage/' . $kapal->image_url) }}"
                                                class="img-preview max-w-sm h-auto shadow-lg rounded-lg" alt="" />
                                        @else
                                            <img class="img-preview max-w-sm h-auto shadow-lg rounded-lg" alt="" />
                                        @endif
                                    </div>

                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48" aria-hidden="true">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="mx-auto text-sm text-gray-600">
                                        <label for="image_url"
                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="image_url" name="image_url" type="file" accept="image/png"
                                                class="sr-only" onChange="previewImage()">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        PNG, JPG, GIF up to 10MB
                                    </p>
                                </div>
                            </div>
                            <x-jet-input-error for="image_url" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <x-jet-section-border />

        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Biaya sewa (Sekali jalan)</h3>
                    <p class="mt-1 text-sm text-gray-600">Berikan detail mengenai biaya sewa untuk jenis kapal ini.
                    </p>
                </div>
            </div>

            <div class="mt-5 md:m5-0 md:col-span-2">

                @if ($kapal->sewa_sekali_jalan)
                    <div x-data="{sekaliJalan: true}" class="mt-0 mb-10 md:col-span-2">
                    @else
                        <div x-data="{sekaliJalan: false}" class="mt-0 mb-10 md:col-span-2">
                @endif
                <div class="shadow sm:rounded-md sm:overflow-hidde">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                        <div x-show="!sekaliJalan">
                            <h3 class="text-lg font-medium text-gray-900">

                                {{ __('Sewa sekali jalan') }}
                            </h3>
                            <div class="my-3 max-w-xl text-sm text-gray-600">
                                <p>
                                    {{ __('Berlaku penyewaan kapal dalam sekali perjalanan.') }}
                                </p>
                            </div>
                            <x-jet-button @click="sekaliJalan = !sekaliJalan" type="button">
                                {{ __('Aktifkan') }}
                            </x-jet-button>
                        </div>

                        <div x-show="sekaliJalan">

                            <div class="mt-1 mb-4 flex rounded-md shadow-sm">
                                <span
                                    class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                    Sekali Jalan
                                </span>
                                <input type="number" min="1000" name="sewa_sekali_jalan" id="sewa_sekali_jalan"
                                    autocomplete="sewa_sekali_jalan"
                                    value="{{ old('sewa_sekali_jalan', $kapal->sewa_sekali_jalan) }}"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>

                            <x-jet-button @click="sekaliJalan = !sekaliJalan" type="button">
                                {{ __('Cancel') }}
                            </x-jet-button>
                        </div>
                    </div>
                </div>
            </div>


            @if ($kapal->sewa_hari)
                <div x-data="{sewaHarian: true}" class="mt-10 mb-10 md:col-span-2">
                @else
                    <div x-data="{sewaHarian: false}" class="mt-10 mb-10 md:col-span-2">
            @endif
            <div class="shadow sm:rounded-md sm:overflow-hidde">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                    <div x-show="!sewaHarian">
                        <h3 class="text-lg font-medium text-gray-900">

                            {{ __('Sewa harian') }}
                        </h3>
                        <div class="my-3 max-w-xl text-sm text-gray-600">
                            <p>
                                {{ __('Berlaku penyewaan kapal dalam waktu yang ditentukan.') }}
                            </p>
                        </div>
                        <x-jet-button @click="sewaHarian = !sewaHarian" type="button">
                            {{ __('Aktifkan') }}
                        </x-jet-button>
                    </div>

                    <div x-show="sewaHarian">

                        <div class="mt-1 mb-4 flex rounded-md shadow-sm">
                            <span
                                class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                Harian
                            </span>
                            <input type="number" min="1000" name="sewa_hari" id="sewa_hari" autocomplete="sewa_hari"
                                value="{{ old('sewa_hari', $kapal->sewa_hari) }}"
                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                        </div>

                        <x-jet-button @click="sewaHarian = !sewaHarian" type="button">
                            {{ __('Cancel') }}
                        </x-jet-button>
                    </div>
                </div>
            </div>
        </div>

        @if ($kapal->sewa_jam)
            <div x-data="{sewaJam: true}" class="mt-10 md:col-span-2">
            @else
                <div x-data="{sewaJam: false}" class="mt-10 md:col-span-2">

        @endif
        <div class="shadow sm:rounded-md sm:overflow-hidde">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                <div x-show="!sewaJam">
                    <h3 class="text-lg font-medium text-gray-900">

                        {{ __('Sewa per Jam') }}
                    </h3>
                    <div class="my-3 max-w-xl text-sm text-gray-600">
                        <p>
                            {{ __('Berlaku penyewaan kapal dalam hitungan per jam.') }}
                        </p>
                    </div>
                    <x-jet-button @click="sewaJam = !sewaJam" type="button">
                        {{ __('Aktifkan') }}
                    </x-jet-button>
                </div>

                <div x-show="sewaJam">

                    <div class="mt-1 mb-4 flex rounded-md shadow-sm">
                        <span
                            class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                            Per jam
                        </span>
                        <input type="number" min="1000" name="sewa_jam" id="sewa_jam" autocomplete="sewa_jam"
                            value="{{ old('sewa_jam', $kapal->sewa_jam) }}"
                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                    </div>

                    <x-jet-button @click="sewaJam = !sewaJam" type="button">
                        {{ __('Cancel') }}
                    </x-jet-button>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>
    </form>
    @section('file-upload')
        <script>
            function previewImage() {
                const image = document.querySelector('#image_url');
                const imgPreview = document.querySelector('.img-preview');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                };
            }
        </script>
    @stop
</x-app-layout>
