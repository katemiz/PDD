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

        @foreach ($allreqs as $type => $type_reqs)
            
            <header class="my-6">
                <h1 class="title has-text-weight-light is-size-1">{{ $type=='GR' ? 'General':'Technical' }} Requirements</h1>
                <h2 class="subtitle has-text-weight-light">Total number of requirements {{ count($type_reqs)}}</h2>
            </header>

            @foreach ($type_reqs as $greq)

                <div class="card mb-3 has-background-white-ter">

                    <div class="card-content">
                    <div class="media">

                        <div class="media-content">
                        <p class="title is-4">
                            <span>{{$greq->rtype}}-{{$greq->id}}</span>
                        </p>
                        </div>
            
                        <div class="media-content">
                        <h4 class="subtitle has-text-weight-normal my-0">Applicable End Products</h4>
                        </div>    
                    </div>
            
                        <div class="content">
                            {!! $greq->text !!}

                            <table class="table is-fullwidth">
                            <caption>Requirement Verification Table</caption>

                            <tbody>
                            <tr>
                            <th>Decision Gate</th>
                            <th>MOC/Verification Method</th>
                            <th>Proof of Compliance</th>
                            <th>Witness</th>
                            </tr>

                            @foreach ($greq->verifications as $verification)
                            <tr>
                            <td>{{ $verification->decision_gate}}</td>
                            <td>{{ $verification->moc_name}}</td>
                            <td>{{ $verification->poc_name}}</td>
                            <td>{{ $verification->witness_name}}</td>
                            </tr>
                            @endforeach

                            </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                
            @endforeach

        @endforeach

    
    </section>
</body>
</html>
