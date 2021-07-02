<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }  
      

    public function customLogin(Request $request)
    {

     // method @guest của trang dashboard là khách -> chưa xác thực á 
     // nếu là  @auth của trang dashboard thì là đã xác thực 
    
       
     $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        
        $input = [
            'user_name' => $credentials['email'],
            'password'=> $credentials['password']
             
        ];
      
        
   
     //   $credentials = $request->only('', 'password');
       //phương thức only lấy 1 tập hợp con các dữ liệu đầu vào
     
        if (Auth::attempt($input)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
    
       
        
        return redirect("login")->withSuccess('Login details are not valid');


  
    }



    public function registration()
    {
        return view('auth.registration');
    }
      

    public function customRegistration(Request $request)
    {  
    
        $request->validate([
            'name' => 'required',
          
            'email' => 'required',
           
            'password' => 'required|min:6',
           
        ]);
       
      
        $data = $request->all();
       
        $this->create($data);
     
      
        return redirect("dashboard")->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
      return User::create([
        'user_name' => $data['name'],
        'user_email' => $data['email'],
        'user_password' => Hash::make($data['password'])
      ]);
    }    
    

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}