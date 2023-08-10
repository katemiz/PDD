<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Endproduct;
use App\Models\Project;



class EndProductsController extends Controller
{
    public $action;

    public function form(Request $request)
    {
        $projects = Project::all()->sortBy("title");

        if ( $projects->count() < 1) {

            return view('warning', [
                'warning' => config('warnings.120'),
            ]);
        }

        $optionArr = [];

        foreach ($projects as $project) {
            $optionArr[$project->id] = $project->code;
        }

        config(['endproducts.form.project.options' => $optionArr ]);

        $this->action = 'create';
        $endproduct = false;

        if ( isset($request->id) && !empty($request->id)) {
            $endproduct = Endproduct::find($request->id);
            $this->action = 'update';
        }

        return view('endproduct.form', [
            'action' => $this->action,
            'endproduct' => $endproduct
        ]);
    }


    public function store(Request $request)
    {
        $id = false;

        $props['user_id'] = 1; //Auth::id();
        $props['project_id'] = $request->input('project');

        if ( isset($request->id) && !empty($request->id)) {

            $validated = $request->validate([
                'code' => ['required', 'max:12'],
                'title' => ['required','max:128'],
            ]);

            // update
            $endproduct = Endproduct::find($request->id)->update(array_merge($props,$validated));

            $id = $request->id;
        } else {

            $validated = $request->validate([
                'code' => ['required', 'unique:endproducts', 'max:64'],
                'title' => ['required','max:128'],
            ]);

            // create
            $endproduct = Endproduct::create(array_merge($props,$validated));
            $id = $endproduct->id;
        }

        return redirect('/endproducts/view/'.$id);
    }


    public function view(Request $request)
    {
        $this->action = 'read';



        return view('endproduct.view', [
            'action' => $this->action,
            'endproduct' => Endproduct::find($request->id)
        ]);
    }


    public function delete($id)
    {
        Endproduct::find($id)->delete();
        return redirect('/endproducts');
    }
}
