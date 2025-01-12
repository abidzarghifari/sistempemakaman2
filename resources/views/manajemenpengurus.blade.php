<x-app-layout>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-12 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow-black shadow-2xl sm:rounded-lg">
                    <div class="w-full p-4 space-y-4 ">
                        <div class="mb-8 text-2xl">
                            <h1><strong>Data Pengurus</strong></h1>
                        </div>
                        <form class="w-full flex gap-4" role="search" method="GET" action="{{ route('manajemenpengurus') }}">
                            <input class="flex-[4] rounded-md px-4 py-1" type="search" id="keywordpengurus" name="keywordpengurus" placeholder="Search" aria-label="Search">
                            <x-primary-button>{{ __('Cari') }}</x-primary-button>
                        </form>
                        <div class="w-full flex gap-4">
                            <div class="flex-[4]" ></div>
                            <p class="text-red">*Klik Nama untuk mengelola data</p>
                                 </div>
                                 <table class="table-auto w-full bg-red-700 rounded-md text-white">
                                    <thead>
                                        <tr class="border-b border-b-2 border-red-800">
                                            <th class="px-4 py-2">No Pengurus</th>
                                            <th class="px-4 py-2">Nama Pengurus</th>
                                            <th class="px-4 py-2">alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                            @foreach ($pengurus as $pengurus1) 
                                                <tr class="border-b border-red-800">
                                                    <td class="px-4 py-3">{{$pengurus1->id}}</td>
                                                    <td class="px-4 py-3"><a href="{{ route('manajemenpengurus.edit', $pengurus1->id) }}">{{$pengurus1->name}}</a></td>
                                                    <td class="px-4 py-3">{{$pengurus1->alamat}}</td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                    </div>
                </div>
        </div>        
    </div>
</x-app-layout>

<!--
                    
-->