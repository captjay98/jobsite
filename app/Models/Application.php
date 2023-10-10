<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'seeker_id',
        'job_id',
        'status',

    ];

    public function seeker()
    {
        return $this->hasMany(Seeker::class);
    }

    public function job()
    {
        return $this->hasMany(Job::class);
    }

}
