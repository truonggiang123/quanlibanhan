@extends('backend.layouts.master')

@section('title')
danh sach Loai san pham
@endsection


@section('field_title')
danh sach Loai san pham
@endsection

@section('content')
<h1>Danh sach san pham</h1>
<a class="btn btn-primary" href="{{ route('backend.category.create')  }}">ADD</a>
<table class="table table-responsive-sm table-striped">
    <tr>
    <th>Ma lsp</th>
    <th>ten sp</th>
    <th>Mo ta</th>
    <th>hinh anh</th>
    <th>chuc nang</th>
    </tr>
    @foreach($listcategories as $category)
    <tr>
        <td>{{ $category->category_code }}</td>
         <td>{{ $category->category_name }}</td> 
        <td>{{ $category->description}}</td>
        <td>
              <img src="{{ asset('storage/uploads/'.$category->image)  }}" />;
        </td>
        <td><a class="btn btn-primary" href="{{ route('backend.category.edit', ['id' => $category->id]) }}">update</a></td>
    </tr>
   
    @endforeach
</table>
@endsection