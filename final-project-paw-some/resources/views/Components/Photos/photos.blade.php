@extends('Layouts.master')

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="{{asset('assets/images/favicon.png')}}" rel="icon" type="image/png">

    <!-- Basic Page Needs
        ================================================== -->
    <title>Paw'some</title>
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
<body>


<div id="wrapper">


    <x-side-bar></x-side-bar>


    <!-- Main Contents -->
    <div class="main_content">
        <div class="mcontainer">


            <div class="flex justify-between items-center relative md:mb-4 mb-3">
                <div class="flex-1">
                    <h2 class="text-2xl font-semibold"> Photos </h2>
                    <nav class="responsive-nav border-b md:m-0 -mx-4">
                        <ul>
                            <li class="active"><a href="#" class="lg:px-2">  Recent </a></li>

                        </ul>
                    </nav>
                </div>
                <a href="#offcanvas-create" uk-toggle class="flex items-center justify-center z-10 h-10 w-10 rounded-full bg-blue-600 text-white absolute right-0"
                   data-tippy-placement="left" title="Create New Album">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                </a>
            </div>

            <div class="grid md:grid-cols-4 grid-cols-2 gap-3 mt-5">
                @foreach(File::glob(public_path('assets/images/photos').'/*') as $path)

                    <img src="{{ str_replace(public_path(), '', $path) }}" >
                @endforeach
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    @if($message = Session::get('success'))
                        <div>{{ $message }}</div>

                        {{--        <img src="{{ asset('images/' . Session::get('image') )}}" />--}}
{{--                        @foreach(File::glob(public_path('assets/images/photos').'/*') as $path)--}}

{{--                                <img src="{{ str_replace(public_path(), '', $path) }}" >--}}
{{--                        @endforeach--}}

                    @endif



                        <!-- overly-->

                    </div>
                </div>
            </div>


        </div>
    </div>

</div>

<!-- Create new album -->
<div id="offcanvas-create" uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar lg:w-4/12 w-full dark:bg-gray-700 dark:text-gray-300 p-0 bg-white flex flex-col justify-center shadow-2xl">

        <button class="uk-offcanvas-close absolute" type="button" uk-close></button>

        <!-- notivication header -->
        <div class="-mb-1 border-b font-semibold px-5 py-5 text-lg">
            <h4> Add photos </h4>
        </div>

        <div class="p-6 space-y-3 flex-1">

            <div>
                <label> Visibilty   </label>
                <select id="" name=""  >
                    <option data-icon="uil-bullseye"> Private </option>
                    <option data-icon="uil-chat-bubble-user">My Following</option>
                    <option data-icon="uil-layer-group-slash">Unlisted</option>
                    <option data-icon="uil-globe" selected>Public</option>
                </select>
            </div>

{{--            <form action="fileupload" enctype="multipart/form-data" method="POST">--}}

{{--                @csrf--}}
{{--                <input type="file" name="upfile[]" id="upfile" multiple>--}}
{{--                <input type="submit" value="upload" >--}}

