<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Project;


class CurrentProjectController extends Controller
{
    

    public function selectCurrent()
    {
        $params = ["title" => "Set Current Project","subtitle" => "Set default project for requirements"];

        //dd("aaa");


        return view('set-current-project', [
            'projects' => Project::all()->sortBy("code"),
            'params' => $params
        ]);
    }


    public function setCurrent(Request $request)
    {
        session(['current_project_id' => $request->id]);
        session(['current_project_name' => Project::find($request->id)->code]);

        return redirect('/requirements');
    }



}
