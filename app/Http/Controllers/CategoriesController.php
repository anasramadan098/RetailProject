<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        // // Test Category
        // $category = new Category();
        // $category->name = 'Electronics';
        // $category->save();      
        if (Auth::user()->role == 'admin') {
            return view('admin.categories.index', compact('categories'));
        } else {
            return redirect('/log-in-admin');
        }

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
    public function store(Request $request)
    {
        // Validate Input
        $request->validate([
            'name' => 'required|max:255',
        ]);
        // Create Category
        $category = new Category($request->all());
        $category->save();
        return redirect()->route('categories.index');
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
        // Validate Input
        $request->validate([
            'name' => 'required|max:255',
        ]);
        // Update Category
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete from DB
        Category::destroy($id);
        return redirect()->route('categories.index');

    }
}
