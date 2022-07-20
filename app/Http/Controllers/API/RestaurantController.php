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

    public function show($id)
    {
        $restaurant = User::with(['types', 'products'])->where('id', $id)->first();
        if ($restaurant) {
            return $restaurant;
        } else {
            return response()->json(
                [
                    'status_code' => 404,
                    'status_message' => 'Page Not Found'
                ]
            );
        }
    }
}
