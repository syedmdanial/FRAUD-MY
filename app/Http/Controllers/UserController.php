<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use App\User;

class UserController extends Controller
{
    public function register(Request $request){  //register normal users
        $request->validate([
            'username' => 'required|unique:users|min:3',
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'slug' => str_slug($request->username, '-'),
            'role' => '2',
            'picture' => 'img/default.png',  //default profile picture
            'password' => bcrypt($request->password)
        ]);

        return view('confirm')->with('message', '<h2>Thanks for registering!</h2>
        <p>Click this to <a href="/login">login</a></p>');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        $err = 'Wrong Email or Password';

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard'); //admin or user dashboard
        }else{
            return view('login',compact('err'));
        }
    }

    private function savePicture(Request $request){   //save profile picture

        $path=$request->file('picture')->store('profile');

        return 'storage/'.$path;
    }

    private function updatePicture(Request $request,User $user){   //change profile picture
        if ($user->picture != 'img/default.png'){  //if not default img, replace.
            Storage::delete(substr($user->picture,8));
        }

        $path=$request->file('picture')->store('profile');

        return 'storage/'.$path;
    }

    public function store(Request $request){  //store created user
        $request->validate([
            'username' => 'required|unique:users|min:3',
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|min:6',
            'role' => 'required'
        ]);

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'slug' => str_slug($request->username, '-'),
            'role' => $request->role,
            'picture' => $request->hasFile('picture') ?  $this->savePicture($request) : 'img/default.png',
            'password' => bcrypt($request->password)
        ]);

        return redirect()->back()->with('message', 'User has been created!');
    }

    public function show(){
        $users=User::all()->except(auth()->user()->id);  //show all except current user

        return view('dashboard.user.view',compact('users'));  //normal user
    }

    public function delete(User $user){  //delete user
        if ($user->picture != 'img/default.png'){
            Storage::delete(substr($user->picture,8));
        }
        $user->delete();

        return redirect()->back();
    }

    public function update(User $user,Request $request){ //update user
        $request->validate([
            'username' => 'required|min:3',
            'name' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);

        $user->username = $request->username;
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->slug = str_slug($request->username, '-');
        $user->email = $request->email;
        $user->role = $request->role;
        $user->picture = $request->hasFile('picture') ?  $this->updatePicture($request,$user) : $user->picture;

        $user->save();

        return redirect()->back()->with('message', 'User has been updated!');
    }

    public function profileBasic(Request $request){  //update profile

        $user=User::find(auth()->user()->id);

        $request->validate([
            'username' => 'required|min:3',
            'name' => 'required',
            'email' => 'required'
        ]);

        $user->username = $request->username;
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->slug = str_slug($request->username, '-');
        $user->email = $request->email;
        $user->picture = $request->hasFile('picture') ?  $this->updatePicture($request,$user) : $user->picture;

        $user->save();

        return redirect()->back()->with('message', 'Your profile has been updated!');
    }

    public function profilePassword(Request $request){  //change password

        $request->validate([
            'oldpassword' => 'required|min:6',
            'password' => 'required|confirmed|min:6'
        ]);

        $user=User::find(auth()->user()->id);

        if (!Hash::check($request->oldpassword, $user->password)){  //if current pass doesnt match
            return redirect()->back()->with('error', 'Current password is not same!');
        }
        if (Hash::check($request->password, $user->password)){  //if old pass doesnt match
            return redirect()->back()->with('error', 'Old password cannot be same as new password!');
        }

        $user->password = bcrypt($request->password);  //encrypt pass

        $user->save();  //saves new pass

        return redirect()->back()->with('message', 'Your password has been updated!');
    }

    public function contact(Request $request){  //contact us

        $name=$request->fname.' '.$request->lname;

        Mail::to('fraud.my@gmail.com')->send(new ContactUs($name,$request->email,$request->phone,$request->message));  //email to admin's email

        return view('confirm')->with('message', '<h2>Thank you for your feedback!</h2>');
    }
}
