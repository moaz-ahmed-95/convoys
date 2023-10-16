<?php

namespace App\Models;

use App\Models\Aid;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AidType extends Model
{
    use HasFactory, LogsActivity;

    public function aids()
    {
        return $this->hasMany(Aid::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
    }
}
