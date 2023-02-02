<html>
<head>
    <title>Paw'some - @yield('title')</title>
    <link href=" {{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>


<div class="container">
    <x-top-bar></x-top-bar>
    @yield('content')
    @yield('chat-box')
</div>
</body>
</html>
