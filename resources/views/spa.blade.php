<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>{{config('tell.nav.title')}}</title>
    <link rel="stylesheet" href="{{mix('css/tailwind.css','vendor/tell')}}">
    <meta data-vue-meta="1" name="twitter:card" content="summary">
    <meta data-vue-meta="1" name="twitter:title" content="{{config('tell.nav.title')}}">
    <meta data-vue-meta="1" name="twitter:description" content="{{config('tell.nav.title')}}">
    <meta data-vue-meta="1" name="twitter:image" content="{{config('tell.nav.title')}}">
    <meta data-vue-meta="1" property="og:url" content="{{request()->root()}}">
    <meta data-vue-meta="1" property="og:type" content="article">
    <meta data-vue-meta="1" property="og:title" content="{{config('tell.nav.title')}}">
    <meta data-vue-meta="1" property="og:description" content="{{config('tell.nav.title')}}">
    <meta data-vue-meta="1" property="og:image" content="{{request()->root()}}">
</head>

<body>
    <div id="app"></div>
    <script> window.Laravel = @json($javascriptVars) </script>
    <script src="{{asset('vendor/tell/js/ckeditor5/classic.js')}}"></script>
    <script src="{{mix('js/main.js','vendor/tell')}}"></script>
</body>

</html>
