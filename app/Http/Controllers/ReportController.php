<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Report;

class ReportController extends Controller
{
    public function delete(Report $report){ //delete the report
        $report->delete();

        return redirect()->back();
    }

    private function updatePicture(Request $request,Report $report){ //evidence picture update
        if ($report->picture != 'img/no_image.png'){  //if img is not default
            Storage::delete(substr($report->picture,8)); //delete old, replace with new
        }

        $path=$request->file('picture')->store('evidence');  //store picture in evidence folder

        return 'storage/'.$path;
    }

    public function update(Report $report,Request $request){  //update report
        $request->validate([
            'date' => 'required',
            'status' => 'required',
            'amount' => 'required',
            'bank_name' => 'required',
            'bank_account' => 'required',
        ]);

        if ($request->status == "2"){  //if deemed as unlegit (disapproved)
            $this->delete($report);  //delete the report from db

            return redirect('/view/all/report');
        }

            $report->amount = $request->amount;
            $report->description = $request->description;
            $report->date = $request->date;
            $report->bank_name = $request->bank_name;
            $report->bank_account = $request->bank_account;
            $report->status= $request->status;
            $report->picture = $request->hasFile('picture') ?  $this->updatePicture($request,$report) : $report->picture;

            $report->save();

        return redirect()->back()->with('message', 'Report has been updated!');
    }
}
