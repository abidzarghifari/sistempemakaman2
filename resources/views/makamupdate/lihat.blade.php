<x-app-layout2>
      
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detil Makam') }}
        </h2>
    </x-slot>
 

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-12 space-y-6">
            <div class="bg-white overflow-hidden shadow-black shadow-2xl sm:rounded-lg"">
                <div class="p-14 text-black">
                <div class="mb-8 text-2xl">
                      <h1><strong>Detil Almarhum</strong></h1>
                </div>
                  <div class="flex space-x-14">
                    <div class="media-container flex-[1] mt-8">
                        @if ($makam->media_path)
                            <!-- Menampilkan gambar -->
                            @if (in_array(pathinfo($makam->media_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                <audio autoplay loop>
                                            <source src="{{ asset('audio/gugur-bunga-orchestra-instrumental-by-at-l-instrumentalia_SWeaa49Y.mp3') }}" type="audio/mp3">
                                </audio>
                                <img src="{{ asset('storage/' . $makam->media_path) }}" alt="Media" class="w-full h-auto rounded-xl">
                            <!-- Menampilkan video -->
                            @elseif (in_array(pathinfo($makam->media_path, PATHINFO_EXTENSION), ['mp4', 'mov', 'avi']))
                                <video autoplay loop class="w-full h-auto  rounded-xl">
                                    <source src="{{ asset('storage/' . $makam->media_path) }}" type="video/{{ pathinfo($makam->media_path, PATHINFO_EXTENSION) }}">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        @else
                            <p>No media available</p>
                        @endif
                    </div>
                    <div class="flex-[3]">
                        <dl class="divide-y divide-red-400">
                        <div class="px-4 py-6">
                          <dd class="mt-1 text-sm/6 sm:col-span-2 sm:mt-0 indent-14">{{$makam->Deskripsi}}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm/6 font-medium">Nama</dt>
                          <dd class="mt-1 text-sm/6 sm:col-span-2 sm:mt-0">{{$makam->Nama}}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm/6 font-medium ">Gelar</dt>
                          <dd class="mt-1 text-sm/6 sm:col-span-2 sm:mt-0">{{$makam->Gelar}}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm/6 font-medium">Tanggal Lahir</dt>
                          <dd class="mt-1 text-sm/6 sm:col-span-2 sm:mt-0">{{$makam->Tgl_Lahir}}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm/6 font-medium">Tanggal Meninggal</dt>
                          <dd class="mt-1 text-sm/6 sm:col-span-2 sm:mt-0">{{$makam->Tgl_Meninggal}}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm/6 font-medium">Cluster</dt>
                          <dd class="mt-1 text-sm/6 sm:col-span-2 sm:mt-0">{{$makam->Cluster}}</dd>
                        </div>
                      </dl>
                    </div>
                  </div>
                  <div class="w-full flex space-x-8 space-y-6">
                            <div class="flex-[4]"></div>
                            <a href="{{ route('about') }}" class="bg-black p-2 px-4  text-white rounded-md">Selesai</a>
                  </div> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout2>
