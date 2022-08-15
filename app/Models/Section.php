<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'status',
        'grade_id',
        'classroom_id',
    ];

    public $translatable = ['name'];

    public function classroom()
    {
        return $this->belongsTo(classroom::class, 'classroom_id');
    }
}
