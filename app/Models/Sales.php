<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $fillable = [
        'sname',
        'cname',
        'cphone',
        'pname',
        'qty',
        'bprice',
        'sprice',
        'to_be_payed',
        'amount',
        'balance'
    ];
}
