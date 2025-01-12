<?php

namespace App\Http\Controllers;

use App\Models\tamu;
use Illuminate\Http\RedirectResponse;
//use Illuminate\Http\Redirector;
use Illuminate\Http\Request;
//use Illuminate\Routing\Redirector as RoutingRedirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
//use Symfony\Component\HttpFoundation\RedirectResponse as HttpFoundationRedirectResponse;

class Catattamucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('pencatatantamu');
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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'Nama' => ['required', 'string', 'max:255'],
            'Alamat' => ['required', 'string', 'max:255'],
        ]);

        try {

            tamu::create([
                'Nama' => $request->Nama,
                'Alamat' => $request->Alamat,
            ]);

            return redirect()->route('pencarianmakam')->with('success', 'Guest data saved successfully!'); 
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while saving the guest data.');
        }
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
