<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seeker extends Model
{
    use HasFactory;

    protected $casts = [
        'qualifications' => AsArrayObject::class,
        'experiences' => AsCollection::class,
        'created_at' => 'datetime:d-m-y',
        'updated_at' => 'datetime:d-m-y',
        'dateofbirth' => 'date:d-m-y',
    ];

    protected $dateFormat = 'd-m-y';


    protected $fillable = [
        'user_id',
        'phone',
        'city',
        'state',
        'country',
        'dateofbirth',
        'ethnicity',
        'qualifications',
        'experiences',
        'cv',
        'passport',
        'visa',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
