<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
   protected $fillable = ['title', 'description', 'thumbnail', 'category_id'];

   public function lessons(){
    return $this->hasMany(Lessons::class);
   }

   public function category(){
      return $this->belongsTo(Categories::class, 'category_id');
   }
}
