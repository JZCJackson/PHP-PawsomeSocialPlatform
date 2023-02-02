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


<header>
    <div class="header_wrap">
        <div class="header_inner mcontainer">
            <div class="left_side">

                        <span class="slide_menu" uk-toggle="target: #wrapper ; cls: is-collapse is-active">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path
                                    d="M3 4h18v2H3V4zm0 7h12v2H3v-2zm0 7h18v2H3v-2z" fill="currentColor"></path></svg>
                        </span>

                <div id="logo">
                    <a href="feed">
                        <img src="{{asset('assets/images/logo.png')}}" alt="">
                        <img src="{{ asset('assets/images/logo-mobile.png')}}" class="logo_mobile" alt="">
                    </a>
                </div>
            </div>

            <!-- search icon for mobile -->
            <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"></div>
            {{--            <div class="header_search"><i class="uil-search-alt"></i>--}}
            {{--                <div class="form-group">--}}
            {{--                    <div class="row">--}}
            {{--                        <div class="col-lg-1"></div>--}}
            {{--                        <div class="col-lg-6">--}}
            {{--                       <input value="" type="text" name="search" id="search" class="form-control" placeholder="Search for Friends , Videos and more.." autocomplete="off">--}}
            {{--                            <div uk-drop="mode: click" class="header_search_dropdown">--}}

            {{--                                <div id="search_list"></div>--}}

            {{--                                <ul>--}}
            {{--                                    <li>--}}
            {{--                                        <a href="#">--}}
            {{--                                            <img src="assets/images/avatars/avatar-1.jpg" alt="" class="list-avatar">--}}
            {{--                                            <div class="list-name">  Erica Jones </div>--}}
            {{--                                        </a>--}}
            {{--                                    </li>--}}
            {{--                                    <li>--}}
            {{--                                        <a href="#">--}}
            {{--                                            <img src="assets/images/avatars/avatar-2.jpg" alt="" class="list-avatar">--}}
            {{--                                            <div class="list-name">  Coffee  Addicts </div>--}}
            {{--                                        </a>--}}
            {{--                                    </li>--}}
            {{--                                    <li>--}}
            {{--                                        <a href="#">--}}
            {{--                                            <img src="assets/images/avatars/avatar-3.jpg" alt="" class="list-avatar">--}}
            {{--                                            <div class="list-name"> Mountain Riders </div>--}}
            {{--                                        </a>--}}
            {{--                                    </li>--}}
            {{--                                    <li>--}}
            {{--                                        <a href="#">--}}
            {{--                                            <img src="assets/images/avatars/avatar-4.jpg" alt="" class="list-avatar">--}}
            {{--                                            <div class="list-name"> Property Rent And Sale  </div>--}}
            {{--                                        </a>--}}
            {{--                                    </li>--}}
            {{--                                    <li>--}}
            {{--                                        <a href="#">--}}
            {{--                                            <img src="assets/images/avatars/avatar-5.jpg" alt="" class="list-avatar">--}}
            {{--                                            <div class="list-name">  Erica Jones </div>--}}
            {{--                                        </a>--}}
            {{--                                    </li>--}}
            {{--                                </ul>--}}
            {{--                        <div class="col-lg-1"></div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}

            {{--                    </div>--}}


            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
                    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
                    crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
                    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
                    crossorigin="anonymous"></script>

            <script>
                $(document).ready(function () {
                    $('#search-input').on('keyup', function () {
                        var query = $(this).val();
                        $.ajax({
                            url: "search",
                            type: "GET",
                            data: {'search': query},
                            success: function (data) {
                                console.log(data);
                                let output = '';
                                data?.map((item) => {
                                    output += `<li>
                                        <a href="/account/${item.id}">
                                            <img src="/storage/profile/${item.picture}" alt="" class="list-avatar">
                                            <div class="list-name">  ${item.name}</div>
                                        </a>
                                    </li>
                                          `
                                })

                                $('#search-results').html(output);
                            }
                        });
                    });
                });
            </script>
            {{--            </div>--}}
            {{--            </div>--}}

            <div class="header_search"><i class="uil-search-alt"></i>
                <input value="" type="text" id="search-input" class="form-control"
                       placeholder="Search for Friends , Videos and more.." autocomplete="off">
                <div uk-drop="mode: click" class="header_search_dropdown">

                    <h4 class="search_title"> Recently </h4>
                    <ul id="search-results">
                        <li>
                            <a href="#">
                                <img src="assets/images/avatars/avatar-1.jpg" alt="" class="list-avatar">
                                <div class="list-name"> Surbhi Dixit</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="assets/images/avatars/avatar-2.jpg" alt="" class="list-avatar">
                                <div class="list-name"> Jaspreet </div>
                            </a>
                        </li>

                    </ul>

                </div>
            </div>

            <div class="right_side">

                <div class="header_widgets">

                    <a href="#">
                        <img src="/storage/profile/{{$user->picture}}" class="is_avatar" alt="">
                    </a>
                    <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">

                        <a href="/account" class="user">
                            <div class="user_avatar">
                                <img src="/storage/profile/{{$user->picture}}" alt="">
                            </div>
                            <div class="user_name">
                                <div> {{$user->name}} </div>
                                <span> {{'@'.$user->name}}</span>
                            </div>
                        </a>
                        <hr>

                        <a href="/profile">
                            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            My Account
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>


                    </div>

                </div>

            </div>
        </div>
    </div>
</header>

