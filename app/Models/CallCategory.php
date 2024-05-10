<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallCategory extends Model
{
    use HasFactory;

    protected $table = 'call_category';
    protected $fillable = [
        'name'
    ];
}
