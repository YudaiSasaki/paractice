<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - 佐々木練習</title>
    <link rel="shortcut icon" href="{{{ url('images/favicon.ico') }}}" />
    <link rel="stylesheet" href="{{{ url('assets/css/bootstrap.css') }}}">
    <link rel="stylesheet" href="{{{ url('css/datepicker.css') }}}">
    <link rel="stylesheet" href="{{{ url('css/bootstrap-timepicker.min.css') }}}">
    <link rel="stylesheet" href="{{{ url('css/base.css') }}}">
    <link rel="stylesheet" href="{{{ url('css/jquery.mCustomScrollbar.min.css') }}}">
    <link rel="stylesheet" href="{{{ url('css/style.css') }}}">
    <link rel="stylesheet" href="{{ url('css/multi-select.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
@yield('body')
@yield('script')
</body>
</html>
