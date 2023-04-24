<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customer = User::all();
        $data = compact('customer');
        // // return view('customer-view')->with($data);
        return view('home')->with($data);

    }

    public function delete($id){
        $customer = User::find($id );
        if(!is_null($customer)){
            $customer->delete();
        }
        return redirect('/home')->with('message',"Deleted");
 
    }

    public function edit($id){
        $customer = User::find($id );
        if(!is_null($customer)){
            $title = "Update";
            $url = url('user/update/')."/".$id;
            $data = compact('customer','url','title');
            return view('auth.register')->with($data);
        }else{
            return redirect('/home');
        }
    }

    public function update($id, Request $update){

        $customer = User::find($id );
        $customer->name = $update['name'];
        $customer->email = $update['email'];
        $customer->dob = $update['dob'];
        $customer->mobile = $update['mobile'];
        $customer->save();
        return redirect('/home')->with('message',"Updated");

    }


}
