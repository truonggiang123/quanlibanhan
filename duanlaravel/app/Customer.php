<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table        = 'customers';
    protected $fillable     = ['last_name', 'first_name', 'email', 'company', 'phone', 'address1', 'address2', 'city', 'state', 'postal_code', 'country'];
    protected $guarded      = ['id'];
    protected $primaryKey   = 'id';

    public function order(){
        return $this->hasMany('App\Order', 'customer_id', 'id');
    }
}
