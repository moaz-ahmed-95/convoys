<?php

namespace App\Models;

use App\Models\Aid;
use App\Models\Unit;
use App\Models\User;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Export extends Model
{
    use HasFactory, LogsActivity, SoftDeletes;

    protected $casts = [
        'export_date' => 'datetime',
    ];

    public function aid()
    {
        return $this->belongsTo(Aid::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($export) {
            $export->user_id = auth()->user()->id;
            $export->destination = 'غزة';
        });
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['*']);
    }
}
