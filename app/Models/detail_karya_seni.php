<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_karya_seni extends Model
{
    use HasFactory, Uuid;

    protected $guarded = [];


    public function karya_seni()
    {
        $this->hasOne(Tbl_karya_seni::class, 'karya_seni_id', 'id_karya_seni');
    }
}
