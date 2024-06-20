<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_wbtb extends Model
{
    use HasFactory, Uuid;

    protected $guarded = [];


    public function wbtb()
    {
        $this->hasOne(Wbtb::class, 'wbtb_id', 'id_wbtb');
    }
}
