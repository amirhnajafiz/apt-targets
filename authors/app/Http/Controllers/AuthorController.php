<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Http\ResponseFactory;

/**
 * Class AuthorController is a controller for authors.
 *
 * @package App\Http\Controllers
 */
class AuthorController extends Controller
{
    /**
     * Get all of the authors.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Author::all());
    }

    /**
     * Get a single author.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        return response()->json(Author::find($id));
    }

    /**
     * Storing a new author.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
           'name' => 'required',
           'email' => 'required|email|unique:authors',
           'location' => 'required|alpha',
        ]);

        $author = Author::create($request->all());

        return response()->json($author, 201);
    }

    /**
     * Update a author.
     *
     * @param $id
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update($id, Request $request): JsonResponse
    {
        $this->validate($request, [
            'email' => 'email|unique:authors',
            'location' => 'alpha',
        ]);

        $author = Author::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    /**
     * Destroying an exiting author
     *
     * @param $id
     * @return Response|ResponseFactory
     */
    public function destroy($id)
    {
        Author::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
