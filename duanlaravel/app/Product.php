<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $table        = 'product';
    protected $fillable     = ['product_code', 'product_name', 'description', 'image', 'standar_cost', 'list_price', 'quantity_per_unit', 'discontinue', 'discount', 'category_id', 'suppliers_id'];
    protected $guarded      = ['id'];
    protected $primaryKey   = 'id';
    //Tạo quan hệ vs categories
    public function category(){
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
    public function supplier(){
        return $this->belongsTo('App\Supplier', 'suppliers_id', 'id');
    }

    //Tạo quan hệ cha đối với order_detail
    public function order_detail(){
        return $this->hasMany('App\Order_Detail', 'product_id', 'id');
    }
    
}
