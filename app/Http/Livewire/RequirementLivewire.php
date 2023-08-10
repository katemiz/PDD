<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;

use App\Models\EndProduct;
use App\Models\Project;
use App\Models\Requirement;




use Livewire\Component;

class RequirementLivewire extends Component
{

    public $action;
    public $reqId;
    public $requirement;

    public $current_ep_id_arr = [];

    public $projects;
    public $selectedPrj = false;
    public $endproducts = false;


    public function mount() {

        if ( request('id') ) {
            $this->reqId = request('id');
        }

        $this->projects = Project::all()->sortBy("code");

        if ($this->projects->count() == 1 ) {
            $this->selectedPrj = $this->projects["0"];
            $this->endproducts = Project::find($this->selectedPrj->id)->endproducts()->get();
        }
    }


    public function render()
    {
        $this->action = 'create';
        $this->requirement = false;

        if ( isset($this->reqId) && !empty($this->reqId)) {
            $this->requirement = Requirement::find($this->reqId);
            $this->action = 'update';

            foreach ($this->requirement->endproducts as $ep) {
                array_push($this->current_ep_id_arr, $ep->id);
            }
        }

        return view('requirement.form');
    }
}
