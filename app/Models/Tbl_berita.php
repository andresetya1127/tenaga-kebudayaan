<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_berita extends Model
{
    use HasFactory, Uuid;

    protected $primaryKey = 'id_berita';
    protected $guarded = [];
}
