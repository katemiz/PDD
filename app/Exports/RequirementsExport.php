<?php

namespace App\Exports;

use App\Models\Requirement;
use Maatwebsite\Excel\Concerns\FromCollection;

class RequirementsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Requirement::all();
    }
}
