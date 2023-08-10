<x-layout>
  <script>

    function confirmDelete(id) {

      Swal.fire({
      title: {{ Js::from(config('users')['list']['delete_confirm']['question']) }},
      text: {{ Js::from(config('users')['list']['delete_confirm']['last_warning']) }},
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Delete',
      cancelButtonText: 'Ooops ...',

      }).then((result) => {
          if (result.isConfirmed) {

              window.location.href = '/admin/users/delete/'+id
          } else {
              return false
          }
      })
    }

  </script>

  <section class="section container">
      
    <x-title :params="config('users')[$action]" />

    <div class="card">

        <div class="card-content">
          <div class="media">
            <div class="media-left">
              <figure class="image is-48x48">
                <a href="/admin/users"><x-carbon-list /></a>
              </figure>              
            </div>

            <div class="media-content">
              <p class="title is-4">{{ $user['name'] }}</p>
              {{-- <p class="subtitle is-6">@ {{ $company['created_at'] }}</p> --}}
            </div>
          </div>
      
          <div class="content">
            <p>{{ $user['lastname'] }}</p>
          </div>

          <table class="table is-fullwidth">

            <tbody>
              <tr>
                <th>User Roles</th>
                <th>User Permissions</th>
              </tr>

              <tr>
                <td>
                  @foreach ($user->roles as $role)
                    <p>{{ $role->name}}</p>
                  @endforeach
                </td>

                <td>
                  @foreach ($user->permissions as $perm)
                    <p>{{ $perm->name}}</p>
                  @endforeach

                </td>
              </tr>
            </tbody>
          </table>




        </div>








        <footer class="card-footer">

            <a href="/admin/users/form/{{ $user->id}}" class="card-footer-item">
                <span class="icon"><x-carbon-edit /></span>
            </a>

            <a href="javascript:confirmDelete('{{ $user->id}}')" class="card-footer-item">
                <span class="icon has-text-danger"><x-carbon-trash-can /></span>
            </a>
        </footer>
    </div>


    <div class="columns m-2">

      <div class="column is-size-7 has-text-grey-light is-half">
        Created by {{ $user['user_id'] }}<br>
        @ {{ $user['created_at'] }}
      </div>

      <div class="column is-size-7 has-text-right has-text-grey-light">
        Updated by {{ $user['updated_uid'] }}<br>
        @ {{ $user['updated_at'] }}

      </div>

    </div>

  
  </section>
</x-layout>
    