<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class played extends Model
{
    use HasFactory;
    protected $table = "played";

    protected $primaryKey = 'artist_id';

    protected $fillable = ['artist_id','album_id','track_id','played'];
}