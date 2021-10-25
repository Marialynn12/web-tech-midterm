<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWaterBillRequest;
use App\Http\Requests\UpdateWaterBillRequest;
use App\Repositories\WaterBillRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class WaterBillController extends AppBaseController
{
    /** @var  WaterBillRepository */
    private $waterBillRepository;

    public function __construct(WaterBillRepository $waterBillRepo)
    {
        $this->waterBillRepository = $waterBillRepo;
    }

    /**
     * Display a listing of the WaterBill.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $waterBills = $this->waterBillRepository->all();

        return view('water_bills.index')
            ->with('waterBills', $waterBills);
    }

    /**
     * Show the form for creating a new WaterBill.
     *
     * @return Response
     */
    public function create()
    {
        return view('water_bills.create');
    }

    /**
     * Store a newly created WaterBill in storage.
     *
     * @param CreateWaterBillRequest $request
     *
     * @return Response
     */
    public function store(CreateWaterBillRequest $request)
    {
        $input = $request->all();

        $waterBill = $this->waterBillRepository->create($input);

        Flash::success('Water Bill saved successfully.');

        return redirect(route('waterBills.index'));
    }

    /**
     * Display the specified WaterBill.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $waterBill = $this->waterBillRepository->find($id);

        if (empty($waterBill)) {
            Flash::error('Water Bill not found');

            return redirect(route('waterBills.index'));
        }

        return view('water_bills.show')->with('waterBill', $waterBill);
    }

    /**
     * Show the form for editing the specified WaterBill.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $waterBill = $this->waterBillRepository->find($id);

        if (empty($waterBill)) {
            Flash::error('Water Bill not found');

            return redirect(route('waterBills.index'));
        }

        return view('water_bills.edit')->with('waterBill', $waterBill);
    }

    /**
     * Update the specified WaterBill in storage.
     *
     * @param int $id
     * @param UpdateWaterBillRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWaterBillRequest $request)
    {
        $waterBill = $this->waterBillRepository->find($id);

        if (empty($waterBill)) {
            Flash::error('Water Bill not found');

            return redirect(route('waterBills.index'));
        }

        $waterBill = $this->waterBillRepository->update($request->all(), $id);

        Flash::success('Water Bill updated successfully.');

        return redirect(route('waterBills.index'));
    }

    /**
     * Remove the specified WaterBill from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $waterBill = $this->waterBillRepository->find($id);

        if (empty($waterBill)) {
            Flash::error('Water Bill not found');

            return redirect(route('waterBills.index'));
        }

        $this->waterBillRepository->delete($id);

        Flash::success('Water Bill deleted successfully.');

        return redirect(route('waterBills.index'));
    }
}
