<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    use HasFactory;

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
}
