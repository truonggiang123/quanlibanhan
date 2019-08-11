<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $table        = 'categories';
    protected $fillable     = ['category_code', 'category_name', 'discription', 'image'];
    protected $guarded      = ['id'];
    protected $primaryKey   = 'id';
//Tạo liên kết vs products
    public function product(){
        return $this->hasMany('App\Product', 'category_id', 'id');
    }
}
