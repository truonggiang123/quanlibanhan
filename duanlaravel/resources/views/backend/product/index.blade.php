@extends('backend.layouts.master')

@section('title')
danh sach san pham
@endsection


@section('field_title')
danh sach san pham
@endsection

@section('content')
<h1>Danh sach san pham</h1>
<table class="table table-responsive-sm table-striped">
    <tr>
    <th>Ma sp</th>
    <th>ten sp</th>
    <th>nha cung cap</th>
    <th>san xuan</th>
    </tr>
    @foreach($lisproduct as $product)
    <tr>
        <td>{{$product->product_code}}</td>
         <td>{{$product->product_name}}</td>
        <td>{{$product->category->category_name}}</td>
        <td>{{$product->description}}</td>
    </tr>
    @endforeach
</table>
@endsection