<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * @api {get} /categories List all categories
     * @apiName GetCategories
     * @apiGroup Category
     *
     * @apiSuccess {Object[]} categories List of all categories.
     * @apiSuccessExample {json} Success-Response:
     * {
     *   "categories": [
     *     {
     *       "id": 1,
     *       "name": "Action",
     *       ...
     *     }
     *   ]
     * }
     */

    public function index()
    {
        $categories = Category::all();
        return response()->json(['categories'=>$categories]);
    }

    /**
     * @api {post} /categories Create a new category
     * @apiName CreateCategory
     * @apiGroup Category
     *
     * @apiBody {String} name Name of the category.
     *
     * @apiSuccess {Object} category The newly created category.
     * @apiSuccessExample {json} Success-Response:
     * {
     *   "category": {
     *     "id": 2,
     *     "name": "Drama",
     *     ...
     *   }
     * }
     */

    public function store(CategoryRequest $request)
    {

        $category = Category::create($request->all());
        return response()->json(['category'=>$category]);
    }

    /**
     * @api {put} /categories/:id Update an existing category
     * @apiName UpdateCategory
     * @apiGroup Category
     *
     * @apiParam {Number} id Category's unique ID.
     * @apiBody {String} [name] Name of the category.
     *
     * @apiSuccess {Object} category The updated category.
     * @apiSuccessExample {json} Success-Response:
     * {
     *   "category": {
     *     "id": 2,
     *     "name": "Drama & Romance",
     *     ...
     *   }
     * }
     */

    public function update(CategoryRequest $request,$id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return response()->json(['category'=>$category]);
    }

    /**
     * @api {delete} /categories/:id Delete a category
     * @apiName DeleteCategory
     * @apiGroup Category
     *
     * @apiParam {Number} id Category's unique ID.
     *
     * @apiSuccess {String} message Confirmation message.
     * @apiSuccess {Number} id ID of the deleted category.
     * @apiSuccessExample {json} Success-Response:
     * {
     *   "message": "Category deleted successfully",
     *   "id": 3
     * }
     */

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json([
            'message' => "Category deleted successfully",
            'id' => $id,
        ]);
    }
}
