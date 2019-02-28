<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Scammer;
use App\Report;
use App\User;

class ScammerController extends Controller
{
    private function savePicture(Request $request){

        $path=$request->file('picture')->store('evidence');

        return 'storage/'.$path;
    }

    public function store(Request $request){  //create new scammer
        $request->validate([     //check whether scammer existed or not
            'username' => 'unique:scammers',
            'name' => 'required|unique:scammers',
            //'bank_name' => 'required',
            //'bank_account' => 'required',
            'platform' => 'required',
            'date' => 'required'
        ]);

        $scammer=Scammer::create([
            'username' => $request->username,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'slug' => str_slug($request->name, '-'),
            'status' => '0'   //status before admin (approve/decline)
        ]);

        $user = User::find(auth()->user()->id);  //link with user

        $user->scammers()->attach($scammer->id);  //scammer is submited by that user

        Report::create([
            'medium' => $request->platform,
            'amount' => $request->amount,
            'description' => $request->description,
            'date' => $request->date,
            'bank_name' => $request->bank_name,
            'bank_account' => $request->bank_account,
            'scammer_id' => $scammer->id,
            'status' => '0',  //status before admin (approve/decline)
            'picture' => $request->hasFile('picture') ?  $this->savePicture($request) : 'img/no_image.png'  //default picture for evidence
        ]);

        return redirect()->back()->with('message', 'Scammer has been created!');
    }

    public function report(Scammer $scammer,Request $request){  //create new report for the new scammer
        $request->validate([
            'platform' => 'required',
            'date' => 'required',
            'bank_name' => 'required',
            'bank_account' => 'required',
        ]);

        Report::create([
            'medium' => $request->platform,
            'amount' => $request->amount,
            'description' => $request->description,
            'date' => $request->date,
            'bank_name' => $request->bank_name,
            'bank_account' => $request->bank_account,
            'scammer_id' => $scammer->id,
            'status' => '0',  //status before admin (approve/decline)
            'picture' => $request->hasFile('picture') ?  $this->savePicture($request) : 'img/no_image.png' //if no evidence have been uploaded
        ]);

        return redirect()->back()->with('message', 'Report has been submitted!');
    }

    public function delete(Scammer $scammer){  //delete scammer
        $scammer->delete();

        return redirect()->back();
    }

    public function update(Scammer $scammer,Request $request){  //update scammer
        $request->validate([
            'username' => 'required',
            'status' => 'required',
            'name' => 'required'
        ]);

        if ($request->status == "2"){  //if deemed as unlegit (disapproved)
            $this->delete($scammer);  //automatically delete the report from db

            return redirect('/view/all/scammer');
        }
            $slug=str_slug($request->name, '-');
            $scammer->username = $request->username;
            $scammer->name = $request->name;
            $scammer->phone = $request->phone;
            $scammer->email = $request->email;
            $scammer->status = $request->status;
            $scammer->slug = $slug;

            $scammer->save();


        return redirect('/scammer/edit/'.$slug)->with('message', 'Scammer has been update!');
    }
}
