<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'card_number',
        'card_holder',
        'valid_thru',
        'balance',
        'bank_name',
        'is_default',
        'user_id',
    ];
}
