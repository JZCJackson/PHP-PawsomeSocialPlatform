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

    <script src="https://cdn.tiny.cloud/1/8b788x1v9mo66br40uvbyb1pftqbugakv47an7rtj0zwxfp2/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
</head>
<body>


<div id="wrapper">
    <x-side-bar></x-side-bar>

    <!-- Main Contents -->
    <div class="main_content">
        <div class="mcontainer">

            <!--  breadcrumb -->
            <div class="breadcrumb-area py-0">
                <div class="breadcrumb">
                    <ul class="m-0">
                        <li>
                            <a href="/blogs">Blogs</a>
                        </li>
                        <li class="active">
                            <a href="/blogs/create">Create New Blog </a>
                        </li>
                    </ul>
                </div>
            </div>


            <!-- create page-->
            <div class="max-w-2xl m-auto shadow-md rounded-md bg-white lg:mt-20">

                <!-- form header -->
                <div class="text-center border-b border-gray-100 py-6">
                    <h3 class="font-bold text-xl"> Create New Blog </h3>
                </div>

                <!-- form body -->
                <div class="p-10 space-y-7">
                    <form method="POST" action="/blogs" enctype="multipart/form-data">
                        @csrf

                        <div class="line mb-4">

                            <input class="line__input" id="" name="title" type="text"
                                   onkeyup="this.setAttribute('value', this.value);" value="" autocomplete="off">
                            <span for="username" class="line__placeholder"> Blog Title </span>
                        </div>

                        <div>

                          <textarea id="blog" name="blog_data">
                            Start writing Blog
                          </textarea>
                            <script>
                                tinymce.init({
                                    selector: 'textarea#blog'
                                });
                            </script>
                        </div>


                        <x-file-input title="Upload Cover Picture for Blog" ></x-file-input>

                        <div>
                            <input hidden name="author_id" value={{\Illuminate\Support\Facades\Auth::user()->id}}></input>
                        </div>




                <!-- form footer -->
                <div class="flex justify-center border-gray-100 py-8">
                    <button type="submit" class="button lg:w-1/3">
                        Create Now
                    </button>
                </div>
                </form>
            </div>


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
