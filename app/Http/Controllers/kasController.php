<?php

namespace App\Http\Controllers;

use App\Models\kas;
use App\Http\Requests\KasUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;


class kasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $keyword = $request->input('keywordkas'); // Mengambil nilai 'keyword' dari request

        // Jika ada keyword, cari data yang cocok
        if ($keyword) {
            // Pencarian berdasarkan keyword, bisa disesuaikan dengan kolom yang relevan (misal Nama atau Email)
            $kass = kas::where('id', 'like', '%' . $keyword . '%')
                        ->orWhere('Donatur', 'like', '%' . $keyword . '%')
                        ->get();

            // Jika tidak ada data yang cocok, kembalikan semua data admin
            if ($kass->isEmpty()) {
                $kass = kas::all();
            }
        } else {
            // Jika tidak ada keyword, kembalikan semua data admin
            $kass = kas::all();
        }

        $sisakas = kas::sum('Jumlah');

        return view('manajemenkas', compact('kass', 'sisakas'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('kasupdate.create');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'Pemasukan' => ['numeric', 'min:0'],
            'Pengeluaran' => ['numeric', 'min:0'],
            'Donatur' => ['string', 'max:255'],
            'Keterangan' => ['string'],
        ]);

        // Ambil jumlah terakhir
        //$jumlahSebelumnya = \DB::table('kas')->latest('id')->value('jumlah') ?? 0;

        // Hitung jumlah baru
        $jumlahBaru = 0 + $request->Pemasukan - $request->Pengeluaran;
        
        $kas = kas::create([
            'Pemasukan' => $request->Pemasukan,
            'Pengeluaran' => $request->Pengeluaran,
            'Donatur' => $request->Donatur,
            'Keterangan' => $request->Keterangan,
            'Jumlah' => $jumlahBaru
        ]);

        return redirect(route('manajemenkas.create', absolute: false));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $kas = kas::find($id);

        return view('kasupdate.edit',[
            'kas' => $kas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KasUpdateRequest $request, $id): RedirectResponse
    {
        // Mengambil admin berdasarkan ID yang diberikan
        $kas = kas::find($id);
        
        // Mengisi atribut admin dengan data yang sudah divalidasi
        $kas->fill($request->validated());

        // Jika email berubah, reset verifikasi email
        //if ($admin->isDirty('email')) {
        //    $admin->email_verified_at = null;
        //}

        // Menyimpan perubahan
        $kas->save();

        // Redirect kembali dengan status berhasil
        return Redirect::route('manajemenkas.edit', $kas->id)->with('status', 'profile-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        // Cari admin berdasarkan ID
        $kas = kas::find($id);
    
        // Pastikan admin ditemukan
        if ($kas) {
            $kas->delete(); // Hapus data admin
        } else {
            // Jika admin tidak ditemukan, bisa memberikan respons error atau pesan
            return redirect('manajemenkas.edit',$kas->id)->with('error', 'Admin not found');
        }

        // Redirect ke dashboard setelah penghapusan
        return redirect('manajemenkas')->with('success', 'Admin deleted successfully');
    }
}
