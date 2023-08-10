<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class ListPermissions extends Component
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
        $permissions = Permission::search('name',$this->search)->orderBy($this->sortField,$this->sortDirection)->paginate(env('RESULTS_PER_PAGE'));

        return view('admin.permissions-list',[
            'records' => $permissions
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

        if (config('permissions.list.headers')[$key]['direction'] == 'asc') {
            config('permissions.list.headers')[$key]['direction'] = 'desc';
        } else {
            config('permissions.list.headers')[$key]['direction'] = 'asc';
        }

        $this->sortDirection = config('permissions.list.headers')[$key]['direction'];
    }
}
