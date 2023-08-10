<x-layout>
<section class="section container">

    <x-title :params="config('roles')[$action]" />

    <form action="{{ config('roles.cu_route') }}{{ $role ? $role->id : '' }}" method="POST" enctype="multipart/form-data">
    @csrf

        <x-form-input :params="config('roles.form.name')" value="{{ $role ? $role->name : '' }}"/>
        {{-- <x-form-input :params="config('roles.form.fullname')" value="{{ $role ? $role->fullname : '' }}"/> --}}








            <div class="field">
                <label class="label">Role Permissions</label>
            
                <div class="control">
            
                    @if ( count($permissions) > 0)
                        
                        @foreach ($permissions as $permission)
            
                            <label class="checkbox is-block">
                                <input type="checkbox" name="perm{{$permission->id}}" value="{{$permission->id}}" 
                                @checked(in_array($permission->id,$available_perms))> {{ $permission->name }}
                            </label>
            
                        @endforeach
            
                    @else  
                        <p>{{ config('permissions.list.noitem') }}</p>
                    @endif
            
                </div>
            </div>

        <div class="buttons is-right">
            <button class="button is-dark">{{ config('roles')[$action]['submitText'] }}</button>
        </div>

    </form>

</section>
</x-layout>
