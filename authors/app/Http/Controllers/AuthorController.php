<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Author::all());
    }

    public function show($id): JsonResponse
    {
        return response()->json(Author::find($id));
    }

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

    public function destroy($id)
    {
        Author::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
