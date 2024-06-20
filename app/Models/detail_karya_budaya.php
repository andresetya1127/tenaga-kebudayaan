<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_karya_budaya extends Model
{
    use HasFactory, Uuid;

    protected $guarded = [];


    public function karya_budaya()
    {
        $this->hasOne(Tbl_karya_budaya::class, 'karya_budaya_id', 'id_karya_budaya');
    }
}
