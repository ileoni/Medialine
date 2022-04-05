<?php

namespace App\Repositories;

use App\Http\Requests\UserRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    private $eloquent;
    private $address;
    public function __construct(User $eloquent, Address $address) {
        $this->eloquent = $eloquent;
        $this->address = $address;
    }

    public function list()
    {
        $user = $this->eloquent;
        $search = request('search');

        $user = $user->select('*')->where('name', 'LIKE', $search.'%');
        
        return $user->get();
    }

    public function findById($id)
    {
        $user = $this->eloquent->find($id); 
        return $user;
    }

    public function store()
    {
        $user = $this->eloquent;
        $address = $this->address;
        $nonAdmin = 'user';

        $password = Hash::make(request('password'));

        $user->name = request('name');
        $user->email = request('email');
        $user->password = $password;
        $user->type = $nonAdmin;
        
        $address->state = request('state');
        $address->city = request('city');
        $address->street = request('street');
        $address->number = request('number');
         
        $user->save();
        $user->address()->save($address);
    }

    public function storeAdmin()
    {
        $user = $this->eloquent;
        $address = $this->address;

        $password = Hash::make(request('password'));

        $user->name = request('name');
        $user->email = request('email');
        $user->password = $password;
        $user->type = request('type');
        
        $address->state = request('state');
        $address->city = request('city');
        $address->street = request('street');
        $address->number = request('number');
         
        $user->save();
        $user->address()->save($address);
    }
    
    public function update($id)
    {
        $user = $this->eloquent->find($id);
        if(!$user) return;
        
        $password = Hash::make(request('password'));

        $user->name = request('name');
        $user->email = request('email');
        $user->password = $password;

        $address = $user->address->first();
        $address->state = request('state');
        $address->city = request('city');
        $address->street = request('street');
        $address->number = request('number');

        $user->push();
    }

    public function updateAdmin($id)
    {
        $user = $this->eloquent->find($id);
        if(!$user) return;
       
        $password = Hash::make(request('password'));
        
        $user->name = request('name');
        $user->email = request('email');
        $user->password = $password;
        $user->type = request('type');

        $address = $user->address->first();
        $address->state = request('state');
        $address->city = request('city');
        $address->street = request('street');
        $address->number = request('number');

        $user->push();
    }

    public function destroy($id)
    {
        $user = $this->eloquent->find($id);
        if(!$user) return;

        $user->delete();
    }
}