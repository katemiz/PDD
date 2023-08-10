<?php

namespace App\Exports;

use App\Models\Requirement;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CMExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $reqs = Requirement::all();

        $dizin = [];

        foreach ($reqs as $req) {

            $epdizin = [];

            foreach ($epdizin as $ep) {
                $epdizin[] = $ep->code;
            }


            $dizin[] = [
                'id' => $req->id,
                'type' => config('requirements.form.rtype.options')[$req->rtype],
                'text' => strip_tags($req->text),
                'endproducts' => implode(',',$epdizin),
                'compliance' => '',
                'Comments' => ''
            ];

        }

        return collect($dizin);
    }
}








// class CMExport implements FromView
// {
//     public function view(): View
//     {
//         $all = Requirement::all();
//         return view('export.compliance-matrix2', [
//             'requirements' => $all
//         ]);
//     }
// }
