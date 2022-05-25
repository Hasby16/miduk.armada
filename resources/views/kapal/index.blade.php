<x-app-layout>

    @if ($kapal->isEmpty())
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                <span class="block">Data kapal is empty.</span>
                <span class="block text-indigo-600">Create your data kapal now !</span>
            </h2>
        </div>

    @else

        <!-- Section 1 -->
        <section class="bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 lg:flex lg:items-center lg:justify-between">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    <span class="block">Daftar Kapal</span>
                </h2>
            </div>

            <div class="w-full px-5 py-6 mx-auto space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16 max-w-7xl">

                <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">

                    @foreach ($kapal as $kp)
                        @can('admin')
                            <a href="{{ route('kapal.edit', $kp) }}">

                            @else
                                <a href="{{ route('kapal.show', $kp) }}">
                                @endcan
                                <div class="group relative">
                                    <div
                                        class="w-full min-h-80 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                                        <img src="{{ asset('storage/' . $kp->image_url) }}"
                                            alt="Front of men&#039;s Basic Tee in black."
                                            class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                                    </div>
                                    <div class="flex mt-2 flex-col items-start">
                                        <div
                                            class="bg-blue-500 mb-3 flex items-center px-3 py-1.5 leading-none rounded-full text-xs font-medium uppercase text-white inline-block">
                                            <span>{{ $kp->jenis }}</span>
                                        </div>
                                        <h2 class="text-lg font-bold sm:text-xl md:text-2xl">{{ $kp->name }}</h2>
                                        <p class="text-sm text-gray-500 line-clamp-1">{{ $kp->description }}</p>
                                    </div>
                                </div>
                            </a>
                    @endforeach


                </div>

            </div>
        </section>

    @endif

</x-app-layout>
