<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beleafs = Kategori::where('menu', 'Be Leaf')->get();
        $preloveds = Kategori::where('menu', 'Pre Loved')->get();
        $generals = Kategori::where('menu', 'General')->get();
        return view('kategori.index', compact('beleafs', 'preloveds', 'generals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'menu' => 'required',
            'kode_awal' => 'required',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori created successfully.');
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
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama' => 'required',
            'menu' => 'required',
            'kode_awal' => 'required',
        ]);

        $kategori->update($request->all());

        return redirect()->route('kategori.index')->with('success','Kategori updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success','Kategori deleted successfully');
    }
}
