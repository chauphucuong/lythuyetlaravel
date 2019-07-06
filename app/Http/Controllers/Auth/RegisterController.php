<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\RegisterRequest;
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
        ],[
            'name.required' =>'Vui lòng nhập tên',
            'name.max'=>'Họ tên không được quá 255 kí tự',
            'email.required' =>'Vui lòng nhập email',
            'email.email' =>'Vui lòng nhập đúng thể loại email @gmail.com',
            'email.max' =>'Email không được quá 255 kí tự',
            'email.unique' =>'Email đã tồn tại',
            'password.required' =>'Vui lòng nhập password',
            'password.min' =>'Password không được nhỏ hơn 6 kí tự'
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

    public function getRegister(){
        return view('Auth/register');
    }

    public function postRegister(RegisterRequest $req)
    {
        $thanhvien =new User;
        $thanhvien->name = $req->name;
        $thanhvien->email =$req->email;
        $thanhvien->password = Hash::make($req->password);
        $thanhvien->remember_token = $req->_token;
        $thanhvien->save();
    }
}
