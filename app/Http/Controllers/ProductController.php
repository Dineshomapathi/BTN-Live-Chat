<?php
  
namespace App\Http\Controllers;
  
use App\Product;
Use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$role = Auth::user()->role;

        if($role == 'admin'){
            $operators = User::latest()->where('role', '=', 'operator')->paginate(15);

            // dd(User::latest()->where('role', '=', 'moderator'));

            return view('products.index',compact('operators'))->with('i', (request()->input('page', 1) - 1) * 15);
        }else if($role == 'moderator'){
            $operators = User::latest()->where('role', '=', 'operator')->paginate(15);
            $users = User::latest()->where('role', '=', 'user')->paginate(15);
            $moderators = User::latest()->where('role', '=', 'moderator')->paginate(15);

            // dd(User::latest()->where('role', '=', 'moderator'));

            return view('products.admin',compact('moderators','operators','users'))->with('i', (request()->input('page', 1) - 1) * 15);
        }else{
            return Redirect::to("moderatorlogin")->withSuccess('Opps! You do not have access');
        }
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Auth::user()->role;

        if($role == 'moderator'){
            return view('products.create');
        }else if($role == 'admin'){
            return view('products.create2');
        }
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $loginotp = User::where('loginotp', '=', $request->only('loginotp'))->first();
        // $booth = User::where('booth', '=', $request->only('booth'))->first();

        // if($loginotp != null || $booth != null){
        //     Alert::error('Name or Booth exist unable to create try again!');
        //     return redirect()->route('products.index');
        // }else{
            $request->validate([
                'loginotp' => 'string|max:255',
                'role' => 'required|string|max:255',
                'password' => 'required',
                'welcometext' => 'required',
            ]);
                
            User::create($request->all());
       
            Alert::success('Operator created successful');
            return redirect()->route('products.index');
        // }  
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\User $product
     * @return \Illuminate\Http\Response
     */
    public function show(User $product)
    {
        return view('products.show',compact('product'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $product
     * @return \Illuminate\Http\Response
     */
    public function edit(User $product)
    {
        return view('products.edit',compact('product'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $product)
    {
        $loginotp = User::where('loginotp', '=', $request->only('loginotp'))->first();

        if($loginotp != null){
            Alert::error('Name exist unable to created try again!');
            return redirect()->route('products.index');
        }else{
            $request->validate([
                'loginotp' => 'required|string|max:255'
            ]);
      
            $product->update($request->all());
      
            Alert::success('Successfully Updated');
            return redirect()->route('products.index');
        }

    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $product)
    {
        $product->delete();
        
        Alert::success('Operator deleted successful');
        return redirect()->route('products.index');
    }
}