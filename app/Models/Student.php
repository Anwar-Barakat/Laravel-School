<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory, HasTranslations, SoftDeletes, Notifiable;

    protected $guard = 'student';

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'birthday',
        'nationality_id',
        'blood_id',
        'grade_id',
        'classroom_id',
        'section_id',
        'parent_id',
        'academic_year',
    ];

    protected $hidden = ["deleted_at"];

    protected $translatable = ['name'];

    public function createdAt(): Attribute
    {
        return new Attribute(
            get: function ($value) {
                return Carbon::parse($this->attributes['created_at'])->format('Y-m-d');
            }
        );
    }

    public function gender(): Attribute
    {
        return new Attribute(
            get: function ($value) {
                if ($value === 0)
                    return 'male';
                else
                    return 'female';
            }
        );
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function myParent()
    {
        return $this->belongsTo(MyParent::class, 'parent_id');
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id');
    }

    public function blood()
    {
        return $this->belongsTo(Blood::class, 'blood_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function studentAccounts()
    {
        return $this->hasMany(StudentAccount::class, 'student_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'student_id');
    }
}
