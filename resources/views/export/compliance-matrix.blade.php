<x-layout>
<section class="section container">

    <script src="{{ asset('js/table2excel.js') }}"></script>

    <header class="my-6">
        <h1 class="title has-text-weight-light is-size-1">Compliance Matrix</h1>
        <h2 class="subtitle has-text-weight-light">Requirements vs Compliance Status</h2>
    </header>

    <div class="column has-text-right">

        <a href="javascript:tableToExcel()">

            <span class="icon-text">
    
                <span class="icon">
                    <x-carbon-document-export />
                </span>
                <span>Excel Export</span>
            </span>
        </a>

    </div>

    <table class="table is-fullwidth" id="CMMAtrix">

        <caption>Compliances Matrix</caption>

        <thead>
            <tr>
                <th>Id</th>
                <th>Requirement Type</th>
                <th>Requirement Definition</th>
                <th>End Products (If any)</th>
                <th>Compliance</th>
                <th>Contractor Comments</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($requirements as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ config('requirements.form.rtype.options')[$item->rtype] }}</td>
                <td>{!! $item->text !!}</td>
                <td>
                    @foreach ($item->endproducts as $ep)
                    <span class="tag is-info">{{ $ep->code }}</span><br>
                    @endforeach
                </td>
                <td>
                    <label class="checkbox is-size-7">
                    <input type="checkbox"> Comply
                    </label>
                    <label class="checkbox is-size-7">
                        <input type="checkbox"> Partially Comply
                        </label>
                        <label class="checkbox is-size-7">
                            <input type="checkbox"> Not Comply
                        </label>
                </td>
                <td>&nbsp;</td>
            </tr>
            @endforeach

        </tbody>
    </table>



    <script>
        var table2excel = new Table2Excel();

        function tableToExcel() {
            table2excel.export(document.querySelectorAll('table'));
        }
    </script>



</section>
</x-layout>
