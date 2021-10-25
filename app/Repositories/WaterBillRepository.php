<?php

namespace App\Repositories;

use App\Models\WaterBill;
use App\Repositories\BaseRepository;

/**
 * Class WaterBillRepository
 * @package App\Repositories
 * @version October 25, 2021, 6:11 am UTC
*/

class WaterBillRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'house_number',
        'month',
        'payment',
        'balance'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return WaterBill::class;
    }
}
