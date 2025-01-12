<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-12 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow-black shadow-2xl sm:rounded-lg">
                    <div class="max-w-xl">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Menambahkan Data Kas') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Data yang dibutuhkan berupa pemasukan/pengeluaran, donatur(opsional) dan keterangan") }}
                            </p>
                        </header>
                        <form method="POST" action="{{ route('manajemenkas.store') }}" class="mt-6 space-y-6">
                            @csrf

                            <div>
                                <x-input-label for="Pemasukan" :value="__('Pemasukan')" />
                                <x-text-input id="Pemasukan" name="Pemasukan" type="number" class="mt-1 block w-full" :value="old('Pemasukan')" required autofocus autocomplete="Pemasukan" />
                                <x-input-error class="mt-2" :messages="$errors->get('Pemasukan')" />
                            </div>

                            <div>
                                <x-input-label for="Pengeluaran" :value="__('Pengeluaran')" />
                                <x-text-input id="Pengeluaran" name="Pengeluaran" type="number" class="mt-1 block w-full" :value="old('Pengeluaran')" required autofocus autocomplete="Pengeluaran" />
                                <x-input-error class="mt-2" :messages="$errors->get('Pengeluaran')" />
                            </div>
                            
                            <div>
                                <x-input-label for="Donatur" :value="__('Donatur')" />
                                <x-text-input id="Donatur" name="Donatur" type="text" class="mt-1 block w-full" :value="old('Donatur')" required autofocus autocomplete="Donatur" />
                                <x-input-error class="mt-2" :messages="$errors->get('Donatur')" />
                            </div>

                            <div>
                                <x-input-label for="Keterangan" :value="__('Keterangan')" />
                                <x-text-input id="Keterangan" name="Keterangan" type="text" class="mt-1 block w-full" :value="old('Keterangan')" required autofocus autocomplete="Keterangan" />
                                <x-input-error class="mt-2" :messages="$errors->get('Keterangan')" />
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
