<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Meeting;
use App\Models\Project;


class GateController extends Controller
{
    public $action;

    public function form(Request $request)
    {
        $projects = Project::all()->sortBy("name");

        if ( $projects->count() < 1) {

            return view('warning', [
                'warning' => config('warnings.100'),
            ]);
        }

        $optionArr = [];

        foreach ($projects as $project) {
            $optionArr[$project->id] = $project->code;
        }

        config(['dgates.form.project.options' => $optionArr]);

        $this->action = 'create';
        $dgate = false;

        if ( isset($request->id) && !empty($request->id)) {
            $dgate = Meeting::find($request->id);
            $this->action = 'update';
        }

        return view('projects.gates-form', [
            'action' => $this->action,
            'dgate' => $dgate,
        ]);
    }


    public function store(Request $request)
    {
        $id = false;

        $props['user_id'] = Auth::id();
        $props['project_id'] = $request->input('project');

        if ( isset($request->id) && !empty($request->id)) {

            $validated = $request->validate([
                'code' => ['required', 'max:12'],
                'name' => ['required','max:128'],
            ]);

            // update
            $project = Meeting::find($request->id)->update(array_merge($props,$validated));

            $id = $request->id;
        } else {

            $validated = $request->validate([
                'code' => ['required', 'unique:meetings', 'max:12'],
                'name' => ['required','max:128'],
            ]);

            // create
            $project = Meeting::create(array_merge($props,$validated));
            $id = $project->id;
        }

        return redirect('/dgates/view/'.$id);
    }


    public function view(Request $request)
    {
        $this->action = 'read';

        return view('projects.dgates-view', [
            'action' => $this->action,
            'dgate' => Meeting::find($request->id)
        ]);
    }


    public function delete($id)
    {
        Meeting::find($id)->delete();
        return redirect('/projects');
    }
}
