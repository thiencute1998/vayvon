<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VayVon extends Model
{
    use HasFactory;

    protected $table = 'vay_von';

    protected $fillable = ['code', 'user_name', 'phone', 'amount_loan', 'amount_money', 'interest_rate', 'except', 'service_charge',
        'money_pay', 'loan_date', 'pay_date', 'note', 'is_pay', 'status', 'stt'];

    public $timestamps = true;
}
