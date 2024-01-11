<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;


class CategoryController extends Controller
{
    public function index()
    {
        $categories= categories::all();
        return view('category',['categories' => $categories]);
    }

    public function add()
    {
    
        return view ('category-add');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]); 
        
        $category =categories::create($request->all());
        return redirect('categories')->with('status','Category added successfully');
    }

    public function edit($slug)
    {
        $category = categories::where('slug',$slug)->first();
        return view('category-edit',['category'=>$category]);
    }

    public function update(Request $request, $slug)//masih error gabisa masuk di halaman
    {
       
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);

        $category = categories::where('slug',$slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('categories')->with('status', 'Category Updated Sucessfully');
    }

    public function delete($slug)//delete prosess dimana untuk menghapus data
    {
        $category = categories::where('slug',$slug)->first();
        return view ('category-delete', ['category' => $category]); 
        $category->delete();
        return redirect('categories')->with('status', 'Category Deleted Sucessfully');
    }

    public function destroy($slug)//destroy prosess dimana untuk menghapus data
    {
        $category = categories::where('slug',$slug)->first();
        $category->delete();
        return redirect('categories')->with('status', 'Category Deleted Sucessfully');
    }

    public function deletedCategory()//untuk menampilkan data yang di hapus
    {
        $deletedCategories = categories::onlyTrashed()->get();
        return view('category-deleted-list',['deletedCategories' => $deletedCategories]);
    }

    public function restore ($slug) //restore prosess dimana untuk mengembalikan data
    {
        $category = categories::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('categories')->with('status', 'Category restored Sucessfully');
    }
}