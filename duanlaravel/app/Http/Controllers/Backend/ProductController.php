<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Supplier;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
  public function index()
  {
    $list = Product::all();
    return view('backend.product.index')
      ->with('lisproduct', $list);
  }

  public function create()
  {
    $listCategory = Category::all();
    $listSuppliers = Supplier::all();
    return view('backend.product.create')
      ->with('listCategory', $listCategory)
      ->with('listSuppliers', $listSuppliers);
  }

  public function store(Request $request)
  {
    $product = new Product();
    $product->product_code = $request->product_code;
    $product->product_name = $request->product_name;
    $product->description = $request->decription;
    $product->image = $request->image;
    $product->standar_cost = $request->standar_cost;
    $product->list_price = $request->list_price;
    $product->quantity_per_unit = $request->quantity_per_unit;

    //su dung checkbox

    // $product->discount= $request->discount;
    if ($request->has('discontinue')) {
      $product->discontinue = 1;
    } else {
      $product->discontinue = 0;
    }

    $product->discount = $request->discount;

    $product->category_id = $request->category_id;
    $product->suppliers_id = $request->suppliers_id;


    if ($request->hasFile('image')) {
      $file = $request->image;
      // Lưu tên hình vào column sp_hinh
      $product->image = $file->getClientOriginalName();

      // Chép file vào thư mục "photos"
      $fileSaved = $file->storeAs('public/uploads', $product->image);
    }

    $product->save(); //luu lai vao co so du lieu


    return redirect()->route('backend.product.index'); // trong route la backend.Category.index
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
    $product = Product::find($id);
    $listCategory = Category::all();
    $listSuppliers = Supplier::all();
    return view('backend.product.edit')
      ->with('product', $product)
      ->with('listCategory',$listCategory)
      ->with('listSuppliers',$listSuppliers);
  }
  public function update(Request $request, $id)
    {
      $product =Product::find($id);
      $product->product_code = $request->product_code;
      $product->product_name = $request->product_name;
      $product->description = $request->decription;
      if(!empty($request->image))
      {
      $product->image = $request->image;
      }
      $product->standar_cost = $request->standar_cost;
      $product->list_price = $request->list_price;
      $product->quantity_per_unit = $request->quantity_per_unit;
  
      //su dung checkbox
  
      // $product->discount= $request->discount;
      if ($request->has('discontinue')) {
        $product->discontinue = 1;
      } else {
        $product->discontinue = 0;
      }
  
      $product->discount = $request->discount;
  
      $product->category_id = $request->category_id;
      $product->suppliers_id = $request->suppliers_id;
  
  
      if ($request->hasFile('image')) {

        //xoa file rac
        Storage::delete('public/uploads/'. $product->image);

        $file = $request->image;
        // Lưu tên hình vào column sp_hinh
        $product->image = $file->getClientOriginalName();
  
        // Chép file vào thư mục "photos"
        $fileSaved = $file->storeAs('public/uploads', $product->image);
      }
      $product->save(); //luu lai vao co so du lieu
  
  
      return redirect()->route('backend.product.index'); // trong route la backend.Category.index
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('backend.product.index');
    }

}
