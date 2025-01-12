<x-app-layout2>
        <audio autoplay loop>
                    <source src="{{ asset('audio/gugur-bunga-orchestra-instrumental-by-at-l-instrumentalia_SWeaa49Y.mp3') }}" type="audio/mp3">
        </audio>
        <div class="h-14"></div>
        <div class="h-full flex flex-col sm:justify-center items-center  sm:pt-0">
            <div class="w-full sm:max-w-md px-6 py-8 bg-white shadow-black shadow-2xl overflow-hidden sm:rounded-lg">
                <div class="text-center">
                    <h1><strong>Pencatatan Tamu</strong></h1>
                </div>
                <form method="POST" action="{{ route('pencatatantamu.store') }}" class="mt-8">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="Nama" :value="__('Nama')" />
                        <x-text-input id="Nama" class="block mt-1 w-full" type="text" name="Nama" :value="old('Nama')" required autofocus autocomplete="Nama" />
                        <x-input-error :messages="$errors->get('Nama')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="Alamat" :value="__('Alamat')" />
                        <x-text-input id="Alamat" class="block mt-1 w-full" type="text" name="Alamat" :value="old('Alamat')" required autofocus autocomplete="Alamat" />
                        <x-input-error :messages="$errors->get('Alamat')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-danger-button class="ms-3">
                            {{ __('Catat') }}
                        </x-danger-button>
                    </div>
                </form>        
            </div>
        </div>
</x-app-layout2>
