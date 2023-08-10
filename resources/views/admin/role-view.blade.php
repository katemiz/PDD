<x-layout>
  <script>

    function confirmDelete(id) {

      Swal.fire({
      title: {{ Js::from(config('roles')['list']['delete_confirm']['question']) }},
      text: {{ Js::from(config('roles')['list']['delete_confirm']['last_warning']) }},
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Delete',
      cancelButtonText: 'Ooops ...',

      }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = '/admin/roles/delete/'+id
          } else {
            return false
          }
      })
    }

  </script>

  <section class="section container">
      
    <x-title :params="config('roles')[$action]" />

    <div class="card">

        <div class="card-content">
          <div class="media">
            <div class="media-left">
              <figure class="image is-48x48">
                <a href="/admin/roles"><x-carbon-list /></a>
              </figure>              
            </div>

            <div class="media-content">
              <p class="title is-4">{{ $role['name'] }}</p>
              {{-- <p class="subtitle is-6">@ {{ $company['created_at'] }}</p> --}}
            </div>
          </div>
      
        </div>




        @if ( count($role->permissions) > 0 )
          <h4 class="subtitle has-text-weight-normal m-4">Permissions</h4>

          <table class="table is-fullwidth m-4">

          <tbody>
              <tr>
                  <th>Id</th>
                  <th>Permission Name</th>
              </tr>

              @foreach ($role->permissions as $permission)

                <tr>
                  <td>{{ $permission->id }}</td>
                  <td>{{ $permission->name }}</td>
                </tr>

              @endforeach

          </tbody>
          </table>
        @endif



        <footer class="card-footer">
            <a href="/admin/roles/form/{{ $role->id}}" class="card-footer-item">
                <span class="icon"><x-carbon-edit /></span>
            </a>

            <a href="javascript:confirmDelete('{{ $role->id}}')" class="card-footer-item">
                <span class="icon has-text-danger"><x-carbon-trash-can /></span>
            </a>
        </footer>
    </div>


    <div class="columns m-2">

      <div class="column is-size-7 has-text-grey-light is-half">
        Created by {{ $role['user_id'] }}<br>
        @ {{ $role['created_at'] }}
      </div>

      <div class="column is-size-7 has-text-right has-text-grey-light">
        Updated by {{ $role['updated_uid'] }}<br>
        @ {{ $role['updated_at'] }}

      </div>

    </div>

  
  </section>
</x-layout>
    