<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'notes',
        'status',
        'date',
        'num',
        'sender_name',
        'sender_department',
        'receiver_department',
    ];


    public function d()
    {
      return $this->belongsTo(Department::class,'sender_department');
    
    } 
    public function d1()
    {
      return $this->belongsTo(Department::class,'receiver_department');
    
    } 
    public function im()
    {
        return $this->hasOne(Import::class,'Export_num','num');
    }
    
}
