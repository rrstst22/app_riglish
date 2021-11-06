<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word_record extends Model
{
    use HasFactory;

    protected $fillable = [
        'word_id',
        'record_id',
        'result'
    ];
}
