<?php

namespace App\Http\Controllers;

use App\Models\makam;
use App\Http\Requests\MakamUpdateRequest;
use Illuminate\Http\Request;
//use App\Http\Controllers\RedirectResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class makamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $keyword = $request->input('keywordmakam'); // Mengambil nilai 'keyword' dari request

        // Jika ada keyword, cari data yang cocok
        if ($keyword) {
            // Pencarian berdasarkan keyword, bisa disesuaikan dengan kolom yang relevan (misal Nama atau Email)
            $makams = makam::where('Nama', 'like', '%' . $keyword . '%')
                            ->orWhere('Gelar', 'like', '%' . $keyword . '%')
                            ->orWhere('id', 'like', '%' . $keyword . '%')
                            ->get();

            // Jika tidak ada data yang cocok, kembalikan semua data admin
            if ($makams->isEmpty()) {
                $makams = makam::all();
            }
        } else {
            // Jika tidak ada keyword, kembalikan semua data admin
            $makams = makam::all();
        }

        return view('manajemenmakam', compact('makams'));
    }
    
    public function index2(Request $request): View
    {
        $keyword = $request->input('keywordmakam'); // Mengambil nilai 'keyword' dari request

        // Jika ada keyword, cari data yang cocok
        if ($keyword) {
            // Pencarian berdasarkan keyword, bisa disesuaikan dengan kolom yang relevan (misal Nama atau Email)
            $makams = makam::where('Nama', 'like', '%' . $keyword . '%')
                            ->orWhere('Gelar', 'like', '%' . $keyword . '%')
                            ->orWhere('id', 'like', '%' . $keyword . '%')
                            ->get();

            // Jika tidak ada data yang cocok, kembalikan semua data admin
            if ($makams->isEmpty()) {
                $makams = makam::all();
            }
        } else {
            // Jika tidak ada keyword, kembalikan semua data admin
            $makams = makam::all();
        }

        return view('pencarianmakam', compact('makams'));
    }

    public function index3($id): View
    {
        $makam = makam::find($id);

        return view('makamupdate.lihat',[
            'makam' => $makam,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('makamupdate.create');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        
        //dd($request->file('media'));
        //dd($request->all(), $request->file('media'), $request->hasFile('media'));
        //dd($request->all(), $request->file('media'), $_FILES);

        $request->validate([
            'Nama' => ['required', 'string', 'max:255'],
            'Gelar' => ['required', 'string', 'max:255'],
            'Tgl_Lahir' => ['nullable', 'date'],
            'Tgl_Meninggal' => ['nullable', 'date'],
            'Cluster' => ['required', 'string', 'max:255'],
            'Deskripsi' => ['nullable', 'string'],
            'media' => ['nullable', 'file', 'mimes:jpg,jpeg,png,mp4,mov,avi', 'max:1024000'],
        ]);

        //dd($request->all());
        
        
        
    	// Jika ada file media, simpan
        $mediaPath = null;
        if ($request->hasFile('media')) {
            try {
                //dd($request->file('media')->store('uploads/media', 'public'));
                $mediaPath = $request->file('media')->store('uploads/media', 'public');
                //dd($mediaPath);
            } catch (\Exception $e) {
                //return redirect()->back()->withErrors(['media' => 'Gagal mengunggah file.']);
                dd('Error: ' . $e->getMessage());
            }
        }else{
            dd('No file detected.');
        }

        
        $makam = makam::create([
            'Nama' => $request->Nama,
            'Gelar' => $request->Gelar,
            'Tgl_Lahir' => $request->Tgl_Lahir,
            'Tgl_Meninggal' => $request->Tgl_Meninggal,
            'Cluster' => ($request->Cluster),
            'Deskripsi' => ($request->Deskripsi),
            'media_path' => ($mediaPath)
        ]);

        return redirect(route('manajemenmakam.create', absolute: false));
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
        $makam = makam::find($id);

        return view('makamupdate.edit',[
            'makam' => $makam,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MakamUpdateRequest $request, $id): RedirectResponse
    {
        // Mengambil data makam berdasarkan ID
        $makam = Makam::find($id);

        if (!$makam) {
            return redirect()->route('manajemenmakam.index')->withErrors('Data tidak ditemukan.');
        }

        // Inisialisasi path media
        $mediaPath = $makam->media_path; // Gunakan nilai lama jika tidak ada unggahan baru

        // Jika ada file media yang diunggah
        if ($request->hasFile('media')) {
            // Hapus file lama jika ada
            //if ($makam->media_path) {
            //    Storage::disk('public')->delete($makam->media_path);
            //}
            // Simpan file baru dan dapatkan path-nya
            $mediaPath = $request->file('media')->store('uploads/media', 'public');
        }

        // Update data makam
        $makam->update([
            'Nama' => $request->Nama,
            'Gelar' => $request->Gelar,
            'Tgl_Lahir' => $request->Tgl_Lahir,
            'Tgl_Meninggal' => $request->Tgl_Meninggal,
            'Cluster' => $request->Cluster,
            'Deskripsi' => $request->Deskripsi,
            'media_path' => $mediaPath, // Simpan path file di media_path
        ]);

        // Redirect kembali dengan status berhasil
        return Redirect::route('manajemenmakam.edit', $makam->id)->with('status', 'profile-updated');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        // Cari admin berdasarkan ID
        $makam = makam::find($id);
    
        // Pastikan admin ditemukan
        if ($makam) {
            $makam->delete(); // Hapus data admin
        } else {
            // Jika admin tidak ditemukan, bisa memberikan respons error atau pesan
            return redirect('manajemenmakam.edit',$makam->id)->with('error', 'Admin not found');
        }

        // Redirect ke dashboard setelah penghapusan
        return redirect('manajemenmakam')->with('success', 'Admin deleted successfully');
    }
}
