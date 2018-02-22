<?php

namespace App\Http\Controllers;

use App\DataTables\BroadcastTypeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBroadcastTypeRequest;
use App\Http\Requests\UpdateBroadcastTypeRequest;
use App\Repositories\BroadcastTypeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BroadcastTypeController extends AppBaseController
{
    /** @var  BroadcastTypeRepository */
    private $broadcastTypeRepository;

    public function __construct(BroadcastTypeRepository $broadcastTypeRepo)
    {
        $this->broadcastTypeRepository = $broadcastTypeRepo;
    }

    /**
     * Display a listing of the BroadcastType.
     *
     * @param BroadcastTypeDataTable $broadcastTypeDataTable
     * @return Response
     */
    public function index(BroadcastTypeDataTable $broadcastTypeDataTable)
    {
        return $broadcastTypeDataTable->render('broadcast_types.index');
    }

    /**
     * Show the form for creating a new BroadcastType.
     *
     * @return Response
     */
    public function create()
    {
        return view('broadcast_types.create');
    }

    /**
     * Store a newly created BroadcastType in storage.
     *
     * @param CreateBroadcastTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateBroadcastTypeRequest $request)
    {
        $input = $request->all();

        $broadcastType = $this->broadcastTypeRepository->create($input);

        Flash::success('Broadcast Type saved successfully.');

        return redirect(route('broadcastTypes.index'));
    }

    /**
     * Display the specified BroadcastType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $broadcastType = $this->broadcastTypeRepository->findWithoutFail($id);

        return response()->json($broadcastType);
    }

    /**
     * Show the form for editing the specified BroadcastType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $broadcastType = $this->broadcastTypeRepository->findWithoutFail($id);

        if (empty($broadcastType)) {
            Flash::error('Broadcast Type not found');

            return redirect(route('broadcastTypes.index'));
        }

        return view('broadcast_types.edit')->with('broadcastType', $broadcastType);
    }

    /**
     * Update the specified BroadcastType in storage.
     *
     * @param  int              $id
     * @param UpdateBroadcastTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBroadcastTypeRequest $request)
    {
        $broadcastType = $this->broadcastTypeRepository->findWithoutFail($id);

        if (empty($broadcastType)) {
            Flash::error('Broadcast Type not found');

            return redirect(route('broadcastTypes.index'));
        }

        $broadcastType = $this->broadcastTypeRepository->update($request->all(), $id);

        Flash::success('Broadcast Type updated successfully.');

        return redirect(route('broadcastTypes.index'));
    }

    /**
     * Remove the specified BroadcastType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $broadcastType = $this->broadcastTypeRepository->findWithoutFail($id);

        if (empty($broadcastType)) {
            Flash::error('Broadcast Type not found');

            return redirect(route('broadcastTypes.index'));
        }

        $this->broadcastTypeRepository->delete($id);

        Flash::success('Broadcast Type deleted successfully.');

        return redirect(route('broadcastTypes.index'));
    }
}
