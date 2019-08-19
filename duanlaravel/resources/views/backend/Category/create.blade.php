@extends('backend.layouts.master')

@section('title')
Them Loai san pham
@endsection


@section('field_title')
Them Loai san pham
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
<form name="Category" id="Category" method="post" action="{{ route('backend.category.store') }}" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="Category_code">Ma san pham</label>
    <input name="category_code" type="text" class="form-control" id="Category_code" aria-describedby="emailHelp" placeholder="plese input Categorycode">
    <small id="emailHelp" class="form-text text-muted">nhap vao ma san pham nhe</small>
  </div>

  <div class="form-group">
    <label for="Category_code">Ten loai san pham</label>
    <input name="category_name" type="text" class="form-control" id="Category_name" aria-describedby="emailHelp" placeholder="plese input Categoryname">
    <small id="emailHelp" class="form-text text-muted">nhap vao ten san pham nhe</small>
  </div>
  <div class="form-group">
    <label for="Category_code">Mo Ta </label>
    <input name="decription" type="text" class="form-control" id="decription" aria-describedby="emailHelp" placeholder="plese input decriptsion">
    <small id="decription" class="form-text text-muted">nhap vao mo ta loai san pham nhe</small>
  </div>
  <div class="form-group">
    <label for="Category_code">Ma san pham</label>
    <input name="image" type="file" class="form-control" id="image" aria-describedby="emailHelp" placeholder="plese input Categorycode">
    <small id="emailHelp" class="form-text text-muted">nhap vao ma san pham nhe</small>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
@section('Custom-script')
<script>
  $(document).ready(function() {
    $("#Category").validate({
      rules: {
        Category_code: {
          required: true,
          minlength: 3,
          maxlength: 50
        },
        Category_name: {
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
        Category_code: {
          required: "Vui lòng nhập tên Chủ đề",
          minlength: "Tên Chủ đề phải có ít nhất 3 ký tự",
          maxlength: "Tên Chủ đề không được vượt quá 50 ký tự"
        },
        Category_name: {
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