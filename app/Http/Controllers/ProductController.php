<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function search(Request $request)
    {
        // Ambil input dari pengguna
        $search = $request->input('search');

        // Query produk berdasarkan nama atau kategori yang cocok dengan pencarian
        $products = Product::join('kategoris', 'kategoris.nama', '=', 'products.kategori')
            ->where('products.nama', 'like', '%' . $search . '%')
            ->orWhere('kategoris.nama', 'like', '%' . $search . '%')
            ->select('products.*', 'kategoris.menu')
            ->get();

        // Kirim hasil pencarian ke view yang sama atau khusus untuk hasil pencarian
        return view('product.index', [
            'beleafs' => $products->where('menu', 'Be Leaf'),
            'preloveds' => $products->where('menu', 'Pre Loved'),
            'generals' => $products->where('menu', 'General'),
            'search' => $search, // Menyimpan kata kunci pencarian agar bisa ditampilkan di view
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::join('kategoris', 'kategoris.nama', '=', 'products.kategori')
            ->select('products.*', 'kategoris.menu')
            ->get();

        $data = [
            'beleafs' => $products->where('menu', 'Be Leaf'),
            'preloveds' => $products->where('menu', 'Pre Loved'),
            'generals' => $products->where('menu', 'General'),
        ];

        return view('product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::orderBy('nama', 'asc')->get();
        return view('product.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ambil input kategori dari request
        $kategoriInput = $request->input('kategori'); // Misal: 'Permainan'

        // Cari data kategori berdasarkan input
        $kategori = Kategori::where('nama', $kategoriInput)->first();

        if ($kategori) {
            $kodeAwal = $kategori->kode_awal; // Ambil kolom 'kode_awal' dari tabel kategori
        } else {
            $kodeAwal = 'XX-XX'; // Default jika kategori tidak ditemukan
        }

        // Cari produk terakhir berdasarkan kodeAwal
        $product = Product::where('kode', 'LIKE', $kodeAwal . '%')->latest()->first();

        if ($product == null) {
            // Kode pertama
            $nomorUrut = "0001";
        } else {
            // Kode berikutnya
            $nomorUrut = substr($product->kode, strlen($kodeAwal)); // Ambil bagian nomor dari kode produk terakhir
            $nomorUrut = (int)$nomorUrut + 1; // Tambahkan 1
            $nomorUrut = str_pad($nomorUrut, 4, "0", STR_PAD_LEFT); // Pad dengan nol di depan hingga 4 digit
        }

        $kodeProduct = $kodeAwal . $nomorUrut;

        // Validasi input
        $request->validate([
            'kategori' => 'required', // Nama kategori
            'nama' => 'required',
            'detail' => 'required',
            'harga' => 'required|numeric',
            'kondisi' => 'required',
            'stok' => 'required|integer|min:0',
        ]);

        // Simpan data
        $requestData = $request->all();
        $requestData['kode'] = $kodeProduct;

        Product::create($requestData);


        return redirect()->route('product.index')->with('success', 'Product created successfully.');
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
    public function edit(Product $product)
    {
        $kategoris = Kategori::orderBy('nama', 'asc')->get();
        return view('product.edit', compact('product', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Validasi input
        $request->validate([
            'kategori' => 'required',
            'nama' => 'required',
            'detail' => 'required',
            'harga' => 'required|numeric',
            'kondisi' => 'required',
            'stok' => 'required|integer|min:0',
        ]);

        // Cek apakah kategori berubah
        if ($request->input('kategori') !== $product->kategori) {
            // Ambil input kategori dari request
            $kategoriInput = $request->input('kategori'); // Nama kategori

            // Cari data kategori berdasarkan input
            $kategori = Kategori::where('nama', $kategoriInput)->first();

            if ($kategori) {
                $kodeAwal = $kategori->kode_awal; // Ambil kolom 'kode_awal' dari tabel kategori
            } else {
                $kodeAwal = 'XX-XX'; // Default jika kategori tidak ditemukan
            }

            // Cari produk terakhir berdasarkan kodeAwal
            $latestProduct = Product::where('kode', 'LIKE', $kodeAwal . '%')->latest()->first();

            if ($latestProduct == null) {
                // Kode pertama
                $nomorUrut = "0001";
            } else {
                // Kode berikutnya
                $nomorUrut = substr($latestProduct->kode, strlen($kodeAwal)); // Ambil bagian nomor dari kode produk terakhir
                $nomorUrut = (int)$nomorUrut + 1; // Tambahkan 1
                $nomorUrut = str_pad($nomorUrut, 4, "0", STR_PAD_LEFT); // Pad dengan nol di depan hingga 4 digit
            }

            // Regenerasi kode produk
            $kodeProduct = $kodeAwal . $nomorUrut;
        } else {
            // Jika kategori tidak berubah, gunakan kode produk lama
            $kodeProduct = $product->kode;
        }

        // Ambil semua data request dan tambahkan kode produk
        $requestData = $request->except(['_token', '_method']);
        $requestData['kode'] = $kodeProduct;

        // Update data produk
        $product->update($requestData);

        // Redirect dengan pesan sukses
        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }
}
