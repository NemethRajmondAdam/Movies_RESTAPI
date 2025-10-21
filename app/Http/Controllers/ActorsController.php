<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActorRequest;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorsController extends Controller
{

    /**
     * @api {get} /actors List all actors
     * @apiName GetActors
     * @apiGroup Actor
     *
     * @apiSuccess {Object[]} actors List of all actors.
     * @apiSuccessExample {json} Success-Response:
     * {
     *   "actors": [
     *     {
     *       "id": 1,
     *       "name": "Leonardo DiCaprio",
     *       ...
     *     }
     *   ]
     * }
     */

    public function index()
    {
        $actors = Actor::all();
        return response()->json(['actors'=>$actors]);
    }

    /**
     * @api {post} /actors Create a new actor
     * @apiName CreateActor
     * @apiGroup Actor
     *
     * @apiBody {String} name Name of the actor.
     *
     * @apiSuccess {Object} actor The newly created actor.
     * @apiSuccessExample {json} Success-Response:
     * {
     *   "actor": {
     *     "id": 2,
     *     "name": "Natalie Portman",
     *     ...
     *   }
     * }
     */ 

    public function store(ActorRequest $request)
    {

        $actor = Actor::create($request->all());
        return response()->json(['actor'=>$actor]);
    }

    /**
     * @api {put} /actors/:id Update an existing actor
     * @apiName UpdateActor
     * @apiGroup Actor
     *
     * @apiParam {Number} id Actor's unique ID.
     * @apiBody {String} [name] Name of the actor.
     *
     * @apiSuccess {Object} actor The updated actor.
     * @apiSuccessExample {json} Success-Response:
     * {
     *   "actor": {
     *     "id": 2,
     *     "name": "Natalie P.",
     *     ...
     *   }
     * }
     */

    public function update(ActorRequest $request,$id)
    {
        $actor = Actor::findOrFail($id);
        $actor->update($request->all());

        return response()->json(['actor'=>$actor]);
    }

    /**
     * @api {delete} /actors/:id Delete an actor
     * @apiName DeleteActor
     * @apiGroup Actor
     *
     * @apiParam {Number} id Actor's unique ID.
     *
     * @apiSuccess {String} message Confirmation message.
     * @apiSuccess {Number} id ID of the deleted actor.
     * @apiSuccessExample {json} Success-Response:
     * {
     *   "message": "Actor deleted successfully",
     *   "id": 7
     * }
     */

    public function destroy($id)
    {
        $actor = Actor::findOrFail($id);
        $actor->delete();

        return response()->json([
            'message' => "Actor deleted successfully",
            'id' => $id,
        ]);
    }
}
