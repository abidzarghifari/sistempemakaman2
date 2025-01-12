<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Hapus Kas') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ketika data kas dihapus, semua sumber daya dan data akan dihapus secara permanen. apakah anda yakin akan menghapus data kas ini?.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-kas-deletion')"
    >{{ __('Hapus Data') }}</x-danger-button>

    <x-modal name="confirm-kas-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('manajemenkas.destroy', $kas->id) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Apakah anda yakin akan menghapus data kas ini?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Ketika data kas dihapus, semua sumber daya dan data akan dihapus secara permanen.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Data') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
