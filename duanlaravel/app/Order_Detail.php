<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    protected $table        = 'order_details';
    protected $fillable     = ['quantily', 'unit_price', 'discount', 'order_detail_status', 'date_allocated'];
    protected $guarded      = ['order_id','product_id'];
    protected $primaryKey   = 'order_id, product_id' ;

    //Tạo quan hệ vs order và product
    public function order(){
        return $this->belongsTo('App\Order', 'order_id', 'id');
    }
    public function product(){
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
