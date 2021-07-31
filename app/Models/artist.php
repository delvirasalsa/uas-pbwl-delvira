<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artist extends Model
{
    use HasFactory;

    protected $table = "artist";

    protected $primaryKey = 'artist_id';

    protected $fillable = ['artist_id','artist_nama'];
}
