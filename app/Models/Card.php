<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
{
    use HasFactory;

    protected $primaryKey = 'card_number';

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
