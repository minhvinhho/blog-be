<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Requests\ApiCategoriesRequest;

class ApiCategoryController extends Controller
{
    public function getCategory() {
        return response()->json(Categories::all(), 200);
    }

    public function getCategoryById($id) {
        $category = Categories::find($id);
        if(is_null($category)) {
            return response()->json(['message' => 'Category Not Found'], 404);
        }
        return response()->json($category::find($id), 200);
    }

    public function addCategory(ApiCategoriesRequest $request) {
        $category = Categories::create($request->all());
        return response($category, 201);
    }

    public function updateCategory(ApiCategoriesRequest $request, $id) {
        $category = Categories::find($id);
        if(is_null($category)) {
            return response()->json(['message' => 'Category Not Found'], 404);
        }
        $category->update($request->all());
        return response($category, 200);
    }

    public function deleteCategory(Request $request, $id) {
        $category = Categories::find($id);
        if(is_null($category)) {
            return response()->json(['message' => 'Category Not Found'], 404);
        }
        $category->delete();
        return response()->json(null, 204);
    }
}
