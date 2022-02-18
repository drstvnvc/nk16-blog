<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body class="antialiased">
    <div>
        @include('partials.navbar')
    </div>

    @if(session()->has('flashMessage'))
    <div class="alert alert-success" id="flash_message">
        {{session('flashMessage')}}
    </div>
    @endif

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-3">
                @include('partials.sidebar')
            </div>
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        function onload() {
            setTimeout(function() {
                let msg = document.getElementById('flash_message');
                if (!msg) {
                    return;
                }

                msg.style.display = 'None';
            }, 2000)
        }
        onload();
    </script>
</body>

</html>