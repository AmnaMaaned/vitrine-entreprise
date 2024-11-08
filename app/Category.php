<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

   
   
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','title', 'description', 'status','short_description','banner_image','preview_image','slug'
    ];

    
    public function applications()
    {
        return $this->belongsToMany(Application::class);
    }
   
}
