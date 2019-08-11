<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table        = 'products';
    protected $fillable     = ['product_code', 'product_name', 'image', 'description', 'standard_code', 'list_price', 'quantily_per_unit', 'discontinued', 'discount', 'category_id', 'supplier_id'];
    protected $guarded      = ['id'];
    protected $primaryKey   = 'id';
    //Tạo quan hệ vs categories
    public function category(){
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
    public function supplier(){
        return $this->belongsTo('App\Supplier', 'supplier_id', 'id');
    }

    //Tạo quan hệ cha đối với order_detail
    public function order_detail(){
        return $this->hasMany('App\Order_Detail', 'product_id', 'id');
    }
    
}
