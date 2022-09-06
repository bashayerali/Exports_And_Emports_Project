<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
       
    ];



    public function u()
    {
      return $this->hasMany(User::class,'department_id');
    
    }

    public function o()
    {
      return $this->hasMany(Export::class,'sender_department');
    
    }

    public function o1()
    {
      return $this->hasMany(Export::class,'receiver_department');
    
    }
}
