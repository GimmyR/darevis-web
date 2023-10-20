<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "title"
    ];

    public function parameters() {

        return $this->hasMany(Parameter::class);

    }

    public function entries() {

        return $this->hasMany(Entry::class);

    }
}
