<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>{{config('tell.nav.title')}} @if(isset($post)) - {{$post->title}} @endif()</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{config('tell.google_analytics_id')}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', '{{config("tell.google_analytics_id")}}');
    </script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
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
