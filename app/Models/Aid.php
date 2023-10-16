<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\User;
use App\Models\Convoy;
use App\Models\Export;
use App\Models\AidType;
use App\Models\Warehouse;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aid extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'convoy_id',
    ];

    public function convoy()
    {
        return $this->belongsTo(Convoy::class);
    }

    public function aidType()
    {
        return $this->belongsTo(AidType::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($aid) {
            $aid->user_id = auth()->user()->id;
        });
    }

    public function exports()
    {
        return $this->hasMany(Export::class);
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
