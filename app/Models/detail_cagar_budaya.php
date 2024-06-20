<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_cagar_budaya extends Model
{
    use HasFactory, Uuid;

    protected $guarded = [];


    public function cagar()
    {
        $this->hasOne(Tbl_cagar_budaya::class, 'cagar_budaya_id', 'id_cagar');
    }
}
