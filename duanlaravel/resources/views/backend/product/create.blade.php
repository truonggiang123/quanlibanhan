@extends('backend.layouts.master')

@section('title')
Them san pham
@endsection


@section('field_title')
Them san pham
@endsection

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form name="product" id="product" method="post" action="{{ route('backend.product.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="product_code">Ma san pham</label>
        <input name="product_code" type="text" class="form-control" id="product_code" aria-describedby="emailHelp" placeholder="plese input productcode">
        <small id="emailHelp" class="form-text text-muted">nhap vao ma san pham nhe</small>
    </div>

    <div class="form-group">
        <label for="product_name">Ten loai san pham</label>
        <!-- su dung du lieu duoc luu trong secsion -->
        <input value="{{ old('product_name') }}" name="product_name" type="text" class="form-control" id="product_name" aria-describedby="emailHelp" placeholder="plese input productname">
        <small id="emailHelp" class="form-text text-muted">nhap vao ten san pham nhe</small>
    </div>

    <div class="form-group">
        <label for="decription">Mo Ta </label>
        <input name="decription" type="text" class="form-control" id="decription" aria-describedby="emailHelp" placeholder="plese input decriptsion">
        <small id="decription" class="form-text text-muted">nhap vao mo ta san pham nhe</small>
    </div>

    <div class="form-group">
        <label for="product_code">Ma san pham</label>
        <input name="image" type="file" class="form-control" id="image" aria-describedby="emailHelp" placeholder="plese input productcode">
        <small id="emailHelp" class="form-text text-muted">nhap vao hinh anh san pham nhe</small>
    </div>

    <div class="form-group">
        <label for="standar_cost">Ma san pham</label>
        <input name="standar_cost" type="text" class="form-control" id="standar_cost" aria-describedby="emailHelp" placeholder="plese input standar_cost">
        <small id="standar_cost" class="form-text text-muted">nhap vao chi phi chuan nhe</small>
    </div>

    <div class="form-group">
        <label for="list_price">Ma san pham</label>
        <input name="list_price" type="text" class="form-control" id="list_price" aria-describedby="emailHelp" placeholder="plese input list_price">
        <small id="list_price" class="form-text text-muted">nhap vao bang gia nhe</small>
    </div>

    <div class="form-group">
        <label for="quantity_per_unit">Ma san pham</label>
        <input name="quantity_per_unit" type="text" class="form-control" id="quantity_per_unit" aria-describedby="emailHelp" placeholder="plese input quantity_per_unit">
        <small id="quantity_per_unit" class="form-text text-muted">nhap vao quantity_per_unit nhe</small>
    </div>

    

    <div class="form-group">
        <div class="form-check">
            <input name="discontinue" type="checkbox" class="form-check-input" id="discontinue">
            <label class="form-check-label" for="exampleCheck1">Ngung ban san pham ?</label>
        </div>
    </div>
    <div class="form-group">
        <label for="discount">Ma san pham</label>
        <input name="discount" type="text" class="form-control" id="discount" aria-describedby="emailHelp" placeholder="plese input discontinue">
        <small id="discontinue" class="form-text text-muted">nhap vao discontinue nhe</small>
    </div>

    <div class="form-group">
        <label for="product_code">Ma Loai san pham</label>
        <select class="form-control" name="category_id" id="category_id">
            @foreach($listCategory as $category)
            @if(old('category_id') == $category->id)

            <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>


            @else
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endif
            @endforeach

        </select>

        <div class="form-group">
            <label for="product_code">Ma Loai san pham</label>
            <select class="form-control" name="suppliers_id" id="suppliers_id">
                @foreach($listSuppliers as $supplier)


                <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>

                @endforeach

            </select>

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
@section('Custom-script')
<script>
    $(document).ready(function() {
        $("#product").validate({
            rules: {
                product_code: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                product_name: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                decription: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
            },
            messages: {
                product_code: {
                    required: "Vui lòng nhập tên Chủ đề",
                    minlength: "Tên Chủ đề phải có ít nhất 3 ký tự",
                    maxlength: "Tên Chủ đề không được vượt quá 50 ký tự"
                },
                product_name: {
                    required: "Vui lòng nhập tên Chủ đề",
                    minlength: "Tên Chủ đề phải có ít nhất 3 ký tự",
                    maxlength: "Tên Chủ đề không được vượt quá 50 ký tự"
                },
                decription: {
                    required: "Vui lòng nhập tên Chủ đề",
                    minlength: "Tên Chủ đề phải có ít nhất 3 ký tự",
                    maxlength: "Tên Chủ đề không được vượt quá 50 ký tự"
                },

            },
            errorElement: "em",
            errorPlacement: function(error, element) {
                // Thêm class `invalid-feedback` cho field đang có lỗi
                error.addClass("invalid-feedback");
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
                // Thêm icon "Kiểm tra không Hợp lệ"
                if (!element.next("span")[0]) {
                    $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>")
                        .insertAfter(element);
                }
            },
            success: function(label, element) {
                // Thêm icon "Kiểm tra Hợp lệ"
                if (!$(element).next("span")[0]) {
                    $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>")
                        .insertAfter($(element));
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            }
        });
    });
</script>
@endsection