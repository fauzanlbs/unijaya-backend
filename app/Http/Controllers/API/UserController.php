<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public $successStatus = 200;

    // CRUD START

    public function index()
    {
        $users = User::paginate(20);
        return UserResource::collection($users);
    }

    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($request->all());
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function update(UserRequest $request, $id)
    {
        $validated = $request->validated();
        $user = User::find($id);
        $user->update($request->all());
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['success' => 'data berjaya dipadam'], $this->successStatus);
    }

    // CRUD END



    // IMPORT START

    public function import(ImportRequest $request)
    {
        $validated = $request->validated();
        Excel::import(new UsersImport,$request->file('file'));
    }

    // IMPORT END


}
