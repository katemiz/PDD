<div>

    <script>
        window.addEventListener('jsConfirmDelete', event => {

            let id = event.detail.id
        
            Swal.fire({
                title: {{ Js::from($params['list']['delete_confirm']['question']) }},
                text: {{ Js::from($params['list']['delete_confirm']['last_warning']) }},
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete',
                cancelButtonText: 'Ooops ...',

            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('delete', id)
                } else {
                    return false
                }
            })
        })    

        window.addEventListener('informUserOnDelete', event => {

            let id = event.detail.id
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Record has been successfully deleted',
                showConfirmButton: false,
                timer: 1500
            })
        }) 
    </script>

    <table class="table is-fullwidth">

        @if ($params['list']['listCaption'])
            <caption>{{ $params['list']['listCaption'] }}</caption>
        @endif

        <thead>
            <tr>
                @foreach ($params['list']['headers'] as $col_name => $headerParams)
                    <th class="has-text-{{ $headerParams['align'] }}">
                        {{ $headerParams['title'] }}

                        @if ($headerParams['sortable'])

                            <button class="{{ $headerParams['direction'] == 'asc' ? 'is-hidden': '' }}" wire:click="changeSortDirection('{{$col_name}}')">
                                <span class="icon">
                                    <x-carbon-chevron-sort-up />
                                </span>
                            </button>

                            <button class="{{ $headerParams['direction'] == 'desc' ? 'is-hidden': '' }}" wire:click="changeSortDirection('{{$col_name}}')">
                                <span class="icon">
                                    <x-carbon-chevron-sort-down />
                                </span>
                            </button>
                            
                        @endif
                    </th>
                @endforeach

                @if ( isset($params['list']['actions']) )
                    <th class="has-text-right"><span class="icon"><x-carbon-user-activity /></span></th>
                @endif

            </tr>
        </thead>

        <tbody>

            @foreach ($records as $record)
            <tr>

                @foreach (array_keys($params['list']['headers']) as $col_name)
                    <td>
                        @if (isset($params['list']['headers'][$col_name]['is_html']) && $params['list']['headers'][$col_name]['is_html'])
                            {!! $record[$col_name] !!}
                        @else
                            {{ $record[$col_name] }} 
                        @endif
                    </td>
                @endforeach


                @if ( isset($params['list']['actions']) )
                <td class="has-text-right">
                    @foreach ($params['list']['actions'] as $act => $route)

                        @switch($act)
                            @case('r')
                                <a href="{{ $route }}{{ $record->id}}">
                                <span class="icon"><x-carbon-view/></span>   
                                </a>                           
                                @break
                            @case('w')

                                @if (isset($params['roles']['w']))
                                    @role($params['roles']['w'])
                                        <a href="{{ $route }}{{ $record->id}}">
                                        <span class="icon"><x-carbon-edit /></span>   
                                        </a>    
                                    @endrole
                                @endif

                                @if (isset($params['perms']['w']))
                                    @can($params['perms']['w'])
                                        <a href="{{ $route }}{{ $record->id}}">
                                        <span class="icon"><x-carbon-edit /></span>   
                                        </a>    
                                    @endcan
                                @endif

                                @break
                            @case('x')

                                @if (isset($params['roles']['w']))
                                @role($params['roles']['w'])
                                    <a wire:click.prevent="deleteConfirm({{$record->id}})">
                                    <span class="icon has-text-danger-dark"><x-carbon-trash-can /></span>   
                                    </a>
                                @endrole
                                @endif

                                @if (isset($params['perms']['w']))
                                @can($params['perms']['w'])
                                    <a wire:click.prevent="deleteConfirm({{$record->id}})">
                                    <span class="icon has-text-danger-dark"><x-carbon-trash-can /></span>   
                                    </a>
                                @endcan
                                @endif
       
                                @break
                        @endswitch
                        
                    @endforeach
                </td>
                @endif

            </tr>
            @endforeach

        </tbody>
    </table>

</div>