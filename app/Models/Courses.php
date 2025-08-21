<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
   protected $fillable = ['title', 'description', 'thumbnail', 'instructor_id,'];

   public function instructor()
   {
    return $this->belongsTo(User::class, 'instructor_id');
   }

   public function lessons(){
    return $this->hasMany(Lessons::class);
   }
}
