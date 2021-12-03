<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', [
            'title' => 'Produk',
            'products' => Product::with('category')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create', [
            'title' => 'Tambah Produk',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validate([
            'name'          => ['required', 'max:255', 'unique:products'],
            'category_id'   => ['required'],
            'price'         => ['required'],
            'description'   => ['required'],
            'image'         => ['required', 'image', 'file', 'max:1024']
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('product-images');
        }

        Product::create($validatedData);
        return redirect('/products')->with('messageSuccess', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json([
            'product' => $product->load('category')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'title' => 'Edit Produk',
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $rules = [
            'name'          => ['required', 'max:255'],
            'category_id'   => ['required'],
            'price'         => ['required'],
            'description'   => ['required'],
            'image'         => ['image', 'file', 'max:1024']
        ];

        if ($request->name != $product->name) {
            $rules['name'] = ['required', 'unique:products'];
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage && $request->oldImage != 'product-images/default-image.jpg') {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('product-images');
        }

        Product::where('id', $product->id)->update($validatedData);

        return redirect('/products')->with('messageSuccess', 'Produk berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image && $product->image != 'product-images/default-image.jpg') {
            Storage::delete($product->image);
        }
        Product::destroy($product->id);
        return redirect('/products')->with('messageSuccess', 'Produk berhasil dihapus');
    }
}
