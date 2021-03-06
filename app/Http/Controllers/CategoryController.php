<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index', [
            'title' => 'Kategori Produk',
            'categories' => Category::paginate(7)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255', 'unique:categories']
        ]);
        Category::create($validatedData);
        return redirect('/categories')->with('messageSuccess', 'Kategori berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return response()->json([
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $rules = [
            'name' => ['required', 'max:255'],
        ];

        if ($request->name != $category->name) {
            $rules['name'] = ['required', 'unique:categories'];
        }

        $validatedData = $request->validate($rules);

        Category::where('id', $category->id)->update($validatedData);
        return redirect('/categories')->with('messageSuccess', 'Kategori berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect('/categories')->with('messageSuccess', 'Kategori berhasil dihapus');
    }
}
