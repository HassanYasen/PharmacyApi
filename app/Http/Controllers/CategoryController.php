<?php

namespace App\Http\Controllers;

use App\Repository\CategoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Category;


class CategoryController extends Controller
{
    private $CategoryRepository;

    public function __construct(CategoryRepository $CategoryRepository) 
    {
        $this->CategoryRepository = $CategoryRepository;
    }

    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->CategoryRepository->getAll()
        ]);
    }

    public function store(Request $request): JsonResponse 
    {
        $Details = $request->only([
            'category_name',
        ]);

        return response()->json(
            [
                'data' => $this->CategoryRepository->create($Details)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse 
    {
        $Id = $request->route('id');

        return response()->json([
            'data' => $this->CategoryRepository->getById($Id)
        ]);
    }

    public function update(Request $request): JsonResponse 
    {
        $Id = $request->route('id');
        $Details = $request->only([
            'category_name',
        ]);

        return response()->json([
            'data' => $this->CategoryRepository->update($Id, $Details)
        ]);
    }

    public function destroy(Request $request): JsonResponse 
    {
        $Id = $request->route('id');
        $this->CategoryRepository->delete($Id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function show1($id)
    {
        $Category = Category::with('Drugs')->findOrFail($id);
        return $Category;
    }
   
}
