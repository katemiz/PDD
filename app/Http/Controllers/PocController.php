<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Poc;
use App\Models\Project;


class PocController extends Controller
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

        config(['pocs.form.project.options' => $optionArr]);

        $this->action = 'create';
        $poc = false;

        if ( isset($request->id) && !empty($request->id)) {
            $poc = Poc::find($request->id);
            $this->action = 'update';
        }

        return view('pocs.poc-form', [
            'action' => $this->action,
            'poc' => $poc,
        ]);
    }


    public function store(Request $request)
    {
        $id = false;

        $props['user_id'] = Auth::id();
        $props['project_id'] = $request->input('project');
        $props['description'] = $request->input('description');

        if ( isset($request->id) && !empty($request->id)) {

            $validated = $request->validate([
                'code' => ['required', 'max:12'],
                'name' => ['required','max:128'],
            ]);

            // update
            $project = Poc::find($request->id)->update(array_merge($props,$validated));

            $id = $request->id;
        } else {

            $validated = $request->validate([
                'code' => ['required', 'unique:pocs', 'max:12'],
                'name' => ['required','max:128'],
            ]);

            // create
            $project = Poc::create(array_merge($props,$validated));
            $id = $project->id;
        }

        return redirect('/pocs/view/'.$id);
    }


    public function view(Request $request)
    {
        $this->action = 'read';

        return view('pocs.poc-view', [
            'action' => $this->action,
            'poc' => Poc::find($request->id)
        ]);
    }


    public function delete($id)
    {
        Poc::find($id)->delete();
        return redirect('/pocs');
    }
}
