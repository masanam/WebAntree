<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateStatusesAPIRequest;
use App\Http\Requests\API\Admin\UpdateStatusesAPIRequest;
use App\Models\Admin\Statuses;
use App\Repositories\Admin\StatusesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class StatusesController
 * @package App\Http\Controllers\API\Admin
 */

class StatusesAPIController extends AppBaseController
{
    /** @var  StatusesRepository */
    private $statusesRepository;

    public function __construct(StatusesRepository $statusesRepo)
    {
        $this->statusesRepository = $statusesRepo;
    }

    /**
     * Display a listing of the Statuses.
     * GET|HEAD /statuses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $statuses = $this->statusesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($statuses->toArray(), 'Statuses retrieved successfully');
    }

    /**
     * Store a newly created Statuses in storage.
     * POST /statuses
     *
     * @param CreateStatusesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStatusesAPIRequest $request)
    {
        $input = $request->all();

        $statuses = $this->statusesRepository->create($input);

        return $this->sendResponse($statuses->toArray(), 'Statuses saved successfully');
    }

    /**
     * Display the specified Statuses.
     * GET|HEAD /statuses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Statuses $statuses */
        $statuses = $this->statusesRepository->find($id);

        if (empty($statuses)) {
            return $this->sendError('Statuses not found');
        }

        return $this->sendResponse($statuses->toArray(), 'Statuses retrieved successfully');
    }

    /**
     * Update the specified Statuses in storage.
     * PUT/PATCH /statuses/{id}
     *
     * @param int $id
     * @param UpdateStatusesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStatusesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Statuses $statuses */
        $statuses = $this->statusesRepository->find($id);

        if (empty($statuses)) {
            return $this->sendError('Statuses not found');
        }

        $statuses = $this->statusesRepository->update($input, $id);

        return $this->sendResponse($statuses->toArray(), 'Statuses updated successfully');
    }

    /**
     * Remove the specified Statuses from storage.
     * DELETE /statuses/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Statuses $statuses */
        $statuses = $this->statusesRepository->find($id);

        if (empty($statuses)) {
            return $this->sendError('Statuses not found');
        }

        $statuses->delete();

        return $this->sendSuccess('Statuses deleted successfully');
    }
}
