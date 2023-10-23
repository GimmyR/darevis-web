<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        "record_id",
        "created_at",
        "updated_at"
    ];

    public function entryDetails() {

        return $this->hasMany(EntryDetail::class);

    }
}
