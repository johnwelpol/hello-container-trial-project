<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'bl_number',
        'bl_release_user_id',
        'bl_release_date',
        'freight_payer_self',
        'contract_number',
    ];

    /**
     * Establish relationship between User and order model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'bl_release_user_id');
    }
}
