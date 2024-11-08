<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'status','short_description','banner_image','preview_image','slug'
    ];

  /**
     * The applications that belong to the product.
     */
    public function applications()
    {
        return $this->belongsToMany(Application::class);

    }
    public function FAQ()
    {
        return $this->hasMany(FAQ::class);
    }
   
}
