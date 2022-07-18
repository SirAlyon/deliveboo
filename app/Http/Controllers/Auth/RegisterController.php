<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Type;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function showRegistrationForm()
    {
        $types = Type::all();
        //dd($types);
        return view('auth.register', compact('types'));
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //dd($data);

        return Validator::make($data, [
            'name' => ['required', 'string', 'min:2','max:50', 'regex:/^[a-zA-Z ]*$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'lastname' => ['required', 'string', 'min:2', 'max:50', 'regex:/^[a-zA-Z ]*$/'],
            'restaurant_name' => ['required', 'string', 'min:2', 'max:70'],
            'address' => ['required', 'string', 'min:2', 'max:255'],
            'vat' => ['required', 'string', 'min:2', 'max:30'],
            'types' => ['exists:types,id','required'],
            'image' => ['nullable', 'file', 'image', 'max:250', 'mimetypes:image/jpeg,image/png,image/jpg,image/svg'],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        $new_user = User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
            'lastname' => $data['lastname'],
            'restaurant_name' => $data['restaurant_name'],
            'address' => $data['address'],
            'vat' => $data['vat'],
        ]);

        if(request()->hasFile('image')) {
            $image = request()->file('image')->getClientOriginalName();
            request()->file('image')->storeAs('/restaurant_img', $new_user->id . '/' . $image, '');
            $new_user->update(['image' => $image]);
        }

        $new_user->types()->sync($data['types']);

        return $new_user;



        
    }
}
