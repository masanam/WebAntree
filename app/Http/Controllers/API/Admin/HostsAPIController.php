<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateHostsAPIRequest;
use App\Http\Requests\API\Admin\UpdateHostsAPIRequest;
use App\Models\Admin\Hosts;
use App\Repositories\Admin\HostsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class HostsController
 * @package App\Http\Controllers\API\Admin
 */

class HostsAPIController extends AppBaseController
{
    /** @var  HostsRepository */
    private $hostsRepository;

    public function __construct(HostsRepository $hostsRepo)
    {
        $this->hostsRepository = $hostsRepo;
    }

    /**
     * Display a listing of the Hosts.
     * GET|HEAD /hosts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $hosts = $this->hostsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($hosts->toArray(), 'Hosts retrieved successfully');
    }

    /**
     * Store a newly created Hosts in storage.
     * POST /hosts
     *
     * @param CreateHostsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateHostsAPIRequest $request)
    {
        $input = $request->all();

        $hosts = $this->hostsRepository->create($input);

        return $this->sendResponse($hosts->toArray(), 'Hosts saved successfully');
    }

    /**
     * Display the specified Hosts.
     * GET|HEAD /hosts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Hosts $hosts */
        $hosts = $this->hostsRepository->find($id);

        if (empty($hosts)) {
            return $this->sendError('Hosts not found');
        }

        return $this->sendResponse($hosts->toArray(), 'Hosts retrieved successfully');
    }

    /**
     * Update the specified Hosts in storage.
     * PUT/PATCH /hosts/{id}
     *
     * @param int $id
     * @param UpdateHostsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHostsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Hosts $hosts */
        $hosts = $this->hostsRepository->find($id);

        if (empty($hosts)) {
            return $this->sendError('Hosts not found');
        }

        $hosts = $this->hostsRepository->update($input, $id);

        return $this->sendResponse($hosts->toArray(), 'Hosts updated successfully');
    }

    /**
     * Remove the specified Hosts from storage.
     * DELETE /hosts/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Hosts $hosts */
        $hosts = $this->hostsRepository->find($id);

        if (empty($hosts)) {
            return $this->sendError('Hosts not found');
        }

        $hosts->delete();

        return $this->sendSuccess('Hosts deleted successfully');
    }

    public function getHostbyCat(Request $request)
    {
        $type = $request->type;
        $hosts = \App\Models\Admin\Hosts::with('category')->where('categoryId',$type)->get();

        if (empty($hosts)) {
            return $this->sendError('Hosts not found');
        }

        return $this->sendResponse($hosts->toArray(), 'Hosts retrieved successfully');
    }

}
