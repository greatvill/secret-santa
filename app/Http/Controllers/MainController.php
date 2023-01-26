<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;

class MainController extends Controller
{
    public function get(User $user): UserResource
    {
        return new UserResource($user);
    }
}
