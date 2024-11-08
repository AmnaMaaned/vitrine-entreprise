<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{

      /**
     * The products that belong to the application.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'status','description','short_description','banner_image','preview_image','slug'
    ];
}

