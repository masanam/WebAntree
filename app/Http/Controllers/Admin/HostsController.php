<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\HostsDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateHostsRequest;
use App\Http\Requests\Admin\UpdateHostsRequest;
use App\Repositories\Admin\HostsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class HostsController extends AppBaseController
{
    /** @var  HostsRepository */
    private $hostsRepository;

    public function __construct(HostsRepository $hostsRepo)
    {
        $this->hostsRepository = $hostsRepo;
    }

    /**
     * Display a listing of the Hosts.
     *
     * @param HostsDataTable $hostsDataTable
     * @return Response
     */
    public function index(HostsDataTable $hostsDataTable)
    {
        return $hostsDataTable->render('admin.hosts.index');
    }

    /**
     * Show the form for creating a new Hosts.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.hosts.create');
    }

    /**
     * Store a newly created Hosts in storage.
     *
     * @param CreateHostsRequest $request
     *
     * @return Response
     */
    public function store(CreateHostsRequest $request)
    {
        $input = $request->all();

        $hosts = $this->hostsRepository->create($input);

        Flash::success('Hosts saved successfully.');

        return redirect(route('admin.hosts.index'));
    }

    /**
     * Display the specified Hosts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hosts = $this->hostsRepository->find($id);

        if (empty($hosts)) {
            Flash::error('Hosts not found');

            return redirect(route('admin.hosts.index'));
        }

        return view('admin.hosts.show')->with('hosts', $hosts);
    }

    /**
     * Show the form for editing the specified Hosts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hosts = $this->hostsRepository->find($id);

        if (empty($hosts)) {
            Flash::error('Hosts not found');

            return redirect(route('admin.hosts.index'));
        }

        return view('admin.hosts.edit')->with('hosts', $hosts);
    }

    /**
     * Update the specified Hosts in storage.
     *
     * @param  int              $id
     * @param UpdateHostsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHostsRequest $request)
    {
        $hosts = $this->hostsRepository->find($id);

        if (empty($hosts)) {
            Flash::error('Hosts not found');

            return redirect(route('admin.hosts.index'));
        }

        $hosts = $this->hostsRepository->update($request->all(), $id);

        Flash::success('Hosts updated successfully.');

        return redirect(route('admin.hosts.index'));
    }

    /**
     * Remove the specified Hosts from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hosts = $this->hostsRepository->find($id);

        if (empty($hosts)) {
            Flash::error('Hosts not found');

            return redirect(route('admin.hosts.index'));
        }

        $this->hostsRepository->delete($id);

        Flash::success('Hosts deleted successfully.');

        return redirect(route('admin.hosts.index'));
    }
}
