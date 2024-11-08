<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table = 'faq';
 
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question', 'response', 'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
 