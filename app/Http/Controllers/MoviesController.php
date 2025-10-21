<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Requests\MovieRequest;

class MoviesController extends Controller
{
    /**
     * @api {get} /movies List all movies
     * @apiName GetMovies
     * @apiGroup Movie
     *
     * @apiSuccess {Object[]} movies List of all movies.
     * @apiSuccessExample {json} Success-Response:
     * {
     *   "movies": [
     *     {
     *       "id": 1,
     *       "title": "Inception",
     *       "year": 2010,
     *       ...
     *     }
     *   ]
     * }
     */

    public function index()
    {
        $movies = Movie::all();
        return response()->json(['movies'=>$movies]);
    }

    /**
     * @api {post} /movies Create a new movie
     * @apiName CreateMovie
     * @apiGroup Movie
     *
     * @apiBody {String} title Title of the movie.
     * @apiBody {Integer} year Release year of the movie.
     * @apiBody {String} [description] Optional description.
     *
     * @apiSuccess {Object} movie The newly created movie.
     * @apiSuccessExample {json} Success-Response:
     * {
     *   "movie": {
     *     "id": 2,
     *     "title": "Interstellar",
     *     "year": 2014,
     *     ...
     *   }
     * }
     */

    public function store(MovieRequest $request)
    {

        $movie = Movie::create($request->all());
        return response()->json(['movie'=>$movie]);
    }

    /**
     * @api {put} /movies/:id Update an existing movie
     * @apiName UpdateMovie
     * @apiGroup Movie
     *
     * @apiParam {Number} id Movie's unique ID.
     * @apiBody {String} [title] Title of the movie.
     * @apiBody {Integer} [year] Release year of the movie.
     * @apiBody {String} [description] Optional description.
     *
     * @apiSuccess {Object} movie The updated movie.
     * @apiSuccessExample {json} Success-Response:
     * {
     *   "movie": {
     *     "id": 2,
     *     "title": "Interstellar Updated",
     *     "year": 2014,
     *     ...
     *   }
     * }
     */

    public function update(MovieRequest $request,$id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());


        return response()->json(['movie'=>$movie]);
    }

    /**
     * @api {delete} /movies/:id Delete a movie
     * @apiName DeleteMovie
     * @apiGroup Movie
     *
     * @apiParam {Number} id Movie's unique ID.
     *
     * @apiSuccess {String} message Confirmation message.
     * @apiSuccess {Number} id ID of the deleted movie.
     * @apiSuccessExample {json} Success-Response:
     * {
     *   "message": "Movie deleted successfully",
     *   "id": 5
     * }
     */

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return response()->json([
            'message' => "Movie deleted successfully",
            'id' => $id,
        ]);
    }
}