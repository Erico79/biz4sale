<?php

namespace App\Http\Controllers;

use App\DataTables\IndividualMessageDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateIndividualMessageRequest;
use App\Http\Requests\UpdateIndividualMessageRequest;
use App\Repositories\IndividualMessageRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class IndividualMessageController extends AppBaseController
{
    /** @var  IndividualMessageRepository */
    private $individualMessageRepository;

    public function __construct(IndividualMessageRepository $individualMessageRepo)
    {
        $this->individualMessageRepository = $individualMessageRepo;
    }

    /**
     * Display a listing of the IndividualMessage.
     *
     * @param IndividualMessageDataTable $individualMessageDataTable
     * @return Response
     */
    public function index(IndividualMessageDataTable $individualMessageDataTable)
    {
        return $individualMessageDataTable->render('individual_messages.index');
    }

    /**
     * Show the form for creating a new IndividualMessage.
     *
     * @return Response
     */
    public function create()
    {
        return view('individual_messages.create');
    }

    /**
     * Store a newly created IndividualMessage in storage.
     *
     * @param CreateIndividualMessageRequest $request
     *
     * @return Response
     */
    public function store(CreateIndividualMessageRequest $request)
    {
        $input = $request->all();

        $individualMessage = $this->individualMessageRepository->create($input);

        Flash::success('Individual Message saved successfully.');

        return redirect(route('individualMessages.index'));
    }

    /**
     * Display the specified IndividualMessage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $individualMessage = $this->individualMessageRepository->findWithoutFail($id);

        if (empty($individualMessage)) {
            Flash::error('Individual Message not found');

            return redirect(route('individualMessages.index'));
        }

        return view('individual_messages.show')->with('individualMessage', $individualMessage);
    }

    /**
     * Show the form for editing the specified IndividualMessage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $individualMessage = $this->individualMessageRepository->findWithoutFail($id);

        if (empty($individualMessage)) {
            Flash::error('Individual Message not found');

            return redirect(route('individualMessages.index'));
        }

        return view('individual_messages.edit')->with('individualMessage', $individualMessage);
    }

    /**
     * Update the specified IndividualMessage in storage.
     *
     * @param  int              $id
     * @param UpdateIndividualMessageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIndividualMessageRequest $request)
    {
        $individualMessage = $this->individualMessageRepository->findWithoutFail($id);

        if (empty($individualMessage)) {
            Flash::error('Individual Message not found');

            return redirect(route('individualMessages.index'));
        }

        $individualMessage = $this->individualMessageRepository->update($request->all(), $id);

        Flash::success('Individual Message updated successfully.');

        return redirect(route('individualMessages.index'));
    }

    /**
     * Remove the specified IndividualMessage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $individualMessage = $this->individualMessageRepository->findWithoutFail($id);

        if (empty($individualMessage)) {
            Flash::error('Individual Message not found');

            return redirect(route('individualMessages.index'));
        }

        $this->individualMessageRepository->delete($id);

        Flash::success('Individual Message deleted successfully.');

        return redirect(route('individualMessages.index'));
    }
}
