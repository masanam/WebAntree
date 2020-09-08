<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateLoketsAPIRequest;
use App\Http\Requests\API\Admin\UpdateLoketsAPIRequest;
use App\Models\Admin\Lokets;
use App\Repositories\Admin\LoketsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LoketsController
 * @package App\Http\Controllers\API\Admin
 */

class LoketsAPIController extends AppBaseController
{
    /** @var  LoketsRepository */
    private $loketsRepository;

    public function __construct(LoketsRepository $loketsRepo)
    {
        $this->loketsRepository = $loketsRepo;
    }

    /**
     * Display a listing of the Lokets.
     * GET|HEAD /lokets
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $lokets = $this->loketsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($lokets->toArray(), 'Lokets retrieved successfully');
    }

    /**
     * Store a newly created Lokets in storage.
     * POST /lokets
     *
     * @param CreateLoketsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLoketsAPIRequest $request)
    {
        $input = $request->all();

        $lokets = $this->loketsRepository->create($input);

        return $this->sendResponse($lokets->toArray(), 'Lokets saved successfully');
    }

    /**
     * Display the specified Lokets.
     * GET|HEAD /lokets/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Lokets $lokets */
        $lokets = $this->loketsRepository->find($id);

        if (empty($lokets)) {
            return $this->sendError('Lokets not found');
        }

        return $this->sendResponse($lokets->toArray(), 'Lokets retrieved successfully');
    }

    /**
     * Update the specified Lokets in storage.
     * PUT/PATCH /lokets/{id}
     *
     * @param int $id
     * @param UpdateLoketsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLoketsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Lokets $lokets */
        $lokets = $this->loketsRepository->find($id);

        if (empty($lokets)) {
            return $this->sendError('Lokets not found');
        }

        $lokets = $this->loketsRepository->update($input, $id);

        return $this->sendResponse($lokets->toArray(), 'Lokets updated successfully');
    }

    /**
     * Remove the specified Lokets from storage.
     * DELETE /lokets/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Lokets $lokets */
        $lokets = $this->loketsRepository->find($id);

        if (empty($lokets)) {
            return $this->sendError('Lokets not found');
        }

        $lokets->delete();

        return $this->sendSuccess('Lokets deleted successfully');
    }


    public function getLoketbyCat(Request $request)
    {
        $type = $request->type;
        $lokets = \App\Models\Admin\Lokets::with('host')->where('hostId',$type)->get();

        if (empty($lokets)) {
            return $this->sendError('Hosts not found');
        }

        return $this->sendResponse($lokets->toArray(), 'Lokets retrieved successfully');
    }
}
