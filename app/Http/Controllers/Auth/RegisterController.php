<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestRegister;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
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
    public function getFormRegister(){
        $viewData =[
            'title_page'    => 'Đăng ký'
        ];
        return view('auth.register',$viewData);

    }
    public function postFormRegister(RequestRegister $request){
        $data               = $request->except('_token');

        $data['password']   =Hash::make($data['password']);
        $data['created_at'] = Carbon::now();
        $id =   User::insertGetId($data);
        if ($id){
            // hiển thị thông báo khi đăng ký thành công
            \Session::flash('toastr' ,[
                'type'      => 'success',
                'message'   => 'Đăng ký thành công'
            ]);

            if (\Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                // đăng ký thành công thì vào luôn
                return \redirect()->to('/');
            }
            return redirect()->route('get.login');
        }
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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
