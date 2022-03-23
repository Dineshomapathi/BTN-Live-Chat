<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\User;
use App\Message;
Use App\Operator;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{
    //user login
    public function index()
    {
      return view('login');
    }

    //user login
    public function indexlogin2()
    {
      return view('login2');
    }

    //operator login
    public function indexoperatorlogin()
    {
      return view('operatorlogin');
    }
    
    //moderator login
    public function indexmoderatorlogin()
    {
      return view('moderatorlogin');
    }

    //moderator 404
    public function notfound()
    {
      return view('404');
    }

    //check user auth login at dashboard
    public function dashboard(Request $request)
    {
      if(Auth::check()){
        $booth = $request->session()->get('booth');
        if($booth != null){
          $contact =  User::where('booth', '=', $booth)->value('id');
          if(Message::where('from', '=', $contact)->where('to', "=", auth()->id())->exists()){
            error_log('Already exist in message table');
          }else{
            $welcometext = User::where('booth', '=', $booth)->value('welcometext');
            // if($lang === 'EN'){
            //   $message = Message::create([
            //     'from' => $contact,
            //     'to' => auth()->id(),
            //     'text' => 'Hi there! Thank you for your message. Our support team will be actively available from 9am – 6pm, daily. Please leave your name, contact details, project of interest and our representative will get back to you as soon as we can.'
            // ]);
            // }elseif($lang === 'TH'){
            //   $message = Message::create([
            //     'from' => $contact,
            //     'to' => auth()->id(),
            //     'text' => 'ขอขอบคุณสำหรับข้อความ เนื่องจากทีมงานสามารถตอบกลับทันทีในช่วงเวลา 9.00 – 18.00 น. กรุณาฝากชื่อ เบอร์ติดต่อ และโครงการที่สนใจ ทางทีมงานจะติดต่อกลับไปโดยเร็วที่สุดค่ะ'
            // ]);
            // }elseif($lang === 'VI'){
            //   $message = Message::create([
            //     'from' => $contact,
            //     'to' => auth()->id(),
            //     'text' => 'Cảm ơn bạn đã nhắn tin. Đội ngũ hỗ trợ của chúng tôi làm việc từ 9h sáng tới 6h tối hàng ngày. Vui lòng để lại họ tên, email hoặc số điện thoại, dự án mà bạn quan tâm và đại diện của chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.'
            // ]);
            // }elseif($lang === 'ID'){
            //   $message = Message::create([
            //     'from' => $contact,
            //     'to' => auth()->id(),
            //     'text' => 'Hai! Terima kasih sudah menghubungi kami. Kami akan kembali menjawab pesan anda di jam kerja pada pukul 9 pagi - 6 sore, setiap hari. Silakan tinggalkan nama Anda, detail kontak, proyek yang diminati dan sales kami akan menghubungi Anda sesegera mungkin.'
            // ]);
            // }

            if($welcometext === null){
              $message = Message::create([
                'from' => $contact,
                'to' => auth()->id(),
                'text' => 'Hi there! Thank you for your message. Our support team will be actively available from 9am – 6pm, daily. Please leave your name, contact details, project of interest and our representative will get back to you as soon as we can.'
            ]);
            }else{
              $message = Message::create([
                'from' => $contact,
                'to' => auth()->id(),
                'text' => $welcometext
            ]);
            }
          }
        }

        return view('dashboard');
      }
      return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }

    //check operator auth login at dashboard
    public function dashboard2()
    {
      if(Auth::check()){
        return view('dashboard2');
      }
      return Redirect::to("operatorlogin")->withSuccess('Opps! You do not have access');
    }

    //User login
    public function postLogin(Request $request)
    {
        //check booth exist
        $boothexist = User::where('booth', '=', $request->input('booth'))->first();

        if($boothexist != null){

          //capture booth id from url
          $booth = $request->input('booth');

          //check loginotp exist
          $user = User::where('loginotp', '=', $request->only('loginotp'))->first();

          //get operator name
          // $operator = User::where('', '=', $request->only(''))->first();
          // $booth = $request->session()->get('booth');

          //check credential correct
          $login = User::where([
            'loginotp' => $request->loginotp, 
            'password' => $request->password,
          ])->first();

          //validate request
          request()->validate([
          'loginotp' => 'required',
          'password' => 'required',
          ]);
          
          //if user exist login or create new user and auto login
          if ($user != null) {
            if($login){
              // Authentication passed...
              Auth::login($login);
              $request->session()->forget('booth');
              $request->session()->put('booth', $booth);
              return redirect()->intended('dashboard');
            }else{
              return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');
            }
          }else{
              $data = $request->all();
              $check = $this->create($data);

              //check credential correct after create user
              $login2 = User::where([
                'loginotp' => $request->loginotp, 
                'password' => $request->password,
              ])->first();

              if($login2){
                // Authentication passed...
                Auth::login($login2);
                $request->session()->forget('booth');
                $request->session()->put('booth', $booth);
                return redirect()->intended('dashboard');
              }
          }

        }else{
          return view('404');
        }

    }

    //User login no room 
    public function postLogin2(Request $request){
      //capture booth id from url
      // $booth = $request->input('booth');
    
      //check loginotp exist
      $user = User::where('loginotp', '=', $request->only('loginotp'))->first();
    
      //get operator name
      // $operator = User::where('', '=', $request->only(''))->first();
      // $booth = $request->session()->get('booth');
    
      //check credential correct
      $login = User::where([
        'loginotp' => $request->loginotp, 
        'password' => $request->password,
      ])->first();
    
      //validate request
      request()->validate([
        'loginotp' => 'required',
        'password' => 'required',
      ]);
            
      //if user exist login or create new user and auto login
      if ($user != null) {
        if($login){
          // Authentication passed...
          Auth::login($login);
          $request->session()->forget('booth');
          // $request->session()->put('booth', $booth);
          return redirect()->intended('dashboard');
        }else{
          return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');
        }
      }else{
          $data = $request->all();
          $check = $this->create($data);
    
          //check credential correct after create user
          $login2 = User::where([
            'loginotp' => $request->loginotp, 
            'password' => $request->password,
          ])->first();
    
          if($login2){
            // Authentication passed...
            Auth::login($login2);
            $request->session()->forget('booth');
            // $request->session()->put('booth', $booth);
            return redirect()->intended('dashboard');
          }
      }
    }

    //operatorlogin
    public function postoperatorLogin(Request $request)
    {
        //check credential correct
        $login = User::where([
          'loginotp' => $request->loginotp, 
          'password' => $request->password
        ])->first();

        //validate request
        request()->validate([
          'loginotp' => 'required',
          'password' => 'required',
        ]);
        
        //if operator exist login
        if($login){
          // Authentication passed...
          Auth::login($login);
          return redirect()->intended('dashboard2');
        }else{
          return Redirect::to("operatorlogin")->withSuccess('Oppes! You have entered invalid credentials');
        }  
    }

    //moderator login
    public function postmoderatorLogin(Request $request)
    {
        //check credential correct
        $login = User::where([
          'loginotp' => $request->loginotp, 
          'password' => $request->password
        ])->first();

        //validate request
        request()->validate([
          'loginotp' => 'required',
          'password' => 'required',
        ]);
        
        //if moderator exist login
        if($login){
          // Authentication passed...
          Auth::login($login);
          return redirect()->intended('products');
        }else{
          return Redirect::to("moderatorlogin")->withSuccess('Oppes! You have entered invalid credentials');
        } 
    }

    //create user function
    public function create(array $data)
    {
      return User::create([
        'loginotp' => $data['loginotp'],
        'password' => $data['password'],
        'role' => 'user'
      ]);
    }

    //create operator function
    public function createoperator(array $data)
    {
      return User::create([
        'loginotp' => $data['loginotp'],
        'password' => $data['password'],
        'role' => 'operator',
        'booth' => $data['booth']
      ]);
    }
     
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('moderatorlogin');
    }
}
?>