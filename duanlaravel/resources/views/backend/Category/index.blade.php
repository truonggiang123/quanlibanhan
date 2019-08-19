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
            <img class="img-fluid" src="{{ asset('storage/uploads/'.$category->image)  }}" />
        </td>
        <td>

            <div class="btn-group-vertical">
                <a class="btn btn-primary" href="{{ route('backend.category.edit', ['id' => $category->id]) }}">update</a><br>
                <form id="formdelete" name="formdelete" method="post" action="{{ route('backend.category.destroy', ['id' => $category->id]) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE" />
                    <button class="btn btn-danger btn-icon-split btn-delete" id="{{ $category->id }}">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Xóa</span>
                    </button>
                </form>
            </div>
        </td>
    </tr>

    @endforeach
</table>
@endsection
    @section('Custom-script')
<script>
    $(document).ready(function() {
        // Gọi thử SweetAlert
        //Swal.fire('Hello world!');
        $('.btn-delete').click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Bạn có chắc thực hiện thao tác không?',
                text: "Khi xóa thành công không thể phục hồi được",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Thực hiện XÓA!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Đã xóa thành công!',
                        'Sản phẩm đã được xóa.',
                        'success'
                    )
                    // Submit form
                    $('#formdelete').submit();
                }
            });
        });
    });
</script>
@endsection
