<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SecretSantaController extends Controller
{
    public function getUserData($id)
    {
        return User::getUserRecipient($id);
    }

}
