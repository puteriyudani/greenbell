<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $beleafs = Kategori::where('menu', 'Be Leaf')->get();
        $preloveds = Kategori::where('menu', 'Pre Loved')->get();
        $generals = Kategori::where('menu', 'General')->get();
        $products = Product::paginate(9);
        return view('store', compact('products', 'beleafs', 'preloveds', 'generals'));
    }

    public function productDetail(Product $product)
    {
        // Ambil detail produk dengan join ke tabel kategoris
        $productDetail = Product::join('kategoris', 'kategoris.nama', '=', 'products.kategori')
            ->where('products.id', $product->id)
            ->select('products.*', 'kategoris.menu')
            ->firstOrFail();

        // Ambil gambar produk terkait
        $productImages = ProductImage::where('product_id', $product->id)->get();

        // Return view dengan data yang diperlukan
        return view('product-detail', compact('productDetail', 'productImages'));
    }

    public function beleaf()
    {
        $beleafs = Kategori::where('menu', 'Be Leaf')->get();
        $products = Product::join('kategoris', 'kategoris.nama', '=', 'products.kategori')
            ->where('kategoris.menu', 'Be Leaf')
            ->select('products.*', 'kategoris.menu')
            ->paginate(9);

        return view('store.beleaf', compact('products', 'beleafs'));
    }

    public function preloved()
    {
        $preloveds = Kategori::where('menu', 'Pre Loved')->get();
        $products = Product::join('kategoris', 'kategoris.nama', '=', 'products.kategori')
            ->where('kategoris.menu', 'Pre Loved')
            ->select('products.*', 'kategoris.menu')
            ->paginate(9);

        return view('store.preloved', compact('products', 'preloveds'));
    }

    public function general()
    {
        $generals = Kategori::where('menu', 'General')->get();
        $products = Product::join('kategoris', 'kategoris.nama', '=', 'products.kategori')
            ->where('kategoris.menu', 'General')
            ->select('products.*', 'kategoris.menu')
            ->paginate(9);

        return view('store.general', compact('products', 'generals'));
    }
}
