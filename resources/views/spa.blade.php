<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>{{config('tell.nav.title')}}</title>
    <link rel="stylesheet" href="{{mix('css/tailwind.css','vendor/tell')}}">
    <x-tell-meta-tags :post="$post ?? null"></x-tell-meta-tags>
</head>

<body>
    <div id="app"></div>
    <script> window.Laravel = @json($javascriptVars) </script>
    <script src="{{asset('vendor/tell/js/ckeditor5/classic.js')}}"></script>
    <script src="{{mix('js/main.js','vendor/tell')}}"></script>
</body>

</html>
