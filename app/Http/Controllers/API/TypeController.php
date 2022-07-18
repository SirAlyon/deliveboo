<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        return Type::orderByDesc('id')->get();
=======
        return Type::orderByDesc('id')->paginate(9);
>>>>>>> 22-create-storage
    }
}
