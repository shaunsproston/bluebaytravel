<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Data</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .table {
                width:100%;
            }
            th, td {
                padding: 5px;
                border: solid black 1px;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 40px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div id="app" class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <h2>All Appointments</h2>
                </div>
                <div>
                <first-component :clientName="{{ $appointments->toJson() }}"></first-component>
                    {{--
                    :blah="{{ $appointments->toJson() }}"
                    <table class="table">
                        <tr>
                            <th>Client Name</th>
                            <th>Type</th>
                            <th>Duration</th>
                            <th>Appointment Start Time</th>
                        </tr>
                        @foreach($appointments as $appointment)
                        <tr>
                            <td> {{ $appointment->client->name }} </td>
                            <td> {{ $appointment->treatment->type }} </td>
                            <td> {{ $appointment->treatment->duration }} </td>
                            <td> {{ $appointment->treatment_start_time }} </td>
                        </tr>
                        @endforeach
                    </table>
                    --}}
                </div>
            </div>
        </div>
    <script src="{{ asset('js/app.js')}}"></script>
    </body>
</html>