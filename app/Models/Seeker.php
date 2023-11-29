<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Casts\AsArrayObject;
// use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seeker extends Model
{
    use HasFactory;

    protected $casts = [
        // 'qualifications' => AsArrayObject::class,
        // 'experiences' => AsCollection::class,
        // 'created_at' => 'datetime',
        // 'updated_at' => 'datetime',
        // 'dateofbirth' => 'date:m-d-y',
    ];

    // protected $dateFormat = 'd-m-y';


    protected $fillable = [
        'user_id',
        'phone',
        'city',
        'state',
        'country',
        'dateofbirth',
        'ethnicity',
        'skills',
        'profession',
        'cv',
        'passport',
        'visa',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }

    public function qualifications()
    {
        return $this->hasMany(Qualification::class);
    }

}
