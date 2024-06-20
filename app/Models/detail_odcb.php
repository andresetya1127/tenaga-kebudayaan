<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_odcb extends Model
{
    use HasFactory, Uuid;

    protected $guarded = [];


    public function odcb()
    {
        $this->hasOne(Tbl_odcb::class, 'odcb_id', 'id_odcb');
    }
}
