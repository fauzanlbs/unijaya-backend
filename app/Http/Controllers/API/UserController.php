<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public $successStatus = 200;

    // CRUD START

    public function index()
    {
        $users = User::paginate(20);
        return UserResource::collection($users);
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {

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
