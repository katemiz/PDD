<x-layout>
  <script>

    function confirmDelete(id) {

      Swal.fire({
      title: {{ Js::from(config('dgates.list.delete_confirm.question')) }},
      text: {{ Js::from(config('dgates.list.delete_confirm.last_warning')) }},
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Delete',
      cancelButtonText: 'Ooops ...',

      }).then((result) => {
          if (result.isConfirmed) {

              window.location.href = '/dgates/delete/'+id
          } else {
              return false
          }
      })
    }

  </script>

  <section class="section container">
      
    <x-title :params="config('dgates')[$action]" />

    <div class="card">

        <div class="card-content">
          <div class="media">
            <div class="media-left">
              <figure class="image is-48x48">
                <a href="/dgates"><x-carbon-menu /></a>
              </figure>
            </div>
            <div class="media-content">
              <p class="title is-4">
                <span>{{ $dgate->company_name }}</span>
                <span class="has-text-weight-light"> {{ $dgate->code }}</span>
              </p>
              <p class="subtitle is-6">@ {{ $dgate->created_at }}</p>
            </div>
          </div>

          <div class="content">
            <p>{{ $dgate['name'] }}</p>

            @if ($dgate->updated_at != $dgate->created_at)
            <div class="is-size-7 has-text-grey-light">
                Updated @ {{ $dgate->updated_at }}
            </div>
            @endif

          </div>
        </div>

        @can(config('dgates.perms.w'))
        <footer class="card-footer">
            <a href="/dgates/form/{{ $dgate->id}}" class="card-footer-item">
                <span class="icon"><x-carbon-pen/></span>
            </a>

            <a href="javascript:confirmDelete('{{ $dgate->id}}')" class="card-footer-item">
                <span class="icon has-text-danger-dark"><x-carbon-close-outline /></span>
            </a>
        </footer>
        @endcan
    </div>

    <x-date-by :item="$dgate" />

  
  </section>
</x-layout>
    