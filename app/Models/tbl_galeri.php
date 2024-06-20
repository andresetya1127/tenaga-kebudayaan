<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_galeri extends Model
{
    use HasFactory;
    protected $table = 'galeri';
    protected $guarded = [];
    public $timestamps = false;
}
