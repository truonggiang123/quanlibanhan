@extends('backend.layouts.master')

@section('title')
Man Hinh Quan tri
@endsection


@section('field_title')
Man hinh quan tri
@endsection
@section('content')


<div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="productCountText"> </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" id="btnRefreshProductCount" >Refresh san pham</button>
                    </div>
              </div>
            </div>
</div>  

<div class="row">
    <div class="col-md-6">
    <button class="btn btn-primary" id="btnDrawChartJs">Vẽ biểu đồ</button>
        <canvas id="chartOfobjChart" style="width: 100%;height: 400px;"></canvas>
    </div>
</div>

@endsection

@section('Custom-script')


<script src="{{ asset('vendor/nummeral/numeral.min.js') }}"></script>
<script>
    // Đăng ký tiền tệ VNĐ
    numeral.register('locale', 'vi', {
        delimiters: {
            thousands: ',',
            decimal: '.'
        },
        abbreviations: {
            thousand: 'k',
            million: 'tr',
            billion: 'ty',
            trillion: 'tyty'
        },
        ordinal: function(number) {
            return number === 1 ? 'một' : 'không';
        },
        currency: {
            symbol: 'vnđ'
        }
    });
    // Sử dụng locate vi (Việt nam)
    numeral.locale('vi');
</script>

<script src="{{ asset('vendor/Charjs/Chart.min.js') }}"></script>




<script>
$(document).ready(function() {
    function getProductCount()
    {
        // Nhờ AJAX gởi request đến url /admin/api/getProductCount
        $.ajax('{{ route('backend.api.getProductcount') }}', {
            success: function (data) {
                $('#productCountText').html(data.data[0].soluong + ' sản phẩm');
            },
            error: function () {
                $('#productCountText').html('Không xử lý được!');
            }
        }); 
    }
    $('#btnRefreshProductCount').click(function(e) {
        getProductCount();
        
    });
   //ONload
   getProductCount();
   
   var objChart;
        var $chartOfobjChart = document.getElementById("chartOfobjChart").getContext("2d");
          function getproduct()
          {

            $.ajax({
                url: '{{ route('backend.api.getStatiticsCategoryProductCount') }}',
                type: "GET",
                success: function(response) {
                    var myLabels = [];
                    var myData = [];
                    $(response.data).each(function() {
                        myLabels.push((this.TenLoaiSanPham));
                        myData.push(this.SoLuong);
                    });
                    myData.push(0); // creates a '0' index on the graph
                    if (typeof $objChart !== "undefined") {
                        $objChart.destroy();
                    }
                    $objChart = new Chart($chartOfobjChart, {
                        // The type of chart we want to create
                        type: "horizontalBar",
                        data: {
                            labels: myLabels,
                            datasets: [{
                                data: myData,
                                borderColor: "#b3ffe6",
                                backgroundColor: "#ff1ab3",
                                borderWidth: 1
                            }]
                        },
                        // Configuration options go here
                        options: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: "Báo cáo Số lượng Loại sản phẩm"
                            },
                        }
                    });
                }
            });



          }
         
        $("#btnDrawChartJs").click(function(e) {
            e.preventDefault();
            getproduct();
        });
      //load
      getproduct();

});
</script>

@endsection