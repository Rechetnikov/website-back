<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class ApiController extends Controller
{
    protected $model;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = (int) $request->get('limit', 100);
        $offset = (int) $request->get('offset', 0);
        $result = $this->model->limit($limit)->offset($offset)->get;
        return $this->sendResponse($result, 'OK', 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validated();

        $this->model->fill($data)->push();

        return $this->sendResponse(null, 'Created', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($entityId)
    {
        $entity = $this->model->find($entityId)->first();

        if (!$entity) {
            return $this->sendError('Not Found', 404);
        }

        return $this->sendResponse($entity, 'OK',200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $entityId)
    {
        $entity = $this->model->find($entityId)->first();

        if (!$entity) {
            return $this->sendError('Not Found', 404);
        }

        $data = $request->validated();

        $this->model->fill($data)->push();

        return $this->sendResponse(null, 'Updated',204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($entityId)
    {
        $entity = $this->model->find($entityId);

        if (!$entity) {
            return $this->sendError('Not Found', 404);
        }

        $entity->delete();

        return $this->sendResponse(null, 'Deleted',204);
    }
}
