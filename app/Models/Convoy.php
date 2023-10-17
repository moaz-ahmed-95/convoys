<?php

namespace App\Models;

use App\Models\Aid;
use App\Models\User;
use App\Models\Country;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Convoy extends Model
{
    use HasFactory, LogsActivity, SoftDeletes;

    protected $casts = [
        'arrival_date' => 'datetime',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function aids()
    {
        return $this->hasMany(Aid::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($convoy) {
            $convoy->user_id = auth()->user()->id;
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*']);
    }
}
