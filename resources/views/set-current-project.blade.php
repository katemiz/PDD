<x-layout>
  


    <section class="section container">

        <x-title :params="$params" />

    
        @if ($projects->count() > 0)

        <table class="table is-fullwidth">

            <tr>
                <th>Code</th>
                <th>Project Title</th>
                <th>&nbsp;</th>
            </tr>

            @foreach ($projects as $project)

            <tr>
                <td>{{ $project->code }}</td>
                <td>{{ $project->title }}</td>
                <td><a href="/setcurrentproject/{{ $project->id }}">Set as Current Project</a></td>
            </tr>
                
            @endforeach

        </table>
    
    
        @else
            <x-notification type="is-warning is-light" message="No projects found" />
        @endif
    
    </section>
    




</x-layout>
      