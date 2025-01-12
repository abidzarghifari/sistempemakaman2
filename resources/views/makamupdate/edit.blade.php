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
                        @include('makamupdate.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow-black shadow-2xl sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('makamupdate.partials.delete-user-form')
                    </div>
                </div>
        </div>        
    </div>
</x-app-layout>
