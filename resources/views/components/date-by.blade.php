<div class="columns m-2">

    @if ($item->updated_at != $item->created_at)
        <div class="column is-size-7 has-text-grey-light is-half">
            Created by {{ $item->created_by_name }}<br>
            @ {{ $item->created_at }}
        </div>
  
        <div class="column is-size-7 has-text-right has-text-grey-light">
            Updated by {{ $item->updated_by_name }}<br>
            @ {{ $item->updated_at }}
        </div>
    @else
        
        <div class="column is-size-7 has-text-grey-light">
            Created by {{ $item->created_by_name }}<br>
            @ {{ $item->created_at }}
        </div>
    @endif

</div>