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
        $this->middleware('auth', ['except' => ['create', 'store']]);
    }

    public function index()
    {
        $user = $this->user->list();
        return view('user.index', ['users' => $user]);
    }

    public function create()
    {
        return view('auth.register');
    }
    
    public function store(UserRequest $request)
    {
        $this->user->store();
        return redirect('home');
    }
}