<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>TELL - Blog</title>
    <link rel="stylesheet" href="{{mix('css/tailwind.css','vendor/tell')}}">
</head>

<body>
    <div id="app"></div>

    <script>
        @auth()
        window.Laravel = @json(['authenticated' => true, 'user' => auth()->user()])
        @else
        window.Laravel = @json(['authenticated' => false, 'user' => null])
        @endauth

        window.Laravel.routes = @json([
            'api.tell.images.store' => route("api.tell.images.store")
        ])

    </script>

    <script src="{{asset('vendor/tell/js/ckeditor5/baloon.js')}}"></script>
    <script src="{{mix('js/main.js','vendor/tell')}}"></script>
</body>

</html>
