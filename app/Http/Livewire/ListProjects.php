<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Project;

class ListProjects extends Component
{
    use WithPagination;

    protected $listeners = ['delete' => 'deleteReal'];

    public $search = '';
    public $sortField = 'title';
    public $sortDirection = 'asc';
    public $msg = false;


    public function render(Request $request)
    {
        $projects = Project::search('title',$this->search)->orderBy($this->sortField,$this->sortDirection)->paginate(env('RESULTS_PER_PAGE'));

        return view('projects.list-projects',[
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
        Project::find($id)->delete();
        $this->dispatchBrowserEvent('informUserOnDelete');
    }


    public function changeSortDirection ($key) {

        $this->sortField = $key;

        if (config('projects.list.headers')[$key]['direction'] == 'asc') {
            config('projects.list.headers')[$key]['direction'] = 'desc';
        } else {
            config('projects.list.headers')[$key]['direction'] = 'asc';
        }

        $this->sortDirection = config('projects.list.headers')[$key]['direction'];
    }
}
