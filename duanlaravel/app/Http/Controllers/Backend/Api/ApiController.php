<?php

namespace App\Http\Controllers\Backend\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ApiController extends Controller
{
    public function getProductcount()
    {
        $data = DB::select('
     SELECT COUNT(*) as soluong from product;
');
        return response()->json(array(
            'code'  => 200,
            'data' => $data,
        ));
    }

    public function getStatiticsCategoryProductCount()
    {
        // raw sql
        $data = DB::select('
            SELECT c.category_name AS TenLoaiSanPham, COUNT(*) AS SoLuong
            FROM product p
            JOIN categories c ON p.category_id = c.id
            GROUP BY c.category_name
            ORDER BY COUNT(*) DESC;
        ');
        return response()->json(array(
            'code'  => 200, // HTTP status code 200, 201, 301, 302, 303, 404, 500...
            'data' => $data,
        ));
    }
}
