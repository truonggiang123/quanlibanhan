@extends('backend.layouts.master')

@section('title')
danh sach Loai san pham
@endsection


@section('field_title')
danh sach Loai san pham
@endsection

@section('content')
<h1>Danh sach san pham</h1>
<a class="btn btn-primary" href="{{ route('backend.product.create')  }}">ADD</a>

<table class="table table-bordered table-striped table-responsive">
    <tr>
        <th>Ma lsp</th>
        <th>ten sp</th>
        <th>Mo ta</th>
        <th>hinh anh</th>
        <th>chi phi chuan</th>
        <th>list_price</th>
        <th>quantity_per_unit </th>
        <th>discontinue</th>
        <th>discount</th>
        <th>category_name</th>
        <th>supplier_name</th>
        <th>chuc nang</th>
    </tr>
    @foreach($lisproduct as $product)
    <tr>
        <td>{{ $product->product_code }}</td>
        <td>{{ $product->product_name }}</td>
        <td>{{ $product->description}}</td>
        <td>
            <img class="img-fluid" src="{{ asset('storage/uploads/'.$product->image)  }}" />
        </td>
        <td>{{ $product->standar_cost}}</td>
        <td>{{ $product->list_price}}</td>
        <td>{{ $product->quantity_per_unit }}</td>
        <td>{{ $product->discontinue }}</td>
        <td>{{ $product->discount }}</td>
        <td>{{ $product->category->category_name }}</td>
        <td>{{ $product->supplier->supplier_name }}</td>
        <td>
            <div class="btn-group-vertical">
                <a class="btn btn-primary" href="{{ route('backend.product.edit', ['id' => $product->id]) }}">update</a><br>
            </div>
            <form id="frmDeleteProduct" name="frmDeleteProduct" method="post" action="{{ route('backend.product.destroy', ['id' => $product->id]) }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE" />
                <button class="btn btn-danger btn-icon-split btn-delete">
                    <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Xóa</span>
                </button>
            </form>
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
                    $('#frmDeleteProduct').submit();
                }
            })

        })

    })
</script>
@endsection