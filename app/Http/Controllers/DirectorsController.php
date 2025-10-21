<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectorRequest;
use App\Models\Director;
use Illuminate\Http\Request;

class DirectorsController extends Controller
{

    /**
     * @api {get} /directors List all directors
     * @apiName GetDirectors
     * @apiGroup Director
     *
     * @apiSuccess {Object[]} directors List of all directors.
     * @apiSuccessExample {json} Success-Response:
     * {
     *   "directors": [
     *     {
     *       "id": 1,
     *       "name": "Christopher Nolan",
     *       ...
     *     }
     *   ]
     * }
     */

    public function index()
    {
        $directors = Director::all();
        return response()->json(['directors'=>$directors]);
    }

    /**
     * @api {post} /directors Create a new director
     * @apiName CreateDirector
     * @apiGroup Director
     *
     * @apiBody {String} name Name of the director.
     *
     * @apiSuccess {Object} director The newly created director.
     * @apiSuccessExample {json} Success-Response:
     * {
     *   "director": {
     *     "id": 2,
     *     "name": "Denis Villeneuve",
     *     ...
     *   }
     * }
     */

    public function store(DirectorRequest $request)
    {

        $director = Director::create($request->all());
        return response()->json(['director'=>$director]);
    }

    /**
     * @api {put} /directors/:id Update an existing director
     * @apiName UpdateDirector
     * @apiGroup Director
     *
     * @apiParam {Number} id Director's unique ID.
     * @apiBody {String} [name] Name of the director.
     *
     * @apiSuccess {Object} director The updated director.
     * @apiSuccessExample {json} Success-Response:
     * {
     *   "director": {
     *     "id": 2,
     *     "name": "Denis V.",
     *     ...
     *   }
     * }
     */

    public function update(DirectorRequest $request,$id)
    {
        $director = Director::findOrFail($id);
        $director->update($request->all());

        return response()->json(['director'=>$director]);
    }

    /**
     * @api {delete} /directors/:id Delete a director
     * @apiName DeleteDirector
     * @apiGroup Director
     *
     * @apiParam {Number} id Director's unique ID.
     *
     * @apiSuccess {String} message Confirmation message.
     * @apiSuccess {Number} id ID of the deleted director.
     * @apiSuccessExample {json} Success-Response:
     * {
     *   "message": "Director deleted successfully",
     *   "id": 4
     * }
     */

    public function destroy($id)
    {
        $director = Director::findOrFail($id);
        $director->delete();

        return response()->json([
            'message' => "Director deleted successfully",
            'id' => $id,
        ]);
    }
}
