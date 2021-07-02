<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class subject extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected  $table = "subject";
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'subject_name',
        'status',
        
    ];
}
