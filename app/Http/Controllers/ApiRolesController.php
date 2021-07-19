<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiRolesRequest;
use App\Models\Roles;
use Illuminate\Http\Request;

class ApiRolesController extends Controller
{
    public function getRole() {
        return response()->json(Roles::all(), 200);
    }

    public function getRoleById($id) {
        $role = Roles::find($id);
        if(is_null($role)) {
            return response()->json(['message' => 'Role Not Found'], 404);
        }
        return response()->json($role::find($id), 200);
    }

    public function addRole(ApiRolesRequest $request) {
        $role = Roles::create($request->all());
        return response($role, 201);
    }

    public function updateRole(ApiRolesRequest $request, $id) {
        $role = Roles::find($id);
        if(is_null($role)) {
            return response()->json(['message' => 'Role Not Found'], 404);
        }
        $role->update($request->all());
        return response($role, 200);
    }

    public function deleteRole(Request $request, $id) {
        $role = Roles::find($id);
        if(is_null($role)) {
            return response()->json(['message' => 'Role Not Found'], 404);
        }
        $role->delete();
        return response()->json(null, 204);
    }
}
