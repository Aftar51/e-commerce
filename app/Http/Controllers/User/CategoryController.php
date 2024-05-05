<?php

namespace App\Http\Controllers\user;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = category::select('id', 'name', 'image')->latest()->get();
        return view('pages.user.category.index', compact(
            'category'
        ));
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
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);


        try {
            $data = $request->all();

            // storage image
            $image = $request->file('image');
            $image->storeAs('public/category', $image->hashName());

            $data['image'] = $image->hashName();
            $data['slug'] = Str::slug($request->name);

            Category::create($data);

            return redirect()->back()->with('success', 'successfully');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to add failed');
        }
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
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        
        $category = Category::find($id);

        try {
            if ($request->file('image') == '') {
                $data = $request->all();
                $data['slug'] = Str::slug($request->name);
                
                $category->update($data);

                return redirect()->back()->with('success', 'successfully');
            } else {
                //delete old image
                Storage::disk('local')->delete('public/category/' . basename($category->image));

                //storage new image
                $image = $request->file('image');
                $image->storeAs('public/category', $image->hashName());

                $data = $request->all();
                $data['image'] = $image->hashName();
                $data['slug'] = Str::slug($request->name);

                $category->update($data);
            }

            return redirect()->back()->with('success', 'successfully');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // find by id
            $category = Category::find($id);

            Storage::disk('local')->delete('public/category/' . basename($category->image));

            $category->delete();

            return redirect()->back()->with('success', 'successfully');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to add failed');
        }
    }
}
