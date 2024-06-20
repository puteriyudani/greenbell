<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('nama', 'LIKE', "%$query%")
                            ->orWhere('detail', 'LIKE', "%$query%")
                            ->get();

        $beleafs = Product::with('images')
            ->join('kategoris', 'kategoris.nama', '=', 'products.kategori')
            ->where('kategoris.menu', 'Be Leaf')
            ->select('products.*', 'kategoris.menu')
            ->get();

        $preloveds = Product::with('images')
            ->join('kategoris', 'kategoris.nama', '=', 'products.kategori')
            ->where('kategoris.menu', 'Pre Loved')
            ->select('products.*', 'kategoris.menu')
            ->get();

        $generals = Product::with('images')
            ->join('kategoris', 'kategoris.nama', '=', 'products.kategori')
            ->where('kategoris.menu', 'General')
            ->select('products.*', 'kategoris.menu')
            ->get();

        // Menggunakan compact untuk mengemas variabel
        return view('home', compact('beleafs', 'preloveds', 'generals', 'products'));
    }
}
