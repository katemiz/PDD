<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Company;
use App\Models\Project;


class CompanyController extends Controller
{
    public $action;

    public function form(Request $request)
    {
        $this->action = 'create';
        $company = false;

        if ( isset($request->id) && !empty($request->id)) {
            $company = Company::find($request->id);
            $this->action = 'update';
        }

        return view('companies.form', [
            'action' => $this->action,
            'company' => $company
        ]);
    }


    public function store(Request $request)
    {
        $id = false;

        $props['user_id'] = Auth::id();

        if ( isset($request->id) && !empty($request->id)) {

            $validated = $request->validate([
                'name' => ['required', 'max:32'],
                'fullname' => ['required','max:256'],
            ]);

            // update
            $company = Company::find($request->id)->update(array_merge($props,$validated));

            $id = $request->id;
        } else {

            $validated = $request->validate([
                'name' => ['required', 'unique:companies', 'max:32'],
                'fullname' => ['required','max:256'],
            ]);

            // create
            $company = Company::create(array_merge($props,$validated));
            $id = $company->id;
        }

        return redirect('/companies/view/'.$id);
    }


    public function view(Request $request)
    {
        $this->action = 'read';

        return view('companies.view', [
            'action' => $this->action,
            'company' => Company::find($request->id)
        ]);
    }


    public function delete($id)
    {
        Company::find($id)->delete();
        return redirect('/companies');
    }
}
