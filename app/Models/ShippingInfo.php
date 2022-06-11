<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingInfo extends Model
{
    use HasFactory;
    protected $table = 'shipping_infos';

    protected $fillable = [
        'user_id','address_line1', 'address_line2', 'city','state', 'country', 'postal_code',
    ];
}
