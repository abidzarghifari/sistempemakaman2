<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-12 space-y-6">
            <div class="bg-white overflow-hidden shadow-black shadow-2xl sm:rounded-lg"">
                <div class="p-14 text-black">
                <div class="mb-8 text-2xl">
                      <h1><strong>Profil</strong></h1>
                </div>
                  <div>
                    <div>
                        <dl class="divide-y divide-red-400">
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm/6 font-medium">Full name</dt>
                          <dd class="mt-1 text-sm/6 sm:col-span-2 sm:mt-0">{{$user->name}}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm/6 font-medium ">NIK</dt>
                          <dd class="mt-1 text-sm/6 sm:col-span-2 sm:mt-0">{{$user->nik}}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm/6 font-medium">Email</dt>
                          <dd class="mt-1 text-sm/6 sm:col-span-2 sm:mt-0">{{$user->email}}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                          <dt class="text-sm/6 font-medium">Alamat</dt>
                          <dd class="mt-1 text-sm/6 sm:col-span-2 sm:mt-0">{{$user->alamat}}</dd>
                        </div>
                        
                      </dl>
                    </div>
                  </div>
                  <x-danger-button
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-pengurus-deletion')"
                    >{{ __('Pecat Pengurus') }}
                  </x-danger-button>
                  <x-modal name="confirm-pengurus-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                    <form method="post" action="{{ route('manajemenpengurus.destroy', $user->id) }}" class="p-6">
                        @csrf
                        @method('delete')

                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Apakah anda yakin akan menghapus akun Pengurus ini?') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Ketika akun pengurus ini dihapus, semua sumber daya dan data akan dihapus secara permanen. Silahkan masukan password anda untuk memastikan anda benar-benar ingin menghapus akun pengurus ini secara permanen.') }}
                        </p>

                        <div class="mt-6">
                            <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                            <x-text-input
                                id="password"
                                name="password"
                                type="password"
                                class="mt-1 block w-3/4"
                                placeholder="{{ __('Password') }}"
                            />

                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                        </div>

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


                </div>
            </div>
        </div>
    </div>        

</x-app-layout>
