<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\User;

class ListUsers extends Component
{
    use WithPagination;

    public $params;

    protected $listeners = ['delete' => 'deleteReal'];

    public $search = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $msg = false;


    public function render(Request $request)
    {
        $users = User::search('lastname',$this->search)->orderBy($this->sortField,$this->sortDirection)->paginate(env('RESULTS_PER_PAGE'));

        return view('admin.users-list',[
            'records' => $users,
            'params' => $this->params
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
        Company::find($id)->delete();
        $this->dispatchBrowserEvent('informUserOnDelete');
    }


    public function changeSortDirection ($key) {

        $this->sortField = $key;

        if (config('users.list.headers')[$key]['direction'] == 'asc') {
            config('users.list.headers')[$key]['direction'] = 'desc';
        } else {
            config('users.list.headers')[$key]['direction'] = 'asc';
        }

        $this->sortDirection = config('users.list.headers')[$key]['direction'];
    }
}
