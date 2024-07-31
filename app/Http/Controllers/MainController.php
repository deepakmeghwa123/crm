<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function requirement()
    {
        $nationality=DB::table('europecountries')
                     ->get();

        return view('requirement',compact('nationality'));

    }


    public function registeruser(Request $req)
    {
        // $selectedLanguages = $req->input('language',[]); // Change 'languages' to 'language' to match the name in the view

        // echo "<pre>";
        // print_r($req);
        // echo "</pre>";
       
        //dd($req);
        $req->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/|max:35',
            'file'=>'required|max:1024|mimes:jpeg,png',
            'email'=>'required|email',
            'gender'=>'required',
            'nationality'=>'required',
               'tel'=>'required|max:12',
               'birthday'=>'required',
               'disponibility'=>'required',
               'language'=>'required',
               'licence'=>'required',
               'mobility'=>'required',
               'start_work'=>'required',
               'work_in'=>'required',
               'activities'=>'required',
               'duration'=>'required',
               'goods'=>'required',
               'picking_system'=>'required',
               'shoes_size'=>'required',

        ],
        [
            'name.required'=>"please enter fullname",
            'name.alpha'=>" contain only alphabet",
            'name.regex'=>"Invalid full Name",
            'name.max:35'=>" NOt more than 35 character",
            'file.max'=>'it"s contain only 1 mb file ',
            'file.mimes'=>'it contain only jpeg and png',
            'file.required'=>'select the photo',
            'email.required'=>'please enter the email',
        ]);
        if($req->has('file'))
        {
            
           
            $file = $req->file('file');
            $extension =$file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $path='uploads/';
            $file->move($path,$filename);
            
            $user=DB::table('registration')
            ->insert([
               'name'=>$req->name,
               'gender'=>$req->gender,
               'nationality'=>$req->nationality,
               'tel'=>$req->tel,
               'email'=>$req->email,
               'birthday'=>$req->birthday,
               'disponibility'=>$req->disponibility,
               'Language'=>json_encode($req->language),
               'licence'=>json_encode($req->licence),
               'Mobility'=>$req->mobility,
               'start_work'=>$req->start_work,
               'work_in'=>$req->work_in,
               'activities'=>json_encode($req->activities),
               'duration'=>$req->duration,
               'Recruiter'=>'0',
               'contact'=>'0',
               'rating'=>'0',
               'cv'=>'0',
               'goods'=>json_encode($req->goods),
               'picking_system'=>$req->picking_system,
               'shoes_size'=>$req->shoes_size,
               'profile_pic'=>$path.$filename
            ]);
           /// return $user;
           return redirect('home')->with('success',' successfully registration ');
        }
         else
        {
             return redirect()->back()->with('success','user is not register');
         }
      

        
 
      
    }
    

    public function login()
    {
        return view('login');   
    }
    public function loginuser(Request $req)
    {
        $user=DB::table('users')
                 ->where('email',$req->email)
                 ->where('password',$req->password)
                 ->first();
        if($user)
        {
            if($user->status=="Blocked")
            {
                return redirect()->back()->with('error','User Has beed Blocked');
            }
            session()->put('id',$user->id);
            session()->put('type',$user->type);
            session()->put('name', $user->name); 
            session()->put('email', $user->email); 
        
            if($user->type=="admin")
            {
                 return redirect('admin');
            }
        }
        else
        {
           return redirect()->back()->with('error','Email/password Wrong');
        }


    }

    public function logout()
    {
     session()->forget('id');
     session()->forget('type');
     session()->forget('email');
     session()->forget('name');
     return redirect('login');
    }
    

}