@extends('backend.layouts.master')

@section('title')
Sua Loai san pham
@endsection


@section('field_title')
Sua Loai san pham
@endsection

@section('content')
<form name="Category" method="post" action="{{ route('backend.category.update', ['id' => $category->id]) }}" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="Category_code">Ma san pham</label>
    <input value="{{$category->category_code}}" name="Category_code" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="plese input Categorycode">
    <small id="emailHelp" class="form-text text-muted">nhap vao ma san pham nhe</small>
  </div>

  <div class="form-group">
    <label for="Category_code">Ten loai san pham</label>
    <input value="{{$category->category_name}}" name="Category_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="plese input Categoryname">
    <small id="emailHelp" class="form-text text-muted">nhap vao ten san pham nhe</small>
  </div>
  <div class="form-group">
    <label for="Category_code">Mo Ta </label>
    <input value="{{$category->description}}" name="decription" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="plese input decriptsion">
    <small id="emailHelp" class="form-text text-muted">nhap vao mo ta loai san pham nhe</small>
  </div>
  <div class="form-group">
    <label for="Category_code">Ma san pham</label>
    <img src="{{ asset('storage/uploads/'.$category->image)  }}"/>
    <input name="image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="plese input Categorycode">
    <small id="emailHelp" class="form-text text-muted">nhap vao ma san pham nhe</small>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
