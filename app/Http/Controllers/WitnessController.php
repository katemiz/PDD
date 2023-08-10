<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Witness;
use App\Models\Project;


class WitnessController extends Controller
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

        config(['witnesses.form.project.options' => $optionArr]);

        $this->action = 'create';
        $witness = false;

        if ( isset($request->id) && !empty($request->id)) {
            $witness = Witness::find($request->id);
            $this->action = 'update';
        }

        return view('witness.witness-form', [
            'action' => $this->action,
            'witness' => $witness,
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
                'code' => ['required'],
                'name' => ['required','max:128'],
            ]);

            // update
            $witness = Witness::find($request->id)->update(array_merge($props,$validated));

            $id = $request->id;
        } else {

            $validated = $request->validate([
                'code' => ['required', 'unique:witnesses'],
                'name' => ['required','max:128'],
            ]);

            // create
            $witness = Witness::create(array_merge($props,$validated));
            $id = $witness->id;
        }

        return redirect('/witness/view/'.$id);
    }


    public function view(Request $request)
    {
        $this->action = 'read';

        return view('witness.witness-view', [
            'action' => $this->action,
            'witness' => Witness::find($request->id)
        ]);
    }


    public function delete($id)
    {
        Witness::find($id)->delete();
        return redirect('/witness');
    }
}
