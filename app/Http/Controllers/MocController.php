<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Moc;
use App\Models\Project;


class MocController extends Controller
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

        config(['mocs.form.project.options' => $optionArr]);

        $this->action = 'create';
        $moc = false;

        if ( isset($request->id) && !empty($request->id)) {
            $moc = Moc::find($request->id);
            $this->action = 'update';
        }

        return view('mocs.moc-form', [
            'action' => $this->action,
            'moc' => $moc,
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
            $project = Moc::find($request->id)->update(array_merge($props,$validated));

            $id = $request->id;
        } else {

            $validated = $request->validate([
                'code' => ['required', 'unique:mocs', 'max:12'],
                'name' => ['required','max:128'],
            ]);

            // create
            $project = Moc::create(array_merge($props,$validated));
            $id = $project->id;
        }

        return redirect('/mocs/view/'.$id);
    }


    public function view(Request $request)
    {
        $this->action = 'read';

        return view('mocs.moc-view', [
            'action' => $this->action,
            'moc' => Moc::find($request->id)
        ]);
    }


    public function delete($id)
    {
        Moc::find($id)->delete();
        return redirect('/mocs');
    }
}
