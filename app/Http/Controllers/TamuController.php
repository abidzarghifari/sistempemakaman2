<?php

namespace App\Http\Controllers;

use App\Models\tamu;
use Illuminate\Http\Request;
use Illuminate\View\View;


class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $keyword = $request->input('keywordtamu'); // Mengambil nilai 'keyword' dari request

        // Jika ada keyword, cari data yang cocok
        if ($keyword) {
            // Pencarian berdasarkan keyword, bisa disesuaikan dengan kolom yang relevan (misal Nama atau Email)
            $tamus = tamu::where('Nama', 'like', '%' . $keyword . '%')
                            ->orWhere('Alamat', 'like', '%' . $keyword . '%')
                            ->orWhere('id', 'like', '%' . $keyword . '%')
                            ->get();

            // Jika tidak ada data yang cocok, kembalikan semua data admin
            if ($tamus->isEmpty()) {
                $tamus = tamu::all();
            }
        } else {
            // Jika tidak ada keyword, kembalikan semua data admin
            $tamus = tamu::all();
        }

        return view('manajementamu', compact('tamus'));
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
    public function show(tamu $tamu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tamu $tamu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tamu $tamu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tamu $tamu)
    {
        //
    }
}
