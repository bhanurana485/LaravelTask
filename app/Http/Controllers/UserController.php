<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Session;
use DateTime;



class UserController extends Controller
{
  public function index()
  {
      echo "<h1>helllo</h1>";
  }
  public function userReg(Request $request)
  {
 $user = new User;
$data = $request->input();
$user->name=$data['name'];
$user->email=$data['email'];
$user->dob=$data['dob'];
$user->password=$data['password'];
//User::create($user);
   
//    $$user= $request->input('name');
//    $email=$request->input('email');
//    $password =$request->input('password');
//    $dob =$request->input('dob');
//   // DB::table('users')->create([ 'name' => $name, 'email' => $email]); 
  User::create([ 'name' => $data['name'], 'email' => $data['email'],'dob' =>$data['dob'],'password'=>$data['password']]);
  Session::flash('message', 'user created'); 
  return view("welcome");
//    echo "$name $password $dob";

//       print_r($request->name);
  }

 public function userList(Request $request)
{
  $flag=Session::get('login');
  if($flag == 1)
  {
    $data = $request->input();
    $user = DB::table('users')->get();
    return view("list", ["users"=>$user]);
  }
  else{
    return view("login");
  }
 
}
  public function userLogin(Request $request)
  {
    
$ldate = date('Y-m-d ');
    $data = $request->input();
    $user = DB::table('users')->where('email',  $data['email'])
    ->where('password','=',$data['password'])->get();
    $obj= $user[0];
    $date2=date("d-m-Y");

    $date1=new DateTime($obj->dob);
    $date2=new DateTime($date2);
    $interval = $date1->diff($date2);
    $i=$interval->format('%d days');
    

   if($i > 31)
   {
    echo "more than 30";
    Session::put('login', 1);
   }
   elseif($i > 18 && $i< 30)
   {
     echo "age is 18- 30";
    Session::put('login', 2);
    userList();
   }
   elseif($i< 18)
   {
    echo "less than 18";
    Session::put('login', 1);
    return $this->userList($request);
  
    
   }
  }
 
}

