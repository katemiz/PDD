<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Company;
use App\Models\Endproduct;
use App\Models\Meeting;
use App\Models\Moc;
use App\Models\Poc;
use App\Models\Project;
use App\Models\Requirement;
use App\Models\Verification;
use App\Models\Witness;

use App\Rules\EditorRule;
use App\Rules\SelectRule;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RequirementsExport;

class RequirementController extends Controller
{
    public $action;

    public function __construct () {

        $projects = Project::all()->sortBy("code");

        if ( $projects->count() < 1) {

            return view('warning', [
                'warning' => config('warnings.110')
            ]);
        }
    }


    public function getEndProducts($idReq) {

        $req = Requirement::find($idReq);
        return Project::find($req->project_id)->endproducts()->get();
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'project' => 'required|numeric',
            'rtype' => ['required', 'string', new SelectRule],
            'text' => 'required|min:25',
        ]);

        $props['user_id'] = Auth::id();
        $props['project_id'] = $validated['project'];
        $props['rtype'] = $validated['rtype'];
        $props['cross_ref_no'] = $request->input('cross_ref_no');
        $props['text'] = $validated['text'];
        $props['remarks'] = $request->input('remarks');

        if ( isset($request->id) && !empty($request->id)) {
            // update
            Requirement::find($request->id)->update($props);
            $id = $request->id;

            $requirement = Requirement::find($id);
        } else {
            // create
            $requirement = Requirement::create($props);
            $id = $requirement->id;
        }

        // END PRODUCTS
        $endproducts = $this->getEndProducts($id);

        $dizin = [];
        foreach ($endproducts as $endproduct) {

            $varname  = "endproduct".$endproduct->id;

            if ( $request->input($varname) ) {
                array_push($dizin,$endproduct->id);
            }
        }

        $requirement->endproducts()->sync($dizin);

        return redirect('/requirements/view/'.$id);
    }


    public function view(Request $request)
    {
        $this->action = 'read';

        $req = Requirement::find($request->id);
        $previous = Requirement::where('id','<',$req->id)->orderBy('id','desc')->get()->take(1)->toArray();
        $next = Requirement::where('id','>',$req->id)->limit(1)->get();

        $n = false;
        $p = false;

        if (count($previous) > 0 ) {
            $p = $previous['0']['id'];
        }

        if (count($next) > 0 ) {
            $n = $next['0']['id'];
        }

        return view('requirement.view', [
            'action' => $this->action,
            'requirement' => $req,
            'previous' => $p,
            'next' => $n
        ]);
    }


    public function delete($id)
    {
        // Delete first verifications for this requirement
        $linked_vers = Verification::where('requirement_id',$id)->get();

        foreach ($linked_vers as $ver) {
            Verification::find($ver->id)->delete();
        }

        Requirement::find($id)->endproducts()->detach();    // Delete linked End Products
        Requirement::find($id)->delete();
        return redirect('/requirements');
    }



    public function verform(Request $request)
    {
        $ver = false;
        $action = 'create';

        $requirement = Requirement::find($request->rid);

        if ($request->id)  {
            $ver = Verification::find($request->id);
            $action = 'update';
        }

        // DGATES
        $dg_collection = Meeting::where('project_id',$requirement->project->id)->get();
        $dgates = [];
        foreach ($dg_collection as $dg) {
            $dgates[$dg->id] = $dg->name;
        }
        config(['verifications.form.dgate.options' => $dgates]);

        // MOCS
        $moc_collection = Moc::where('project_id',$requirement->project->id)->get();
        $mocs = [];
        foreach ($moc_collection as $mmm) {
            $mocs[$mmm->id] = $mmm->name;
        }
        config(['verifications.form.moc.options' => $mocs]);

        // POCS
        $poc_collection = Poc::where('project_id',$requirement->project->id)->get();
        $pocs = [];
        foreach ($poc_collection as $ppp) {
            $pocs[$ppp->id] = $ppp->name;
        }
        config(['verifications.form.poc.options' => $pocs]);

        // WITNESSES
        $witness_collection = Witness::where('project_id',$requirement->project->id)->get();
        $witnesses = [];
        foreach ($witness_collection as $www) {
            $witnesses[$www->id] = $www->name;
        }
        config(['verifications.form.witness.options' => $witnesses]);

        return view('requirement.verform', [
            'requirement' => $requirement,
            'verification' => $ver,
            'action' => $action
        ]);
    }




    public function verstore(Request $request)
    {

        $props['requirement_id'] = $request->rid;

        $validated = $request->validate([
            'dgate' => 'required|numeric',
            'moc' => 'required|numeric',
            'poc' => 'required|numeric',
            'witness' => 'required|numeric',
        ]);

        $props['user_id'] = Auth::id();
        $props['project_id'] = $request->input('projectid');
        $props['meeting_id'] = $validated['dgate'];
        $props['moc_id'] = $validated['moc'];
        $props['poc_id'] = $validated['poc'];
        $props['witness_id'] = $validated['witness'];
        $props['remarks'] = $request->input('remarks');

        if ( isset($request->id) && !empty($request->id)) {
            // update
            Verification::find($request->id)->update($props);
            $id = $request->id;

            $verification = Verification::find($id);
        } else {
            // create
            $verification = Verification::create($props);
            $id = $verification->id;
        }

        return redirect('/requirements/view/'.$request->rid);
    }




    public function delver(Request $request)
    {
        Verification::find($request->id)->delete();
        return redirect('/requirements/view/'.$request->rid);
    }



    public function excelExport()
    {
        return Excel::download(new RequirementsExport, 'requirements.xlsx');
    }


}
