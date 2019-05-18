<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
  
    protected $table = 'order_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'email',
        'order_id',
        'conversation_id'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */

    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo('App\Models\Order','order_id');
    }    

}