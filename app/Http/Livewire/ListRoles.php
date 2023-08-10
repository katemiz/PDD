<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class ListRoles extends Component
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
        $roles = Role::search('name',$this->search)->orderBy($this->sortField,$this->sortDirection)->paginate(env('RESULTS_PER_PAGE'));

        return view('admin.roles-list',[
            'records' => $roles
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

        if (config('roles.list.headers')[$key]['direction'] == 'asc') {
            config('roles.list.headers')[$key]['direction'] = 'desc';
        } else {
            config('roles.list.headers')[$key]['direction'] = 'asc';
        }

        $this->sortDirection = config('roles.list.headers')[$key]['direction'];
    }
}
