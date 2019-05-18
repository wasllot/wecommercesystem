<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'rating';

    protected $fillable = [
    	'product_id',
    	'rating',
    	'user_id'	
    ];

    public $timestamps = false;
    

     public function products()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
    public function users()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

}
