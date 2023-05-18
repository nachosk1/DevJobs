<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacant extends Model
{
    use HasFactory;

    protected $casts = ['last_date' => 'date'];

    protected $fillable = [
        'title',
        'salary_id',
        'category_id',
        'company',
        'last_date',
        'description',
        'image',
        'user_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function salary(){
        return $this->belongsTo(Salary::class);
    }
    public function candidates(){
        return $this->hasMany(Candidate::class);
    }
}
