<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedListsSongs extends Model
{
    use HasFactory;

    public function SavedListsSongs()
    {
        return $this->hasMany(Songs::class);
    }
}
