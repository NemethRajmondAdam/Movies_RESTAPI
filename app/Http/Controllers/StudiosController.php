<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudioRequest;
use App\Models\Studio;
use Illuminate\Http\Request;

class StudiosController extends Controller
{
    /**
     * @api {get} /studios List all studios
     * @apiName GetStudios
     * @apiGroup Studio
     *
     * @apiSuccess {Object[]} studios List of all studios.
     * @apiSuccessExample {json} Success-Response:
     * {
     *   "studios": [
     *     {
     *       "id": 1,
     *       "name": "Warner Bros.",
     *       ...
     *     }
     *   ]
     * }
     */

    public function index()
    {
        $studios = Studio::all();
        return response()->json(['studios'=>$studios]);
    }

    /**
     * @api {post} /studios Create a new studio
     * @apiName CreateStudio
     * @apiGroup Studio
     *
     * @apiBody {String} name Name of the studio.
     *
     * @apiSuccess {Object} studio The newly created studio.
     * @apiSuccessExample {json} Success-Response:
     * {
     *   "studio": {
     *     "id": 2,
     *     "name": "Pixar Animation Studios",
     *     ...
     *   }
     * }
     */

    public function store(StudioRequest $request)
    {

        $studio = Studio::create($request->all());
        return response()->json(['studio'=>$studio]);
    }

    /**
     * @api {put} /studios/:id Update an existing studio
     * @apiName UpdateStudio
     * @apiGroup Studio
     *
     * @apiParam {Number} id Studio's unique ID.
     * @apiBody {String} [name] Name of the studio.
     *
     * @apiSuccess {Object} studio The updated studio.
     * @apiSuccessExample {json} Success-Response:
     * {
     *   "studio": {
     *     "id": 2,
     *     "name": "Pixar Studios",
     *     ...
     *   }
     * }
     */

    public function update(StudioRequest $request,$id)
    {
        $studio = Studio::findOrFail($id);
        $studio->update($request->all());

        return response()->json(['studio'=>$studio]);
    }

    /**
     * @api {delete} /studios/:id Delete a studio
     * @apiName DeleteStudio
     * @apiGroup Studio
     *
     * @apiParam {Number} id Studio's unique ID.
     *
     * @apiSuccess {String} message Confirmation message.
     * @apiSuccess {Number} id ID of the deleted studio.
     * @apiSuccessExample {json} Success-Response:
     * {
     *   "message": "Studio deleted successfully",
     *   "id": 6
     * }
     */

    public function destroy($id)
    {
        $studio = Studio::findOrFail($id);
        $studio->delete();

        return response()->json([
            'message' => "Studio deleted successfully",
            'id' => $id,
        ]);
    }
}
