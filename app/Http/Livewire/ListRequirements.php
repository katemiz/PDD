<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Project;
use App\Models\Requirement;


class ListRequirements extends Component
{
    use WithPagination;

    protected $listeners = ['delete' => 'deleteReal'];

    public $search = '';
    public $sortField = 'text';
    public $sortDirection = 'asc';
    public $msg = false;





    public function render(Request $request)
    {
        $requirements = Requirement::search('text',$this->search)->orderBy($this->sortField,$this->sortDirection)->paginate(env('RESULTS_PER_PAGE'));

        return view('requirement.list',[
            'records' => $requirements
        ]);
    }


    public function resetFilter ()
    {
        $this->search = '';
    }

    public function deleteConfirm ($id)
    {
        $this->dispatchBrowserEvent('jsConfirmDelete', ['id' => $id]);
    }


    public function deleteReal($id)
    {
        Project::find($id)->delete();
        $this->dispatchBrowserEvent('informUserOnDelete');
    }


    public function changeSortDirection ($key) {

        $this->sortField = $key;

        if (config('requirements.list.headers')[$key]['direction'] == 'asc') {
            config('requirements.list.headers')[$key]['direction'] = 'desc';
        } else {
            config('requirements.list.headers')[$key]['direction'] = 'asc';
        }

        $this->sortDirection = config('requirements.list.headers')[$key]['direction'];
    }
}
