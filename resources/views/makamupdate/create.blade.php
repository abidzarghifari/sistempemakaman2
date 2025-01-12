<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Makam') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-12 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow-black shadow-2xl sm:rounded-lg">
                    <div class="max-w-xl">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Menambahkan Data Makam') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Data yang dibutuhkan berupa Nama, gelar, tanggal lahir ,tanggal meninggal dan cluster makam") }}
                            </p>
                        </header>
                        <form method="POST" action="{{ route('manajemenmakam.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <x-input-label for="Nama" :value="__('Nama')" />
                                <x-text-input id="Nama" name="Nama" type="text" class="mt-1 block w-full" :value="old('Nama')" required autofocus autocomplete="Nama" />
                                <x-input-error class="mt-2" :messages="$errors->get('Nama')" />
                            </div>

                            <div>
                                <x-input-label for="Gelar" :value="__('Gelar')" />
                                <x-text-input id="Gelar" name="Gelar" type="text" class="mt-1 block w-full" :value="old('Gelar')" required autofocus autocomplete="Gelar" />
                                <x-input-error class="mt-2" :messages="$errors->get('Gelar')" />
                            </div>
                            

                            <div>
                                <x-input-label for="Tgl_Lahir" :value="__('Tanggal Lahir')" />
                                <x-text-input id="Tgl_Lahir" name="Tgl_Lahir" type="date" class="mt-1 block w-full" :value="old('Tgl_Lahir')" required autofocus autocomplete="Tgl_Lahir" />
                                <x-input-error class="mt-2" :messages="$errors->get('Tgl_Lahir')" />
                            </div>

                            <div>
                                <x-input-label for="Tgl_Meninggal" :value="__('Tanggal Meninggal')" />
                                <x-text-input id="Tgl_Meninggal" name="Tgl_Meninggal" type="date" class="mt-1 block w-full" :value="old('Tgl_Meninggal')" required autofocus autocomplete="Tgl_Meninggal" />
                                <x-input-error class="mt-2" :messages="$errors->get('Tgl_Meninggal')" />
                            </div>

                            <div>
                                <x-input-label for="Cluster" :value="__('Cluster')" />
                                <x-text-input id="Cluster" name="Cluster" type="text" class="mt-1 block w-full" :value="old('Cluster')" required autofocus autocomplete="Cluster" />
                                <x-input-error class="mt-2" :messages="$errors->get('Cluster')" />
                            </div>

                            <div>
                                <x-input-label for="Deskripsi" :value="__('Deskripsi')" />
                                <x-text-input id="Deskripsi" name="Deskripsi" type="text" class="mt-1 block w-full" required autofocus autocomplete="Deskripsi" />
                                <x-input-error class="mt-2" :messages="$errors->get('Deskripsi')" />
                            </div>

                            <div>
                               <label for="media" class="block">Upload Media (Optional)</label>
                               <input type="file" name="media" id="media" accept="image/*,video/*">
                                @error('media')
                                    <div class="mt-2 text-red-500 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Simpan') }}</x-primary-button>

                                @if (session('status') === 'profile-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600"
                                    >{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
        </div>        
    </div>
</x-app-layout>
