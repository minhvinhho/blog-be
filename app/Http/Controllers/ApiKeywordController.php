<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Keyword;
use Illuminate\Http\Request;
use App\Http\Requests\ApiKeywordRequest;

class ApiKeywordController extends Controller
{
    public function getKeyword() {
        return response()->json(Keyword::all(), 200);
    }

    public function getKeywordById($id) {
        $keyword = Keyword::find($id);
        if(is_null($keyword)) {
            return response()->json(['message' => 'Keyword Not Found'], 404);
        }
        return response()->json($keyword::find($id), 200);
    }

    public function addKeyword(ApiKeywordRequest $request) {
        $keyword = Keyword::create($request->all());
        return response($keyword, 201);
    }

    public function updateKeyword(ApiKeywordRequest $request, $id) {
        $keyword = Keyword::find($id);
        if(is_null($keyword)) {
            return response()->json(['message' => 'Keyword Not Found'], 404);
        }
        $keyword->update($request->all());
        return response($keyword, 200);
    }

    public function deleteKeyword(Request $request, $id) {
        $keyword = Keyword::find($id);
        if(is_null($keyword)) {
            return response()->json(['message' => 'Keyword Not Found'], 404);
        }
        $keyword->delete();
        return response()->json(null, 204);
    }


}
