<x-layout>
  <script>

    function confirmDelete(id) {

      Swal.fire({
      title: {{ Js::from(config('permissions')['list']['delete_confirm']['question']) }},
      text: {{ Js::from(config('permissions')['list']['delete_confirm']['last_warning']) }},
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Delete',
      cancelButtonText: 'Ooops ...',

      }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = '/admin/permissions/delete/'+id
          } else {
            return false
          }
      })
    }

  </script>

  <section class="section container">
      
    <x-title :params="config('permissions')[$action]" />

    <div class="card">

        <div class="card-content">
          <div class="media">
            <div class="media-left">
              <figure class="image is-48x48">
                <a href="/admin/permissions"><x-carbon-list /></a>
              </figure>              
            </div>

            <div class="media-content">
              <p class="title is-4">{{ $permission['name'] }}</p>
              {{-- <p class="subtitle is-6">@ {{ $company['created_at'] }}</p> --}}
            </div>
          </div>
      
        </div>


        <footer class="card-footer">
            <a href="/admin/permissions/form/{{ $permission->id}}" class="card-footer-item">
                <span class="icon"><x-carbon-edit /></span>
            </a>

            <a href="javascript:confirmDelete('{{ $permission->id}}')" class="card-footer-item">
                <span class="icon has-text-danger"><x-carbon-trash-can /></span>
            </a>
        </footer>
    </div>


    <x-date-by :item="$project" />

  
  </section>
</x-layout>
    