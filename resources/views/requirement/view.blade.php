<x-layout>
  <script>

    function deleteConfirm (rid,id) {

      rid = parseInt(rid)
      id = parseInt(id)

      let title,text,redirect

      // Requirement delete
      if (rid && id < 1) {

        title = {{ Js::from(config('requirements.list.delete_confirm.question')) }}
        text = {{ Js::from(config('requirements.list.delete_confirm.last_warning')) }},

        redirect = '/requirements/delete/'+rid

        console.log("reg")

      }

      // Verification delete
      if (rid && id > 0) {

        title = {{ Js::from(config('verifications.list.delete_confirm.question')) }}
        text = {{ Js::from(config('verifications.list.delete_confirm.last_warning')) }},

        redirect = '/verifications/delete/'+rid+'/'+id

        console.log("ver")

      }

      confirmDialog(title,text,redirect)
    }

    function confirmDialog(title,text,redirect) {

      Swal.fire({
      title: title,
      text: text,
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Delete',
      cancelButtonText: 'Ooops ...',

      }).then((result) => {
          if (result.isConfirmed) {

              window.location.href = redirect
          } else {
              return false
          }
      })
    }

  </script>

  <section class="section container">

    <x-title :params="config('requirements')[$action]" />

    <div class="box">

      <div class="column">
        <div class="columns is-vcentered">

          <div class="column is-8">
            <p class="title has-text-weight-light is-size-2">{{ $requirement->rtype }}-{{ $requirement->id }}</p>
            <p class="subtitle has-text-weight-light is-size-6">Source Requirement No  {{ $requirement['cross_ref_no'] }}</p>
          </div>

          <div class="column has-text-right is-4">
            <a href="/requirements"><span class="icon has-text-link"><x-carbon-list /></span></a>

            @role(config('requirements.roles.w'))
            <a href="/requirements/form/{{ $requirement->id}}"><span class="icon has-text-link"><x-carbon-edit /></span></a>
            <a href="javascript:deleteConfirm('{{ $requirement->id}}',0)">
              <span class="icon has-text-danger"><x-carbon-trash-can /></span>
            </a>
            @endrole
          </div>

        </div>
      </div>

      <div class="column">
        <div class="columns is-vcentered">

          <div class="column is-half">
            <p class="has-text-weight-light is-size-6">Project</p>
            <span class="tag is-black">PVR</span>
          </div>

          <div class="column is-half has-text-right">
            <p class="has-text-weight-light is-size-6">End Products</p>

            @foreach ($requirement->endproducts as $ep)
            <span class="tag is-success">{{ $ep->code}}</span>
            @endforeach

          </div>

        </div>
      </div>

      {{-- DESCRIPTION --}}
      <div class="column">
        <p>{!! $requirement['text'] !!}</p>

        @if ( !empty($requirement['remarks']) )
          <strong class="mt-3 block">Notes and Remarks</strong>
          <div class="notification">
            <p>{!! $requirement['remarks'] !!}</p>
          </div>
        @endif
      </div>

      {{-- ATTACHMENTS --}}
      <x-attach :item="$requirement" model="requirement" redirect="/requirements/view/{{$requirement->id}}"/>

      {{-- VERIFICATIONS --}}
      <div class="column">
        <div class="columns is-vcentered">
      
          <div class="column is-10">
            <strong>Verifications</strong>
          </div>

          <div class="column has-text-right is-2">
            @role(config('requirements.roles.w'))
            <a href="/requirements/verform/{{$requirement->id}}"><span class="icon has-text-link"><x-carbon-add-alt /></span></a>
            @endrole
          </div>
      
        </div>
      </div>

      <div class="column">
        @if ( count($requirement->verifications) > 0 )

          <table class="table is-fullwidth">

          <tbody>
              <tr>
                  <th>Decision Gate</th>
                  <th>MOC/Verification Method</th>
                  <th>Proof of Compliance</th>
                  <th>Witness</th>
                  @role(config('requirements.roles.w'))
                  <th>Actions</th>
                  @endrole
              </tr>

              @foreach ($requirement->verifications as $verification)

                <tr>
                  <td>{{ $verification->dgate->code }}</td>
                  <td>{{ $verification->moc->code }}</td>
                  <td>{{ $verification->poc->code }}</td>
                  <td>{{ $verification->witness->code }}</td>
                  @role(config('requirements.roles.w'))
                  <td>
                    <a href="/requirements/verform/{{ $requirement->id}}/{{ $verification->id}}">
                      <span class="icon has-text-link"><x-carbon-pen /></span>
                    </a>
                    <a href="javascript:deleteConfirm('{{$requirement->id}}','{{$verification->id}}')">
                      <span class="icon has-text-danger"><x-carbon-trash-can /></span>
                    </a>
                  </td>
                  @endrole
                </tr>

              @endforeach

          </tbody>
          </table>

        @else
          No verifications exist
        @endif
      </div>

    </div>

    <x-date-by :item="$requirement" />

  </section>
</x-layout>
