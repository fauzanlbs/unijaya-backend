<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserRequest;

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
    }

    public function show($id)
    {

    }

    public function update(UserRequest $request, $id)
    {
        $validated = $request->validated();
    }

    public function destroy($id)
    {

    }

    // CRUD END



    // IMPORT START

    public function import()
    {
    }

    // IMPORT END


}
