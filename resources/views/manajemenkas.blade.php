<x-app-layout>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-12 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow-black shadow-2xl sm:rounded-lg">
                    <div class="w-full p-4 space-y-4 ">
                        <div class="mb-8 text-2xl">
                            <h1><strong>Data Kas</strong></h1>
                        </div>
                        <div class="w-full flex space-x-8">
                            <div class="justify-items-center">
                                <p class="text-red-900 flex-[1]">Sisa kas saat ini : {{$sisakas}}</p>
                            </div>
                            <div class="flex-[4]"></div>
                        </div>
                        <form class="w-full flex gap-4" role="search" method="GET" action="{{ route('manajemenkas') }}">
                            <input class="flex-[4] rounded-md px-4 py-1" type="search" id="keywordkas" name="keywordkas" placeholder="Search" aria-label="Search">
                            <x-primary-button>{{ __('Cari') }}</x-primary-button>
                            <a href="{{ route('manajemenkas.create') }}" class="bg-blue-500 p-1 px-6   text-white rounded-md"><h1 class="text-2xl">+</h1></a>
                        </form>
                        <div class="w-full flex gap-4">
                            <div class="flex-[4]" ></div>
                            <p class="text-red">*Klik nomor untuk mengupdate data</p>
                                 </div>
                                 <table class="table-auto w-full bg-red-700 rounded-md text-white">
                                    <thead>
                                        <tr class="border-b border-b-2 border-red-800">
                                            <th class="px-4 py-2">No Transaksi</th>
                                            <th class="px-4 py-2">Pemasukan</th>
                                            <th class="px-4 py-2">Pengeluaran</th>
                                            <th class="px-4 py-2">Jumlah</th>
                                            <th class="px-4 py-2">Tanggal Transaksi</th>
                                            <th class="px-4 py-2">Donatur</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                            @foreach ($kass as $kas) 
                                                <tr class="border-b border-red-800">
                                                    <td class="px-4 py-3"><a href="{{ route('manajemenkas.edit', $kas->id) }}">{{$kas->id}}</a></td>
                                                    <td class="px-4 py-3">{{$kas->Pemasukan}}</td>
                                                    <td class="px-4 py-3">{{$kas->Pengeluaran}}</td>
                                                    <td class="px-4 py-3">{{$kas->Jumlah}}</td>
                                                    <td class="px-4 py-3">{{$kas->created_at}}</td>
                                                    <td class="px-4 py-3">{{$kas->Donatur}}</td>
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