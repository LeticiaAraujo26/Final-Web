<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user){
        return \Auth::user()->tipo == 'gerente';
    }

    public function view(User $user){
        return \Auth::user()->tipo == 'gerente';
    }

    public function update(User $user){
        return \Auth::user()->tipo == 'gerente';
    }
 
}
