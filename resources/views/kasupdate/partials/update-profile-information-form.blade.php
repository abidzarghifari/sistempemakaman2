<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Data Makam') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update Nama, gelar, tanggal lahir ,tanggal meninggal dan cluster makam") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('manajemenkas.update',$kas->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

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
</section>
