<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class WaterBill
 * @package App\Models
 * @version October 25, 2021, 6:11 am UTC
 *
 * @property string $house_number
 * @property string $month
 * @property number $payment
 * @property number $balance
 */
class WaterBill extends Model
{

    use HasFactory;

    public $table = 'waterbilling';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'house_number',
        'month',
        'payment',
        'balance'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'house_number' => 'string',
        'month' => 'date',
        'payment' => 'decimal:2',
        'balance' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'house_number' => 'required|string|max:255',
        'month' => 'required',
        'payment' => 'required|numeric',
        'balance' => 'required|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
