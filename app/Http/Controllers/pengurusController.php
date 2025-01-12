<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class pengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $keyword = $request->input('keywordpengurus'); // Mengambil nilai 'keyword' dari request

        // Jika ada keyword, cari data yang cocok
        if ($keyword) {
            // Pencarian berdasarkan keyword, bisa disesuaikan dengan kolom yang relevan (misal Nama atau Email)
            $penguruss = user::where('name', 'like', '%' . $keyword . '%')
                            ->orWhere('alamat', 'like', '%' . $keyword . '%')
                            ->orWhere('id', 'like', '%' . $keyword . '%')
                            ->get();

            // Jika tidak ada data yang cocok, kembalikan semua data admin
            if ($penguruss->isEmpty()) {
                $penguruss = user::all();
            }
        } else {
            // Jika tidak ada keyword, kembalikan semua data admin
            $penguruss = user::all();
        }

        return view('manajemenpengurus', ['pengurus' => $penguruss]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $user = User::find($id);

        return view('pengurusupdate.edit',[
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     
    public function update(ProfileUpdateRequest $request, $id): RedirectResponse
    {
        // Mengambil admin berdasarkan ID yang diberikan
        $user = User::find($id);
        
        // Mengisi atribut admin dengan data yang sudah divalidasi
        $user->fill($request->validated());

        // Jika email berubah, reset verifikasi email
        //if ($admin->isDirty('email')) {
        //    $admin->email_verified_at = null;
        //}

        // Menyimpan perubahan
        $user->save();

        // Redirect kembali dengan status berhasil
        return Redirect::route('manajemenpengurus.edit', $user->id)->with('status', 'profile-updated');
    }
    */
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        // Cari admin berdasarkan ID        
        $user = User::find($id);
    
        // Pastikan admin ditemukan
        if ($user) {
            $user->delete(); // Hapus data admin
        } else {
            // Jika admin tidak ditemukan, bisa memberikan respons error atau pesan
            return redirect('manajemenpengurus.edit',$user->id)->with('error', 'Admin not found');
        }

        // Redirect ke dashboard setelah penghapusan
        return redirect('manajemenpengurus')->with('success', 'Admin deleted successfully');
    }
}
