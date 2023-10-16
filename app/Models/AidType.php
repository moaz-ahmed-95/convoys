<?php

namespace App\Models;

use App\Models\Aid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AidType extends Model
{
    use HasFactory;

    public function aids()
    {
        return $this->hasMany(Aid::class);
    }
}
