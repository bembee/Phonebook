<!DOCTYPE html>
<html lang="HU">

<head>
    @include('includes.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
</head>
<style>
    .table,
    .update-form {
        margin-top: 50px;
    }

    .small-pic {
        width: 150px;
    }

    .form-group.required .control-label:after {
        content: "*";
        color: red;

    }

    .alert-info {
        padding: 10px;
        margin: 10px;
    }
</style>

<body>
    <main>
        @include('includes.nav')
        @yield('content')
        @include('includes.footer')
    </main>
</body>

</html>