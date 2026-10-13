<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\SportCategory;
use Illuminate\Http\JsonResponse;

class FieldController extends Controller
{
    // Menampilkan semua lapangan beserta kategorinya
    public function index(): JsonResponse
    {
        $fields = Field::with('category')
            ->where('is_active', true)
            ->get();

        $categories = SportCategory::all();

        return response()->json([
            'status' => 'success',
            'data' => [
                'categories' => $categories,
                'fields' => $fields,
            ]
        ]);
    }

    // Detail lapangan spesifik
    public function show($id): JsonResponse
    {
        $field = Field::with('category')->findOrFail($id);

        return response()->json([
            'status' => 'success',
            'data' => $field
        ]);
    }
}