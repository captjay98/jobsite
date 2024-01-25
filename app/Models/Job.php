<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use Illuminate\Database\Eloquent\Relations\belongsTo;

// use Application;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'title',
        'company',
        'description',
        'industry',
        'salary',
        'city'
    ];

    public function applications(): belongsToMany
    {
        return $this->belongsToMany(Application::class);
    }

    public function employer(): belongsTo
    {
        return $this->belongsTo(Employer::class);
    }
}
