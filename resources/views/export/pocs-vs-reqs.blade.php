<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Engineering Toolkit</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/sweetalert2_min.css') }}">
    <script src="{{ asset('/js/sweetalert2.min.js') }}"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

</head>
<body>

    <section class="section container">

        <header class="my-6">
            <h1 class="title has-text-weight-light is-size-1">Proof of Compliances vs Requirements</h1>
            <h2 class="subtitle has-text-weight-light">Evidence / Proof of Compliances / Deliverables vs Requirement</h2>
        </header>

        <table class="table is-fullwidth">

            <thead>
                <tr>
                    <th class="is-3 has-background-grey-lighter">Evidence Code<br>Proof of Compliance</th>
                    <th class="has-background-grey-lighter">Linked Requirements</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($matrix as $poc => $reqlist)
                <tr>
                    <td class="has-background-white-ter">
                        <strong>{{ $poc }}</strong><br>
                        {{ $pocnames[$poc] }}
                    </td>
                    <td>
                        <table class="table is-fullwidth">
                            <caption>{{ count($reqlist)}} Requirement{{count($reqlist) > 1 ? 's':''}} Linked to This POC </caption>

                            @php
                                $count = 0;
                            @endphp

                            @foreach ($reqlist as $rrr)

                                @if ($count % 8 === 0 )
                                <tr>
                                @endif

                                <td><a href="/requirements/view/{{$rrr['id']}}">{{ $rrr['no'] }}</a></td>

                                @php
                                $count++;
                                @endphp

                                @if ($count % 8 === 0 )
                                </tr>
                                @endif
                            @endforeach

                        </table>
                    </td>
                </tr>
                @endforeach
            <tbody>

        </table>

    </section>
</body>
</html>
