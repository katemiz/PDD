<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;


use App\Models\Project;
use App\Models\Endproduct;

class ListEndproducts extends Component
{
    use WithPagination;

    protected $listeners = ['delete' => 'deleteReal'];

    public $search = '';
    public $sortField = 'title';
    public $sortDirection = 'asc';
    public $msg = false;

    public function render(Request $request)
    {
        $projects = Endproduct::search('text',$this->search)->orderBy($this->sortField,$this->sortDirection)->paginate(env('RESULTS_PER_PAGE'));

        return view('endproduct.list-end-products',[
            'records' => $projects
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
        Endproduct::find($id)->delete();
        $this->dispatchBrowserEvent('informUserOnDelete');
    }


    public function changeSortDirection ($key) {

        $this->sortField = $key;

        if (config('endproducts.list.headers')[$key]['direction'] == 'asc') {
            config('endproducts.list.headers')[$key]['direction'] = 'desc';
        } else {
            config('endproducts.list.headers')[$key]['direction'] = 'asc';
        }

        $this->sortDirection = config('endproducts.list.headers')[$key]['direction'];
    }
}
