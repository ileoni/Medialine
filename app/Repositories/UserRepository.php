<?php

namespace App\Repositories;

use App\Http\Requests\UserRequest;
use App\Models\Address;
use App\Models\User;

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
        return $this->eloquent->all();
    }

    public function findById($id)
    {
        $user = $this->eloquent->find($id)
                    ->only('name', 'email', 'type'); 
        return $user;
    }

    public function store()
    {
        $user = $this->eloquent;
        $address = $this->address;
        $nonAdmin = 'user';

        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');
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

        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');
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
        
        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');

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
        
        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');
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