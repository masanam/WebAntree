<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\StatusesDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateStatusesRequest;
use App\Http\Requests\Admin\UpdateStatusesRequest;
use App\Repositories\Admin\StatusesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class StatusesController extends AppBaseController
{
    /** @var  StatusesRepository */
    private $statusesRepository;

    public function __construct(StatusesRepository $statusesRepo)
    {
        $this->statusesRepository = $statusesRepo;
    }

    /**
     * Display a listing of the Statuses.
     *
     * @param StatusesDataTable $statusesDataTable
     * @return Response
     */
    public function index(StatusesDataTable $statusesDataTable)
    {
        return $statusesDataTable->render('admin.statuses.index');
    }

    /**
     * Show the form for creating a new Statuses.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.statuses.create');
    }

    /**
     * Store a newly created Statuses in storage.
     *
     * @param CreateStatusesRequest $request
     *
     * @return Response
     */
    public function store(CreateStatusesRequest $request)
    {
        $input = $request->all();

        $statuses = $this->statusesRepository->create($input);

        Flash::success('Statuses saved successfully.');

        return redirect(route('admin.statuses.index'));
    }

    /**
     * Display the specified Statuses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $statuses = $this->statusesRepository->find($id);

        if (empty($statuses)) {
            Flash::error('Statuses not found');

            return redirect(route('admin.statuses.index'));
        }

        return view('admin.statuses.show')->with('statuses', $statuses);
    }

    /**
     * Show the form for editing the specified Statuses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $statuses = $this->statusesRepository->find($id);

        if (empty($statuses)) {
            Flash::error('Statuses not found');

            return redirect(route('admin.statuses.index'));
        }

        return view('admin.statuses.edit')->with('statuses', $statuses);
    }

    /**
     * Update the specified Statuses in storage.
     *
     * @param  int              $id
     * @param UpdateStatusesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStatusesRequest $request)
    {
        $statuses = $this->statusesRepository->find($id);

        if (empty($statuses)) {
            Flash::error('Statuses not found');

            return redirect(route('admin.statuses.index'));
        }

        $statuses = $this->statusesRepository->update($request->all(), $id);

        Flash::success('Statuses updated successfully.');

        return redirect(route('admin.statuses.index'));
    }

    /**
     * Remove the specified Statuses from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $statuses = $this->statusesRepository->find($id);

        if (empty($statuses)) {
            Flash::error('Statuses not found');

            return redirect(route('admin.statuses.index'));
        }

        $this->statusesRepository->delete($id);

        Flash::success('Statuses deleted successfully.');

        return redirect(route('admin.statuses.index'));
    }
}
