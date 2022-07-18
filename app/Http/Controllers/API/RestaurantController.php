<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        return User::with(['types'])->orderByDesc('id')->paginate(9);
    }
}
