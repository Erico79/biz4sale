<?php

namespace App\Http\Controllers;

use App\DataTables\PlenarySittingDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePlenarySittingRequest;
use App\Http\Requests\UpdatePlenarySittingRequest;
use App\Repositories\PlenarySittingRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PlenarySittingController extends AppBaseController
{
    /** @var  PlenarySittingRepository */
    private $plenarySittingRepository;

    public function __construct(PlenarySittingRepository $plenarySittingRepo)
    {
        $this->plenarySittingRepository = $plenarySittingRepo;
    }

    /**
     * Display a listing of the PlenarySitting.
     *
     * @param PlenarySittingDataTable $plenarySittingDataTable
     * @return Response
     */
    public function index(PlenarySittingDataTable $plenarySittingDataTable)
    {
        return $plenarySittingDataTable->render('plenary_sittings.index');
    }

    /**
     * Show the form for creating a new PlenarySitting.
     *
     * @return Response
     */
    public function create()
    {
        return view('plenary_sittings.create');
    }

    /**
     * Store a newly created PlenarySitting in storage.
     *
     * @param CreatePlenarySittingRequest $request
     *
     * @return Response
     */
    public function store(CreatePlenarySittingRequest $request)
    {
        $input = $request->all();

        $plenarySitting = $this->plenarySittingRepository->create($input);

        Flash::success('Plenary Sitting saved successfully.');

        return redirect(route('plenarySittings.index'));
    }

    /**
     * Display the specified PlenarySitting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $plenarySitting = $this->plenarySittingRepository->findWithoutFail($id);

        if (empty($plenarySitting)) {
            Flash::error('Plenary Sitting not found');

            return redirect(route('plenarySittings.index'));
        }

        return view('plenary_sittings.show')->with('plenarySitting', $plenarySitting);
    }

    /**
     * Show the form for editing the specified PlenarySitting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $plenarySitting = $this->plenarySittingRepository->findWithoutFail($id);

        if (empty($plenarySitting)) {
            Flash::error('Plenary Sitting not found');

            return redirect(route('plenarySittings.index'));
        }

        return view('plenary_sittings.edit')->with('plenarySitting', $plenarySitting);
    }

    /**
     * Update the specified PlenarySitting in storage.
     *
     * @param  int              $id
     * @param UpdatePlenarySittingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePlenarySittingRequest $request)
    {
        $plenarySitting = $this->plenarySittingRepository->findWithoutFail($id);

        if (empty($plenarySitting)) {
            Flash::error('Plenary Sitting not found');

            return redirect(route('plenarySittings.index'));
        }

        $plenarySitting = $this->plenarySittingRepository->update($request->all(), $id);

        Flash::success('Plenary Sitting updated successfully.');

        return redirect(route('plenarySittings.index'));
    }

    /**
     * Remove the specified PlenarySitting from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $plenarySitting = $this->plenarySittingRepository->findWithoutFail($id);

        if (empty($plenarySitting)) {
            Flash::error('Plenary Sitting not found');

            return redirect(route('plenarySittings.index'));
        }

        $this->plenarySittingRepository->delete($id);

        Flash::success('Plenary Sitting deleted successfully.');

        return redirect(route('plenarySittings.index'));
    }
}
