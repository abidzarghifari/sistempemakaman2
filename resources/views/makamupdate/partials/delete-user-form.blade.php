<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Hapus Makam') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ketika data makam dihapus, semua sumber daya dan data akan dihapus secara permanen. apakah anda yakin akan menghapus akun anda?.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-makam-deletion')"
    >{{ __('Hapus') }}</x-danger-button>

    <x-modal name="confirm-makam-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('manajemenmakam.destroy', $makam->id) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Apakah anda yakin akan menghapus data makam ini?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Ketika data makam dihapus, semua sumber daya dan data akan dihapus secara permanen.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
