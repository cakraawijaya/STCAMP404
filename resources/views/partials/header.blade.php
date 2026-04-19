<!-- Header -->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel = "icon" href ="{{ url('asset/img/icon/book-half.svg') }}">
    <title>{{ config('app.name', 'STCAMP404') }}</title>
    <link href="{{ url('style/template.css') }}" rel="stylesheet">
    <link href="{{ url('style/highchart.css') }}" rel="stylesheet">
    <link href="{{ url('bootstrap-5.2.0/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('bootstrap-5.2.0/icons/bootstrap-icons.css') }}" rel="stylesheet">
</head>

<body class="cursive">

<!-- Header Akhir -->