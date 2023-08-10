<x-layout>
  <script>

    function confirmDelete(id) {

      Swal.fire({
      title: {{ Js::from(config('companies')['list']['delete_confirm']['question']) }},
      text: {{ Js::from(config('companies')['list']['delete_confirm']['last_warning']) }},
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Delete',
      cancelButtonText: 'Ooops ...',

      }).then((result) => {
          if (result.isConfirmed) {

              window.location.href = '/companies/delete/'+id
          } else {
              return false
          }
      })
    }

  </script>

  <section class="section container">
      
    <x-title :params="config('companies')[$action]" />

    <div class="card">

        <div class="card-content">
          <div class="media">
            <div class="media-left">
              <figure class="image is-48x48">
                <a href="/companies"><x-carbon-list /></a>
              </figure>              
            </div>

            <div class="media-content">
              <p class="title is-4">{{ $company['name'] }}</p>
              {{-- <p class="subtitle is-6">@ {{ $company['created_at'] }}</p> --}}
            </div>
          </div>
      
          <div class="content">
            <p>{{ $company['fullname'] }}</p>
          </div>
        </div>








        <footer class="card-footer">
            <a href="/companies/form/{{ $company->id}}" class="card-footer-item">
                <span class="icon"><x-carbon-edit /></span>
            </a>

            <a href="javascript:confirmDelete('{{ $company->id}}')" class="card-footer-item">
                <span class="icon has-text-danger"><x-carbon-trash-can /></span>
            </a>
        </footer>
    </div>


    <div class="columns m-2">

      <div class="column is-size-7 has-text-grey-light is-half">

        Created by {{ $company['user_id'] }}<br>
        @ {{ $company['created_at'] }}


      </div>

      <div class="column is-size-7 has-text-right has-text-grey-light">

        Updated by {{ $company['updated_uid'] }}<br>
        @ {{ $company['updated_at'] }}

      </div>

    </div>

  
  </section>
</x-layout>
    