<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_chat extends Model
{
    use HasFactory, Uuid;

    protected $primaryKey = 'chat_id';
    protected $guarded = [];
    /**
     * Get the user associated with the Tbl_chat
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'sender_id');
    }
}
