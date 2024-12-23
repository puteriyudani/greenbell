<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        $productImages = ProductImage::where('product_id', $product->id)->get();
        return view('product-images.index', compact('product', 'productImages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('product-images.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        // Validasi gambar
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max 2048 KB (2 MB)
        ], [
            'images.*.max' => 'Setiap gambar harus kurang dari 2MB.',
            'images.*.image' => 'File harus berupa gambar.',
            'images.*.mimes' => 'Format gambar harus: jpeg, png, jpg, gif, svg.',
        ]);

        $imageData = [];
        if ($files = $request->file('images')) {
            foreach ($files as $key => $file) {
                $destinationPath = 'public/images';
                $extension = $file->getClientOriginalExtension();
                $filename = $key . '-' . time() . '.' . $extension;

                // Menyimpan file ke storage
                $path = $file->storeAs($destinationPath, $filename);

                $imageData[] = [
                    'product_id' => $product->id,
                    'image' => $filename,  // Menyimpan path file saja
                ];
            }
        }

        // Menyimpan data ke database
        ProductImage::insert($imageData);

        return redirect()->route('product-image.index', $product)->with('success', 'Uploaded Successfully');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $productImageId)
    {
        $productImage = ProductImage::findOrFail($productImageId);
        if (File::exists($productImage->image)) {
            File::delete($productImage->image);
        }
        $productImage->delete();

        return redirect()->back()->with('status', 'Image Deleted');
    }
}
