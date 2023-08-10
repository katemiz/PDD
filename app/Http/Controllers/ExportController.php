<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Requirement;
use App\Models\Verification;
use App\Models\Meeting;
use App\Models\Poc;


use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CMExport;


class ExportController extends Controller
{
    public function allreqs() {

        $all = Requirement::all();

        foreach ($all as $requirement) {
            $allreqs[$requirement->rtype][] = $requirement;
        }

        return view('export.all-reqs', [
            'allreqs' => $allreqs
        ]);
    }


    public function pocsvsreqs() {

        $allvers = Verification::all();

        foreach ($allvers as $verification) {
            $req = Requirement::find($verification->requirement_id);
            $poc = Poc::find($verification->poc_id);

            $pocnames[$poc->code] = $poc->name;

            $matrix[$poc->code][] = ['id' => $req->id,'no' => $req->rtype.'-'.$req->id];
        }

        return view('export.pocs-vs-reqs', [
            'matrix' => $matrix,
            'pocnames' => $pocnames
        ]);
    }


    public function dgatesvspocs() {

        $allvers = Verification::all();
        $pocs = Poc::all();
        $dgates = Meeting::all();

        foreach ($pocs as $poc) {
            $pocsDizin[$poc['id']] = ['code'=>$poc->code,'name'=>$poc->name];
        }

        $matrix = [];

        foreach ($allvers as $verification) {

            if ( !isset($matrix[$verification->meeting_id]) || !in_array($verification->poc_id,$matrix[$verification->meeting_id]) ) {
                $matrix[$verification->meeting_id][] = $verification->poc_id;
            }
        }

        return view('export.dgates-vs-pocs', [
            'matrix' => $matrix,
            'pocs' => $pocsDizin,
            'dgates' => $dgates
        ]);
    }




    public function compliancematrix() {

        $all = Requirement::all();
        return view('export.compliance-matrix', [
            'requirements' => $all
        ]);
    }



    public function excelCMExport()
    {
        return Excel::download(new CMExport, 'CM.xlsx');
    }









}
