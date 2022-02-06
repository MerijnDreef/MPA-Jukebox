<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedListsSongs extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function SavedLists()
    {
        return $this->belongsTo(SavedLists::class);
    }

    public function Songs()
    {
        return $this->belongsTo(Songs::class);
    }
}
