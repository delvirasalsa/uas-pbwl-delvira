<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class track extends Model
{
    use HasFactory;
    protected $table = "track";

    protected $primaryKey = 'track_id';

    protected $fillable = ['track_id','track_nama','artist_id','album_id']; 
}