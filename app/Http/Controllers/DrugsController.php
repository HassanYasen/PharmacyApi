<?php

namespace App\Http\Controllers;

use App\Repository\DrugsRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Drugs;

class DrugsController extends Controller
{
    private $DrugsRepository;

    public function __construct(DrugsRepository $DrugsRepository) 
    {
        $this->DrugsRepository = $DrugsRepository;
    }

    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->DrugsRepository->getAll()
        ]);
    }

    public function store(Request $request): JsonResponse 
    {
        $Details = $request->only([
            'title',
            'description',
            'price',
            'category_id',
        ]);

        return response()->json(
            [
                'data' => $this->DrugsRepository->create($Details)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse 
    {
        $Id = $request->route('id');

        return response()->json([
            'data' => $this->DrugsRepository->getById($Id)
        ]);
    }

    public function update(Request $request): JsonResponse 
    {
        $Id = $request->route('id');
        $Details = $request->only([
            'title',
             'description',
              'price',
             'category_id',
        ]);

        return response()->json([
            'data' => $this->DrugsRepository->update($Id, $Details)
        ]);
    }

    public function destroy(Request $request): JsonResponse 
    {
        $Id = $request->route('id');
        $this->DrugsRepository->delete($Id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function show1($id)
    {
        $Drugs = Drugs::with('Category')->findOrFail($id);
        return $Drugs;
    }
 
}
