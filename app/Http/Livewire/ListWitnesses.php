<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Witness;


class ListWitnesses extends Component
{
    use WithPagination;

    protected $listeners = ['delete' => 'deleteReal'];

    public $search = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $msg = false;


    public function render(Request $request)
    {
        $witnesses = Witness::search('name',$this->search)->orderBy($this->sortField,$this->sortDirection)->paginate(env('RESULTS_PER_PAGE'));

        return view('witness.list-witnesses',[
            'records' => $witnesses
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

        if (config('witnesses.list.headers')[$key]['direction'] == 'asc') {
            config('witnesses.list.headers')[$key]['direction'] = 'desc';
        } else {
            config('witnesses.list.headers')[$key]['direction'] = 'asc';
        }

        $this->sortDirection = config('witnesses.list.headers')[$key]['direction'];
    }
}
