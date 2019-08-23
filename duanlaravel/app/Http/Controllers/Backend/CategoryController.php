<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CategorycreateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
// use Illuminate\Support\Facades\Schema;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.Category.index')
            ->with('listcategories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategorycreateRequest $request)
    {
        $categories = new Category();
        $categories->category_code = $request->category_code;
        $categories->category_name = $request->category_name;
        $categories->description = $request->decription;
        $categories->image = $request->image;
        if ($request->hasFile('image')) {
            $file = $request->image;
            // Lưu tên hình vào column sp_hinh
            $categories->image = $file->getClientOriginalName();

            // Chép file vào thư mục "photos"
            $fileSaved = $file->storeAs('public/uploads', $categories->image);
        }

        $categories->save(); //luu lai vao co so du lieu


        return redirect()->route('backend.category.index'); // trong route la backend.Category.index
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('backend.Category.edit')
            ->with('category', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categories = Category::find($id);
        $categories->category_code = $request->Category_code;
        $categories->category_name = $request->Category_name;
        $categories->description = $request->decription;
        if (!empty($request->image)) {
            $categories->image = $request->image;
        }

        if ($request->hasFile('image')) {
            $file = $request->image;
            // Lưu tên hình vào column sp_hinh
            $categories->image = $file->getClientOriginalName();

            // Chép file vào thư mục "photos"
            $fileSaved = $file->storeAs('public/uploads', $categories->image);
        }

        $categories->save(); //luu lai vao co so du lieu


        return redirect()->route('backend.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Schema::enableForeignKeyConstraints();
        Category::find($id)->delete();
        return redirect()->route('backend.category.index');
    }
    public function print()
    {
        $lstCategories = Category::all();
        return view('backend.Category.print')
            ->with('lstCategories', $lstCategories);
    }
}
