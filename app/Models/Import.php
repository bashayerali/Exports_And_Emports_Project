<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;
    protected $fillable = [
        'Export_num',
        'received_date',
        'im_status',
        'receiver_name',
        'comment',
        
    ];

    public function ex()
    {
        return $this->belongsTo(Export::class,'Export_num','num');
    }

}
