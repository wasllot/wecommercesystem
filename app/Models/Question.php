<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Question extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($question) {
            $question->slug = str_slug($question->slug);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // protected $guarded = [];

    protected $fillable = ['title','slug','body','user_id','product_id'];

    protected $with = ['replies'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class)->latest();
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getPathAttribute()
    {
        return "/question/$this->slug";
    }
}
