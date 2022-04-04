<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreAndUpdateRequest as UserRequest;
use App\Http\Requests\UserAdminStoreAndUpdateRequest as UserAdminRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    private $user;
    public function __construct(UserRepository $user) {
        $this->user = $user;
        // $this->middleware('auth', ['except' => ['store']]);
    }

    public function create()
    {
        // if(!Gate::allows('admin'))
        // {
        //     return response()->json('erro', 403);
        // }

        $user = $this->user->list();
        return view('user.create', ['users' => $user]);
    }

    public function findById($id)
    {
        $user = $this->user->findById($id);
        return response()->json($user, 200);
    }

    public function store(UserRequest $request)
    {
        $this->user->store();
        return redirect('home');
    }

    public function storeAdmin(UserAdminRequest $request)
    {
        if(!Gate::allows('admin'))
        {
            return response()->json('erro', 403);
        }

        $this->user->storeAdmin();
        return response()->json('success', 200);
    }
    
    public function update(UserRequest $request, $id)
    {
        $this->user->update($id);
        return response()->json('success', 200);
    }

    public function updateAdmin(UserAdminRequest $request, $id)
    {
        if(!Gate::allows('admin'))
        {
            return response()->json('erro', 403);
        }
        $this->user->updateAdmin($id);
        return response()->json('success', 200);
    }
    
    public function destroy($id)
    {
        $this->user->destroy($id);
        return response()->json('success', 200);
    }
}