<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table        = 'orders';
    protected $fillable     = ['order_date', 'shipped_date', 'ship_name', 'ship_address1', 'ship_address2', 'ship_city', 'ship_state', 'ship_postal_code', 'ship_country', 'shipping_fee', 'payment_type', 'paid_date', 'order_status', 'employee_id', 'customer_id'];
    protected $guarded      = ['id'];
    protected $primaryKey   = 'id';
    //Tạo quan hệ vs employee và customer
    public function employee(){
        return $this->belongsTo('App\Employee', 'employee_id', 'id');
    }
    public function customer(){
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }

    //Tạo quan hệ cha đối với order_detail
    public function order_detail(){
        return $this->hasMany('App\Order_Detail', 'order_id', 'id');
    }
}
