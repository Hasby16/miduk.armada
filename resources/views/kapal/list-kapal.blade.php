<x-app-layout>

    <section class="w-full px-6 pb-12 antialiased bg-white">
        <div class="mx-auto max-w-7xl">

            <!-- Main Hero Content -->
            <div class="container max-w-lg mb-12 px-4 py-32 mx-auto text-left md:max-w-none md:text-center">
                <h1
                    class="text-4xl font-extrabold leading-10 tracking-tight text-left text-gray-900 md:text-center sm:leading-none md:text-6xl lg:text-7xl">
                    <span class="inline md:block">Miduk Armada Visitama</span>
                    <span
                        class="relative 2 text-3xl text-transparent bg-clip-text bg-gradient-to-br from-indigo-600 to-indigo-500 md:inline-block">Charter
                        Vessel Management and Catring</span>
                </h1>
                <div class="mx-auto mt-5 text-gray-500 md:mt-12 md:max-w-lg md:text-center lg:text-lg"> Kami Menyediakan
                    kapal untuk klien dalam berbagai macam jangka waktu sewa, termasuk sewa jangka pendek, jangka
                    menengah dan jangka panjang, serta sewa spot dan Contract of Affreightment (COA).
                    .</div>
            </div>
            <!-- End Main Hero Content -->

        </div>
    </section>


    <!-- Section 1 -->
    <section class="bg-white">
        <div class="w-full px-5 py-6 mx-auto space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16 max-w-7xl">

            <div class="flex grid grid-cols-12 pb-10 sm:px-5 gap-x-8 gap-y-16">

                @foreach ($kapal as $kp)
                    <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                        <a href="{{ route('kapal.show', $kp) }}" class="block">
                            <img class="object-cover w-full mb-2 overflow-hidden rounded-lg max-h-56"
                                src="{{ asset('storage/' . $kp->image_url) }}">
                        </a>
                        <div
                            class="bg-blue-500 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                            <span>{{ $kp->jenis }}</span>
                        </div>
                        <h2 class="text-lg font-bold sm:text-xl md:text-2xl">{{ $kp->name }}</h2>
                        <p class="text-sm text-gray-500 line-clamp-1">{{ $kp->description }}</p>
                    </div>
                @endforeach

            </div>
        </div>
    </section>



    @livewire('footer')
</x-app-layout>
