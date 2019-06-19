<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Vendor;

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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm() {
        return view('pages.auth.registration');
    }

    public function register(Request $request) {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'website' => 'required|max:50',
            'email' => 'required|unique:msvendor',
            'password' => 'required|confirmed|min:6',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $logo = $request->file("logo");
        if(isset($logo)){ 
            $logoImageName = time().'.'.$logo->getClientOriginalExtension();
            $path = "/images/vendor-logo/";
            $logo->move(public_path($path), $logoImageName);
            $path = $path . $logoImageName;
        }else {
            $path = "/assets/img/avatar1.jpg";
        }

        $vendor = Vendor::create([
            "VENDOR_NAME" => $request->name,
            "VENDOR_WEBSITE" => $request->name,
            "VENDOR_LOGO" => $path,
            "email" => $request->name,
            "password" => bcrypt($request->password)
        ]);
        $this->guard()->login($vendor);
        return redirect("/");
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
