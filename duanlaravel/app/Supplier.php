<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table        = 'suppliers';
    protected $fillable     = ['supplier_code', 'supplier_name', 'discription', 'image'];
    protected $guarded      = ['id'];
    protected $primaryKey   = 'id';

    public function product(){
        return $this->hasMany('App\Product', 'supplier_id', 'id');
    }
}
