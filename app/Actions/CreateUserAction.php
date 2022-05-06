<?php
namespace App\Actions;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserAction
{
    public function execute(string $name, string $login, string $password){
        $user = new User([
            'name'=>$name,
            'login'=>$login,
            'password'=>Hash::make($password)
        ]);
        $user->save();
        return true;
    }
}
