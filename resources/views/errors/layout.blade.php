<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <title>Error {{ $error_number }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />

    <link rel="shortcut icon" type="image/ico" href="/images/icons/favicon.ico"/>

    <style>
        #main {
            height: 100vh;
        }
    </style>
</head>
<body>
<div class="mainbox">
    <div class="d-flex justify-content-center align-items-center" id="main">
        <h1 class="mr-3 pr-3 align-top border-right inline-block align-content-center">{{ $error_number }}</h1>
        <div class="inline-block align-middle">
            <h2 class="font-weight-normal lead" id="desc">
                {!! isset($exception)? ($exception->getMessage()?$exception->getMessage():$default_error_message): $default_error_message !!}
            </h2>
        </div>
    </div>
</div>
</body>
</html>
