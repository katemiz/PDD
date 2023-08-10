<x-layout>
  <script>

    function confirmDelete(id) {

      Swal.fire({
      title: {{ Js::from(config('endproducts.list.delete_confirm.question')) }},
      text: {{ Js::from(config('endproducts.list.delete_confirm.last_warning')) }},
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Delete',
      cancelButtonText: 'Ooops ...',

      }).then((result) => {
          if (result.isConfirmed) {

              window.location.href = '/endproducts/delete/'+id
          } else {
              return false
          }
      })
    }

  </script>

  <section class="section container">
      
    <div class="columns">
      <div class="column"><x-title :params="config('endproducts')[$action]" /></div>
      <div class="column is-one"><x-info :info="config('definitions.endproduct')" /></div>
    </div>

    <div class="card">

        <div class="card-content">
          <div class="media">
            <div class="media-left">
              <figure class="image is-48x48">
                <a href="/endproducts"><x-carbon-menu /></a>
              </figure>
            </div>
            <div class="media-content">
              <p class="title is-4">
                <span>{{ $endproduct->project_code }}</span>
                <span class="has-text-weight-light"> {{ $endproduct->code }}</span>
              </p>
              <p class="subtitle is-6">@ {{ $endproduct->created_at }}</p>
            </div>
          </div>
        </div>

            
        @can(config('endproducts.perms.w'))
        <footer class="card-footer">
            <a href="/endproducts/form/{{ $endproduct->id}}" class="card-footer-item">
                <span class="icon"><x-carbon-pen/></span>
            </a>

            <a href="javascript:confirmDelete('{{ $endproduct->id}}')" class="card-footer-item">
                <span class="icon has-text-danger-dark"><x-carbon-close-outline /></span>
            </a>
        </footer>
        @endcan

    </div>

    <x-date-by :item="$endproduct" />

  
  </section>
</x-layout>
    