<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="{{asset('assets/images/favicon.png')}}" rel="icon" type="image/png">

    <!-- Basic Page Needs
        ================================================== -->
    <title>Socialite Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="{{asset('assets/css/icons.css')}}">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('assets/css/uikit.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


</head>

<div class="sidebar">

    <div class="sidebar_inner" data-simplebar>

        <ul>
            <li class="{{ Request::path() === 'feed' ? 'active' : '' }}">
                <a href="/feed" >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-600">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <span> Feed </span> </a>
            </li>


            <li class="{{ Request::path() === 'events' ? 'active' : '' }}" ><a href="/events">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-yellow-500">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg><span>  Events </span></a>
            </li>

            <li class="{{ Request::path() === 'photos' ? 'active' : '' }}" ><a href="/photos">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-purple-500">
                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                    </svg>  <span>  Photos </span></a>
            </li>
            <li class="{{ Request::path() === 'blogs' ? 'active' : '' }}" ><a href="/blogs">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
                        <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd" />
                        <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                    </svg>
                    <span> Blog</span></a>
            </li>


        <h3 class="side-title"> People you may know </h3>

        <div class="contact-list my-2 ml-1">

            <x-people-you-may-know></x-people-you-may-know>
        </div>

        </ul>

    </div>

    <!-- sidebar overly for mobile -->
    <div class="side_overly" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></div>

</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../../../../assets/js/tippy.all.min.js"></script>
<script src="../../../../assets/js/uikit.js"></script>
<script src="{{asset('assets/js/simplebar.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap-select.min.js')}}"></script>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
