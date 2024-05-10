<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    use HasFactory;

    protected $table = 'call';
    protected $fillable = [
        'title',
        'description',
        'solution_date',
        'category_id',
        'situation_id'
    ]; 

    public function category() {
        return $this->belongsTo(CallCategory::class, 'category_id');
    }
    public function situation() {
        return $this->belongsTo(Situation::class, 'situation_id');
    }
}
