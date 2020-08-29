<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\LoketsDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateLoketsRequest;
use App\Http\Requests\Admin\UpdateLoketsRequest;
use App\Repositories\Admin\LoketsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LoketsController extends AppBaseController
{
    /** @var  LoketsRepository */
    private $loketsRepository;

    public function __construct(LoketsRepository $loketsRepo)
    {
        $this->loketsRepository = $loketsRepo;
    }

    /**
     * Display a listing of the Lokets.
     *
     * @param LoketsDataTable $loketsDataTable
     * @return Response
     */
    public function index(LoketsDataTable $loketsDataTable)
    {
        return $loketsDataTable->render('admin.lokets.index');
    }

    /**
     * Show the form for creating a new Lokets.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.lokets.create');
    }

    /**
     * Store a newly created Lokets in storage.
     *
     * @param CreateLoketsRequest $request
     *
     * @return Response
     */
    public function store(CreateLoketsRequest $request)
    {
        $input = $request->all();

        $lokets = $this->loketsRepository->create($input);

        Flash::success('Lokets saved successfully.');

        return redirect(route('admin.lokets.index'));
    }

    /**
     * Display the specified Lokets.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lokets = $this->loketsRepository->find($id);

        if (empty($lokets)) {
            Flash::error('Lokets not found');

            return redirect(route('admin.lokets.index'));
        }

        return view('admin.lokets.show')->with('lokets', $lokets);
    }

    /**
     * Show the form for editing the specified Lokets.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lokets = $this->loketsRepository->find($id);

        if (empty($lokets)) {
            Flash::error('Lokets not found');

            return redirect(route('admin.lokets.index'));
        }

        return view('admin.lokets.edit')->with('lokets', $lokets);
    }

    /**
     * Update the specified Lokets in storage.
     *
     * @param  int              $id
     * @param UpdateLoketsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLoketsRequest $request)
    {
        $lokets = $this->loketsRepository->find($id);

        if (empty($lokets)) {
            Flash::error('Lokets not found');

            return redirect(route('admin.lokets.index'));
        }

        $lokets = $this->loketsRepository->update($request->all(), $id);

        Flash::success('Lokets updated successfully.');

        return redirect(route('admin.lokets.index'));
    }

    /**
     * Remove the specified Lokets from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lokets = $this->loketsRepository->find($id);

        if (empty($lokets)) {
            Flash::error('Lokets not found');

            return redirect(route('admin.lokets.index'));
        }

        $this->loketsRepository->delete($id);

        Flash::success('Lokets deleted successfully.');

        return redirect(route('admin.lokets.index'));
    }
}
