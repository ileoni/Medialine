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

    public function index()
    {
        $user = $this->user->list();
        return view('user.index', ['users' => $user]);
    }

    public function create()
    {
        return view('user.create');
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
        return redirect('/usuario');
    }
    
    public function findById($id)
    {
        $user = $this->user->findById($id);
        return response()->json($user, 200);
    }
    
    public function edit($id)
    {
        $user = $this->user->findById($id);
        return view('user.edit', ['user' => $user]);
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
        return redirect('/usuario');
    }
    
    public function destroy($id)
    {
        $this->user->destroy($id);
        return redirect('/usuario');
    }
}