{{--            </form>--}}

            <form action="fileupload" enctype="multipart/form-data" method="POST">
                @csrf
{{--                <input type="file" name="upfile[]" id="upfile" multiple>--}}

                <div>
                    <x-file-input multiple="true" name="upfile[]" title="Upload Multiple pictures" />
                 </div>
            <div uk-form-custom class="w-full py-3">
{{--                <div class="bg-gray-100 border-2 border-dashed flex flex-col h-32 items-center justify-center relative w-full rounded-lg dark:bg-gray-800 dark:border-gray-600">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-12">--}}
{{--                        <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />--}}
{{--                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />--}}
{{--                    </svg>--}}
{{--                </div>--}}

            </div>



        <div class="p-5">
            <input type="submit" value="Upload" class="btn-lg text-lg self-center bg-blue-600" />

{{--            <button type="button"  class="button w-full">--}}
{{--                Create Now--}}
{{--            </button>--}}
        </div>
        </form>
    </div>
    </div>
</div>


@section('chat-box')
    <!-- open chat box -->
    <div uk-toggle="target: #offcanvas-chat" class="start-chat">
        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
        </svg>
    </div>

    <div id="offcanvas-chat" uk-offcanvas="flip: true; overlay: true">
        <div class="uk-offcanvas-bar bg-white p-0 w-full lg:w-80 shadow-2xl">


            <div class="relative pt-5 px-4">

                <h3 class="text-2xl font-bold mb-2"> Chats </h3>

                <div class="absolute right-3 top-4 flex items-center space-x-2">

                    <button class="uk-offcanvas-close  px-2 -mt-1 relative rounded-full inset-0 lg:hidden blcok"
                            type="button" uk-close></button>

                    <a href="#" uk-toggle="target: #search;animation: uk-animation-slide-top-small">
                        <ion-icon name="search" class="text-xl hover:bg-gray-100 p-1 rounded-full"></ion-icon>
                    </a>
                    <a href="#">
                        <ion-icon name="settings-outline" class="text-xl hover:bg-gray-100 p-1 rounded-full"></ion-icon>
                    </a>
                    <a href="#">
                        <ion-icon name="ellipsis-vertical"
                                  class="text-xl hover:bg-gray-100 p-1 rounded-full"></ion-icon>
                    </a>
                    <div
                        class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden border border-gray-100"
                        uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small; offset:5">
                        <ul class="space-y-1">
                            <li>
                                <a href="#"
                                   class="flex items-center px-3 py-2 hover:bg-gray-100 hover:text-gray-800 rounded-md">
                                    <ion-icon name="checkbox-outline" class="pr-2 text-xl"></ion-icon>
                                    Mark all as read
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="flex items-center px-3 py-2 hover:bg-gray-100 hover:text-gray-800 rounded-md">
                                    <ion-icon name="settings-outline" class="pr-2 text-xl"></ion-icon>
                                    Chat setting
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="flex items-center px-3 py-2 hover:bg-gray-100 hover:text-gray-800 rounded-md">
                                    <ion-icon name="notifications-off-outline" class="pr-2 text-lg"></ion-icon>
                                    Disable notifications
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="flex items-center px-3 py-2 hover:bg-gray-100 hover:text-gray-800 rounded-md">
                                    <ion-icon name="star-outline" class="pr-2 text-xl"></ion-icon>
                                    Create a group chat
                                </a>
                            </li>
                        </ul>
                    </div>


                </div>


            </div>

            <div
                class="absolute bg-white z-10 w-full -mt-5 lg:-mt-2 transform translate-y-1.5 py-2 border-b items-center flex"
                id="search" hidden>
                <input type="text" placeholder="Search.." class="flex-1">
                <ion-icon name="close-outline" class="text-2xl hover:bg-gray-100 p-1 rounded-full mr-4 cursor-pointer"
                          uk-toggle="target: #search;animation: uk-animation-slide-top-small"></ion-icon>
            </div>

            <nav class="responsive-nav border-b extanded mb-2 -mt-2">
                <ul uk-switcher="connect: #chats-tab; animation: uk-animation-fade">
                    <li class="uk-active"><a class="active" href="#0"> Friends </a></li>
                    <li><a href="#0">Groups <span> 10 </span> </a></li>
                </ul>
            </nav>

            <div class="contact-list px-2 uk-switcher" id="chats-tab">

                <div class="p-1">
                    <a href="chats-friend.html">
                        <div class="contact-avatar">
                            <img src="../../../public/assets/images/avatars/avatar-7.jpg" alt="">
                        </div>
                        <div class="contact-username"> Alex Dolgove</div>
                    </a>
                    <a href="chats-friend.html">
                        <div class="contact-avatar">
                            <img src="../../../public/assets/images/avatars/avatar-8.jpg" alt="">
                            <span class="user_status status_online"></span>
                        </div>
                        <div class="contact-username"> Dennis Han</div>
                    </a>
                    <a href="chats-friend.html">
                        <div class="contact-avatar">
                            <img src="../../../public/assets/images/avatars/avatar-2.jpg" alt="">
                            <span class="user_status"></span>
                        </div>
                        <div class="contact-username"> Erica Jones</div>
                    </a>
                    <a href="chats-friend.html">
                        <div class="contact-avatar">
                            <img src="../../../public/assets/images/avatars/avatar-3.jpg" alt="">
                        </div>
                        <div class="contact-username">Stella Johnson</div>
                    </a>

                    <a href="chats-friend.html">
                        <div class="contact-avatar">
                            <img src="../../../public/assets/images/avatars/avatar-5.jpg" alt="">
                        </div>
                        <div class="contact-username">Adrian Mohani</div>
                    </a>
                    <a href="chats-friend.html">
                        <div class="contact-avatar">
                            <img src="../../../public/assets/images/avatars/avatar-6.jpg" alt="">
                        </div>
                        <div class="contact-username"> Jonathan Madano</div>
                    </a>
                    <a href="chats-friend.html">
                        <div class="contact-avatar">
                            <img src="../../../public/assets/images/avatars/avatar-2.jpg" alt="">
                            <span class="user_status"></span>
                        </div>
                        <div class="contact-username"> Erica Jones</div>
                    </a>
                    <a href="chats-friend.html">
                        <div class="contact-avatar">
                            <img src="../../../public/assets/images/avatars/avatar-1.jpg" alt="">
                            <span class="user_status status_online"></span>
                        </div>
                        <div class="contact-username"> Dennis Han</div>
                    </a>


                </div>
                <div class="p-1">
                    <a href="chats-group.html">
                        <div class="contact-avatar">
                            <img src="../../../public/assets/images/avatars/avatar-7.jpg" alt="">
                        </div>
                        <div class="contact-username"> Alex Dolgove</div>
                    </a>
                    <a href="chats-group.html">
                        <div class="contact-avatar">
                            <img src="../../../public/assets/images/avatars/avatar-8.jpg" alt="">
                            <span class="user_status status_online"></span>
                        </div>
                        <div class="contact-username"> Dennis Han</div>
                    </a>
                    <a href="chats-group.html">
                        <div class="contact-avatar">
                            <img src="../../../public/assets/images/avatars/avatar-2.jpg" alt="">
                            <span class="user_status"></span>
                        </div>
                        <div class="contact-username"> Erica Jones</div>
                    </a>
                    <a href="chats-group.html">
                        <div class="contact-avatar">
                            <img src="../../../public/assets/images/avatars/avatar-3.jpg" alt="">
                        </div>
                        <div class="contact-username">Stella Johnson</div>
                    </a>

                    <a href="chats-group.html">
                        <div class="contact-avatar">
                            <img src="../../../public/assets/images/avatars/avatar-5.jpg" alt="">
                        </div>
                        <div class="contact-username">Adrian Mohani</div>
                    </a>
                    <a href="chats-group.html">
                        <div class="contact-avatar">
                            <img src="../../../public/assets/images/avatars/avatar-6.jpg" alt="">
                        </div>
                        <div class="contact-username"> Jonathan Madano</div>
                    </a>
                    <a href="chats-group.html">
                        <div class="contact-avatar">
                            <img src="../../../public/assets/images/avatars/avatar-2.jpg" alt="">
                            <span class="user_status"></span>
                        </div>
                        <div class="contact-username"> Erica Jones</div>
                    </a>
                    <a href="chats-group.html">
                        <div class="contact-avatar">
                            <img src="../../../public/assets/images/avatars/avatar-1.jpg" alt="">
                            <span class="user_status status_online"></span>
                        </div>
                        <div class="contact-username"> Dennis Han</div>
                    </a>


                </div>

            </div>
        </div>
    </div>

@endsection
{{--<!-- For Night mode -->--}}
{{--<script>--}}
{{--    (function (window, document, undefined) {--}}
{{--        'use strict';--}}
{{--        if (!('localStorage' in window)) return;--}}
{{--        var nightMode = localStorage.getItem('gmtNightMode');--}}
{{--        if (nightMode) {--}}
{{--            document.documentElement.className += ' night-mode';--}}
{{--        }--}}
{{--    })(window, document);--}}

{{--    (function (window, document, undefined) {--}}

{{--        'use strict';--}}

{{--        // Feature test--}}
{{--        if (!('localStorage' in window)) return;--}}

{{--        // Get our newly insert toggle--}}
{{--        var nightMode = document.querySelector('#night-mode');--}}
{{--        if (!nightMode) return;--}}

{{--        // When clicked, toggle night mode on or off--}}
{{--        nightMode.addEventListener('click', function (event) {--}}
{{--            event.preventDefault();--}}
{{--            document.documentElement.classList.toggle('dark');--}}
{{--            if (document.documentElement.classList.contains('dark')) {--}}
{{--                localStorage.setItem('gmtNightMode', true);--}}
{{--                return;--}}
{{--            }--}}
{{--            localStorage.removeItem('gmtNightMode');--}}
{{--        }, false);--}}

{{--    })(window, document);--}}
{{--</script>--}}

<!-- Javascript
================================================== -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../../../../assets/js/tippy.all.min.js"></script>
<script src="../../../../assets/js/uikit.js"></script>
<script src="{{asset('assets/js/simplebar.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap-select.min.js')}}"></script>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>

</body>
</html>
