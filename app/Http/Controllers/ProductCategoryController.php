<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::all();
        return view('dashboard.categories.index', [
        'categories' => $categories,
 ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:product_categories,slug',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $imagePath = null;
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
        }

        ProductCategory::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'image' => $imagePath,
        ]);
    
        return redirect()->route('categories.index')->with('successMessage', 'Kategori berhasil ditambahkan.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = ProductCategory::find($id);
        return view('dashboard.categories.detail',[
        'category'=>$category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = ProductCategory::find($id);
        return view('dashboard.categories.edit',[
        'category'=>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /**
         * cek validasi input
         */
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required'
        ]);
        /**
        * jika validasi gagal,
        * maka redirect kembali dengan pesan error
        */
        if ($validator->fails()) {
            return redirect()->back()->with(
            [
            'errors'=>$validator->errors(),
            'errorMessage'=>'Validasi Error, Silahkan
            lengkapi data terlebih dahulu'
        ]
        );
        }
        $category = ProductCategory::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' .
            $image->getClientOriginalName();
            $imagePath = $image->storeAs('uploads/categories',
            $imageName, 'public');
            $category->image = $imagePath;
        }
        $category->save();
        return redirect()->back()
        ->with(
        [
            'successMessage'=>'Data Berhasil Disimpan'
        ]
        );
           
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProductCategory::destroy($id);
        return redirect()->route('categories.index')->with('successMessage', 'Kategori berhasil dihapus.');
    }
}
