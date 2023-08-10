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
            <h1 class="title has-text-weight-light is-size-1">Decision Gates vs Proof of Compliances (POCS)</h1>
            <h2 class="subtitle has-text-weight-light">Proof of Compliances / Deliverables in Decision Gates</h2>
        </header>

        <table class="table is-fullwidth">

            <thead>
                <tr>
                    <th class="is-3 has-background-grey-lighter">Decision Gates</th>
                    <th class="has-background-grey-lighter">Deliverables/POCs in Decision Gates</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($dgates as $dgate)
                <tr>
                    <td class="has-background-white-ter">
                        <strong>{{ $dgate->code }}</strong><br>
                        {{ $dgate->name }}
                    </td>
                    <td>
                        @if (isset($matrix[$dgate->id]))

                            <h2 class="subtitle has-text-info is-size-6">{{ count($matrix[$dgate->id]) }} POCS for this Decison Gate </h2>
                            @foreach ($matrix[$dgate->id] as $idPoc)
                                <p>
                                <strong>{{ $pocs[$idPoc]['code'] }}</strong> - {{ $pocs[$idPoc]['name'] }}
                                </p>
                            @endforeach

                        @else
                        -
                        @endif

                    </td>
                </tr>
                @endforeach
            <tbody>

        </table>

    </section>
</body>
</html>
