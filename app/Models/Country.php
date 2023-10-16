<?php

namespace App\Models;

use App\Models\Convoy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    public function convoys()
    {
        return $this->hasMany(Convoy::class);
    }
}
