@extends('Layouts.master')

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    {{--    <link href="{{asset('assets/images/favicon.png')}}" rel="icon" type="image/png">--}}

    <!-- Basic Page Needs
        ================================================== -->
    <title>Paw'some</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- icons
    ================================================== -->
    {{--    <link rel="stylesheet" href="{{asset('assets/css/icons.css')}}">--}}

    <!-- CSS
    ================================================== -->
    {{--    <link rel="stylesheet" href="{{asset('assets/css/uikit.css')}}">--}}
    {{--    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">--}}
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>
<body>


<div id="wrapper">


    <x-side-bar></x-side-bar>
    <!-- Main Contents -->
    <div class="main_content">
        <div class="mcontainer">

            <!--  Feeds  -->
            <div class="lg:flex lg:space-x-10">
                <div class="lg:w-3/4 lg:px-20 space-y-7">


                    <!-- create post -->
                    <div class="card lg:mx-0 p-4" uk-toggle="target: #create-post-modal">
                        <div class="flex space-x-3">
                            <img src="/storage/profile/{{\Illuminate\Support\Facades\Auth::user()->picture}}"
                                 class="w-10 h-10 rounded-full object-cover">
                            <input placeholder="What's Your Mind ? {{\Illuminate\Support\Facades\Auth::user()->name}}!"
                                   class="bg-gray-100 hover:bg-gray-200 flex-1 h-10 px-6 rounded-full">
                        </div>
                        <div class="grid grid-flow-col pt-3 -mx-1 -mb-1 font-semibold text-sm">
                            <div class="hover:bg-gray-100 flex items-center p-1.5 rounded-md cursor-pointer">
                                <svg
                                    class="bg-blue-100 h-9 mr-2 p-1.5 rounded-full text-blue-600 w-9 -my-0.5 hidden lg:block"
                                    data-tippy-placement="top" title="Tooltip" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Photo/Video
                            </div>
                            <div class="hover:bg-gray-100 flex items-center p-1.5 rounded-md cursor-pointer">
                                <svg
                                    class="bg-green-100 h-9 mr-2 p-1.5 rounded-full text-green-600 w-9 -my-0.5 hidden lg:block"
                                    uk-tooltip="title: Messages ; pos: bottom ;offset:7" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                    title="" aria-expanded="false">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                                Tag a Pet
                            </div>

                        </div>
                    </div>

                    @foreach($feed as $post)
                        <div class="card lg:mx-0 uk-animation-slide-bottom-small">

                            <!-- post header-->
                            <div class="flex justify-between items-center lg:p-4 p-2.5">
                                <div class="flex flex-1 items-center space-x-4">
                                    <a href="#">
                                        <img
                                            src="/storage/profile/{{ \App\Models\User::where('id', $post->author_id)->value('picture') }}"
                                            class="bg-gray-200 border border-white rounded-full w-10 h-10 object-cover">
                                    </a>
                                    <div class="flex-1 font-semibold capitalize">
                                        <a href="#"
                                           class="text-black"> {{  \App\Models\User::where('id', $post->author_id)->value('name')  }} </a>
                                        <div
                                            class="text-gray-700 flex items-center space-x-2"> {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->diffInHours(Carbon\Carbon::now()) }} Hrs

                                            <ion-icon name="people" class="ml-2"></ion-icon>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    @if($post->author_id == \Illuminate\Support\Facades\Auth::user()->id)
                                        <a href="#"> <i
                                                class="icon-feather-more-horizontal text-2xl hover:bg-gray-200 rounded-full p-2 transition -mr-1"></i>
                                        </a>

                                        <div
                                            class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100"
                                            uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small">

                                            <ul class="space-y-1">
                                                <li>
                                                    <form method="post" action="{{ url('feed', $post->id) }}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit"
                                                                class="flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md w-full">
                                                            <i class="uil-trash-alt mr-1"></i> Delete
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>

                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="ml-4 mb-2 ">
                                <span>{{$post->description}}</span>
                            </div>

                            <div uk-lightbox>
                                <a href="assets/images/avatars/avatar-lg-3.jpg">
                                    <img src="/storage/feed/{{$post->picture}}" alt=""
                                         class="max-h-96 w-full object-cover">
                                </a>
                            </div>


                            <div class="p-4 space-y-3">

                                <div class="flex space-x-4 lg:font-bold ">


                                    @if(!\App\Models\Like::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)
                                               ->where('post_id', $post->id )
                                               ->exists())

                                        <form id="like-form" enctype="multipart/form-data"
                                              class="flex items-center space-x-2 hover:text-blue-500 group"
                                              onsubmit="like(event)">
                                            @csrf


                                            <div class="p-2 rounded-full  text-black lg:bg-gray-100 mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                     fill="currentColor"
                                                     id="like-logo"
                                                     width="22" height="22"
                                                     class="dark:text-gray-100 group-hover:text-blue-500">
                                                    <path
                                                        d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                                                </svg>
                                            </div>

                                            <input hidden type="text" id="like-user_id"
                                                   value="{{\Illuminate\Support\Facades\Auth::user()->id}}"
                                                   name="user_id"/>
                                            <input hidden type="text" value="{{$post->id}}" id="like-post_id"
                                                   name="post_id"/>


                                            <button type="submit" id="submit" class="like-button" id="like-btn">
                                                Like
                                            </button>

                                        </form>

                                    @else

                                        <form id="dislike-form" enctype="multipart/form-data"
                                              class="flex items-center space-x-2 hover:text-blue-500 "
                                              onsubmit="dislike(event)">
                                            @csrf


                                            <div class="p-2 rounded-full  text-black lg:bg-gray-100 mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                     fill="currentColor"
                                                     id="like-logo"
                                                     width="22" height="22"
                                                     class="dark:text-gray-100 text-blue-500">
                                                    <path
                                                        d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                                                </svg>
                                            </div>


                                            <input hidden type="text" id="like-id"
                                                   name="like_id" value="{{\App\Models\Like::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)
                                               ->where('post_id', $post->id )
                                               ->first('id')->value('id')}}"/>

                                            <input hidden type="text" value="{{$post->id}}" id="like-post_id"
                                                   name="post_id"/>
                                            <button id="submit" class="like-button text-blue-500" id="like-btn">
                                                Liked
                                            </button>
                                        </form>
                                    @endif


                                    <span hidden
                                          id="like-id">{{\App\Models\Like::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->where('post_id', $post->id )->first('id')}}</span>



                                    <script>
                                        function like(event) {
                                            event.preventDefault();

                                            let likeData = {
                                                user_id: $('#like-user_id').val(),
                                                post_id: $('#like-post_id').val(),
                                                "_token": "{{ csrf_token() }}",
                                            }


                                            $.ajax({
                                                url: '/like',
                                                type: 'POST',
                                                data: likeData,
                                                success: function (response) {
                                                    if (response.liked) {
                                                       console.log('liked');
                                                    }
                                                }
                                            });
                                        }


                                        function dislike(event) {
                                            event.preventDefault();
                                            let id = $('#like-id').val();
                                            console.log(id);
                                            let dislikeData = {
                                                "_token":
                                                    "{{ csrf_token() }}",
                                            }

                                            $.ajax({
                                                url: '/like/' + id,
                                                type: 'DELETE',
                                                data: dislikeData,
                                                success: function (response) {
                                                    if (response.disliked) {
                                                        console.log('disliked the image');
                                                    } else {
                                                        console.log('failed to delete');
                                                    }
                                                }
                                            });

                                        }


                                    </script>


                                    <a href="#" class="flex items-center space-x-2">
                                        <div class="p-2 rounded-full  text-black lg:bg-gray-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                 fill="currentColor"
                                                 width="22" height="22" class="dark:text-gray-100">
                                                <path fill-rule="evenodd"
                                                      d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div> Comment</div>
                                    </a>
                                    {{--                                    <a href="#" class="flex items-center space-x-2 flex-1 justify-end">--}}
                                    {{--                                        <div class="p-2 rounded-full  text-black lg:bg-gray-100">--}}
                                    {{--                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"--}}
                                    {{--                                                 fill="currentColor"--}}
                                    {{--                                                 width="22" height="22" class="dark:text-gray-100">--}}
                                    {{--                                                <path--}}
                                    {{--                                                    d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/>--}}
                                    {{--                                            </svg>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div> Share</div>--}}
                                    {{--                                    </a>--}}
                                </div>

                                <div class="border-t py-2 space-y-4 dark:border-gray-600">

                                    @foreach(\App\Models\Comment::where('post_id',$post->id)->get() as $comment)
                                        <div class="flex">
                                            <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                                <img
                                                    src="{{  ( "/storage/profile/"  .\App\Models\User::where('id',$comment->user_id)->first()->picture ) ??   "assets/images/avatars/avatar-1.jpg" }}"
                                                    alt=""
                                                    class="absolute h-full rounded-full w-full object-cover">
                                            </div>
                                            <div>
                                                <div
                                                    class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12  dark:bg-gray-800 dark:text-gray-100">
                                                    <p class="leading-6">{{$comment->comment}} </p>
                                                    <div
                                                        class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800"></div>
                                                </div>
                                                {{--                                            <div class="text-sm flex items-center space-x-3 mt-2 ml-5">--}}
                                                {{--                                                <a href="#" class="text-red-600"> <i class="uil-heart"></i> Love </a>--}}
                                                {{--                                                <a href="#"> Replay </a>--}}
                                                {{--                                                <span> 3d </span>--}}
                                                {{--                                            </div>--}}
                                            </div>
                                        </div>

                                    @endforeach


                                </div>

                                <div class="bg-gray-100 rounded-full relative border-t">
                                    <form id="comment-form" action="/comment" method="post"
                                          onsubmit="postComment(event)">
                                        @csrf
                                        <input name="user_id" id="comment-user_id" hidden
                                               value={{\Illuminate\Support\Facades\Auth::user()->id}} />
                                        <input name="post_id" id="comment-post_id" hidden value="{{$post->id}}"/>
                                        <input placeholder="Add your Comment.."
                                               name="comment"
                                               id="comment-data"
                                               class="bg-transparent max-h-10 shadow-none px-5">
                                        <input type="submit" hidden/>
                                    </form>
                                    <script>
                                        {{--$(document).ready(function () {--}}
                                        {{--    $('#comment-form').on('submit', (event) => {--}}
                                        {{--        event.preventDefault();--}}

                                        {{--        var commentData = {--}}
                                        {{--            user_id: $('#comment-user_id').val(),--}}
                                        {{--            post_id: $('#comment-post_id').val(),--}}
                                        {{--            comment: $('#comment-data').val(),--}}
                                        {{--            "_token": "{{ csrf_token() }}",--}}
                                        {{--        }--}}

                                        {{--        $.ajax({--}}
                                        {{--            url: '/comment',--}}
                                        {{--            type: 'POST',--}}
                                        {{--           data:commentData,--}}
                                        {{--            success: function (response) {--}}
                                        {{--                console.log(response);--}}
                                        {{--            }--}}
                                        {{--        });--}}
                                        {{--    });--}}
                                        {{--});--}}

                                        function postComment(event) {
                                            event.preventDefault();

                                            let commentData = {
                                                user_id: $('#comment-user_id').val(),
                                                post_id: $('#comment-post_id').val(),
                                                comment: $('#comment-data').val(),
                                                "_token": "{{ csrf_token() }}",
                                            }
                                            console.log(commentData);

                                            $.ajax({
                                                url: '/comment',
                                                type: 'POST',
                                                data: commentData,
                                                success: function (response) {
                                                    console.log(response);
                                                    $("#comment-data").text('');
                                                }
                                            });
                                        }
                                    </script>
                                </div>

                            </div>

                        </div>

                    @endforeach


                </div>
                <div class="lg:w-72 w-full">

                </div>
            </div>

        </div>
    </div>

</div>

<!-- birthdays modal -->
<div id="birthdays" uk-modal>
    <div class="uk-modal-dialog uk-modal-body rounded-xl shadow-lg">
        <!-- close button -->
        <button class="uk-modal-close-default p-2.5 bg-gray-100 rounded-full m-3" type="button" uk-close></button>

        <div class="flex items-center space-x-3 mb-10">
            <ion-icon name="gift" class="text-yellow-500 text-xl bg-yellow-50 p-1 rounded-md"></ion-icon>
            <div class="text-xl font-semibold"> Today's birthdays</div>
        </div>

        <div class="space-y-6">
            <div class="sm:space-y-8 space-y-6 pb-2">

                <div class="flex items-center sm:space-x-6 space-x-3">
                    <img src="assets/images/avatars/avatar-3.jpg" alt="" class="sm:w-16 sm:h-16 w-14 h-14 rounded-full">
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-3">
                            <div class="text-base font-semibold"><a href="#"> Alex Dolgove </a></div>
                            <div class="font-medium text-sm text-gray-400"> 19 years old</div>
                        </div>
                        <div class="relative">
                            <input type="text" name="" id="" class="with-border" placeholder="Write her on Timeline">
                            <ion-icon name="happy" class="absolute right-3 text-2xl top-1/4"></ion-icon>
                        </div>
                    </div>
                </div>
                <div class="flex items-center sm:space-x-6 space-x-3">
                    <img src="assets/images/avatars/avatar-2.jpg" alt="" class="sm:w-16 sm:h-16 w-14 h-14 rounded-full">
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-3">
                            <div class="text-base font-semibold"><a href="#"> Stella Johnson </a></div>
                            <div class="font-medium text-sm text-gray-400"> 19 years old</div>
                        </div>
                        <div class="relative">
                            <input type="text" name="" id="" class="with-border" placeholder="Write her on Timeline">
                            <ion-icon name="happy" class="absolute right-3 text-2xl top-1/4"></ion-icon>
                        </div>
                    </div>
                </div>

            </div>
            <div class="relative cursor-pointer" uk-toggle="target: #upcoming; animation: uk-animation-fade">
                <div class="bg-gray-50 rounded-lg px-5 py-4 font-semibold text-base"> Upcoming birthdays</div>
                <i class="-translate-y-1/2 absolute icon-feather-chevron-up right-4 text-xl top-1/2 transform text-gray-400"
                   id="upcoming" hidden></i>
                <i class="-translate-y-1/2 absolute icon-feather-chevron-down right-4 text-xl top-1/2 transform text-gray-400"
                   id="upcoming"></i>
            </div>
            <div class="mt-5 sm:space-y-8 space-y-6" id="upcoming" hidden>

                <div class="flex items-center sm:space-x-6 space-x-3">
                    <img src="assets/images/avatars/avatar-6.jpg" alt="" class="sm:w-16 sm:h-16 w-14 h-14 rounded-full">
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-3">
                            <div class="text-base font-semibold"><a href="#"> Erica Jones </a></div>
                            <div class="font-medium text-sm text-gray-400"> 19 years old</div>
                        </div>
                        <div class="relative">
                            <input type="text" name="" id="" class="with-border" placeholder="Write her on Timeline">
                            <ion-icon name="happy" class="absolute right-3 text-2xl top-1/4"></ion-icon>
                        </div>
                    </div>
                </div>
                <div class="flex items-center sm:space-x-6 space-x-3">
                    <img src="assets/images/avatars/avatar-5.jpg" alt="" class="sm:w-16 sm:h-16 w-14 h-14 rounded-full">
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-3">
                            <div class="text-base font-semibold"><a href="#"> Dennis Han </a></div>
                            <div class="font-medium text-sm text-gray-400"> 19 years old</div>
                        </div>
                        <div class="relative">
                            <input type="text" name="" id="" class="with-border" placeholder="Write her on Timeline">
                            <ion-icon name="happy" class="absolute right-3 text-2xl top-1/4"></ion-icon>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

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
                    <ion-icon name="ellipsis-vertical" class="text-xl hover:bg-gray-100 p-1 rounded-full"></ion-icon>
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
                        <img src="assets/images/avatars/avatar-7.jpg" alt="">
                    </div>
                    <div class="contact-username"> Alex Dolgove</div>
                </a>
                <a href="chats-friend.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-8.jpg" alt="">
                        <span class="user_status status_online"></span>
                    </div>
                    <div class="contact-username"> Dennis Han</div>
                </a>
                <a href="chats-friend.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-2.jpg" alt="">
                        <span class="user_status"></span>
                    </div>
                    <div class="contact-username"> Erica Jones</div>
                </a>
                <a href="chats-friend.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-3.jpg" alt="">
                    </div>
                    <div class="contact-username">Stella Johnson</div>
                </a>

                <a href="chats-friend.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-5.jpg" alt="">
                    </div>
                    <div class="contact-username">Adrian Mohani</div>
                </a>
                <a href="chats-friend.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-6.jpg" alt="">
                    </div>
                    <div class="contact-username"> Jonathan Madano</div>
                </a>
                <a href="chats-friend.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-2.jpg" alt="">
                        <span class="user_status"></span>
                    </div>
                    <div class="contact-username"> Erica Jones</div>
                </a>
                <a href="chats-friend.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-1.jpg" alt="">
                        <span class="user_status status_online"></span>
                    </div>
                    <div class="contact-username"> Dennis Han</div>
                </a>


            </div>
            <div class="p-1">
                <a href="chats-group.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-7.jpg" alt="">
                    </div>
                    <div class="contact-username"> Alex Dolgove</div>
                </a>
                <a href="chats-group.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-8.jpg" alt="">
                        <span class="user_status status_online"></span>
                    </div>
                    <div class="contact-username"> Dennis Han</div>
                </a>
                <a href="chats-group.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-2.jpg" alt="">
                        <span class="user_status"></span>
                    </div>
                    <div class="contact-username"> Erica Jones</div>
                </a>
                <a href="chats-group.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-3.jpg" alt="">
                    </div>
                    <div class="contact-username">Stella Johnson</div>
                </a>

                <a href="chats-group.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-5.jpg" alt="">
                    </div>
                    <div class="contact-username">Adrian Mohani</div>
                </a>
                <a href="chats-group.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-6.jpg" alt="">
                    </div>
                    <div class="contact-username"> Jonathan Madano</div>
                </a>
                <a href="chats-group.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-2.jpg" alt="">
                        <span class="user_status"></span>
                    </div>
                    <div class="contact-username"> Erica Jones</div>
                </a>
                <a href="chats-group.html">
                    <div class="contact-avatar">
                        <img src="assets/images/avatars/avatar-1.jpg" alt="">
                        <span class="user_status status_online"></span>
                    </div>
                    <div class="contact-username"> Dennis Han</div>
                </a>


            </div>

        </div>
    </div>
</div>


<!-- Craete post modal -->
<div id="create-post-modal" class="create-post is-story" uk-modal>
    <div
        class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical rounded-lg p-0 lg:w-5/12 relative shadow-2xl uk-animation-slide-bottom-small">
        <form method="POST" action="/feed" enctype="multipart/form-data">
            @csrf
            <div class="text-center py-3 border-b">
                <h3 class="text-lg font-semibold"> Create Post </h3>
                <button class="uk-modal-close-default bg-gray-100 rounded-full p-2.5 right-2" type="button" uk-close
                        uk-tooltip="title: Close ; pos: bottom ;offset:7"></button>
            </div>
            <div class="flex flex-1 items-start space-x-4 p-5">
                <img src="/storage/profile/{{\Illuminate\Support\Facades\Auth::user()->picture}}"
                     class="bg-gray-200 border border-white rounded-full w-11 h-11 object-cover">
                <div class="flex-1 pt-2">
                    <input name="author_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden/>
                    <textarea
                        class="uk-textare text-black shadow-none focus:shadow-none text-xl font-medium resize-none"
                        rows="5"
                        name="description"
                        placeholder="What's Your Mind ? {{\Illuminate\Support\Facades\Auth::user()->name}}!"></textarea>
                    <img src="" alt="" id="picture-preview"/>
                </div>

                <script type="text/javascript">
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $('#picture-preview').attr('src', e.target.result);
                            }

                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                </script>

            </div>
            <div class=" bottom-0 p-4 space-x-4 w-full">
                <div class="flex bg-gray-50 border border-purple-100 rounded-2xl p-2 shadow-sm items-center">
                    <div class="lg:block hidden ml-1"> Add to your post</div>
                    <div class="flex flex-1 items-center lg:justify-end justify-center space-x-2">
                        <label for="picture">
                            <svg class="bg-blue-100 h-9 p-1.5 rounded-full text-blue-600 w-9 cursor-pointer" fill="none"
                                 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </label>
                        <input type="file" name="picture" id="picture" hidden onchange="readURL(this);">


                    </div>
                </div>
            </div>
            <div class="flex items-center w-full justify-end border-t p-3">

                <div class="flex space-x-2">

                    <button type="submit"
                            class="bg-blue-600 flex h-9 items-center justify-center rounded-md text-white px-5 font-medium">
                        Share
                    </button>
                </div>

                <a href="#" hidden
                   class="bg-blue-600 flex h-9 items-center justify-center rounded-lg text-white px-12 font-semibold">
                    Share </a>
            </div>

        </form>
    </div>
</div>

<!-- For Night mode -->
<!-- <script>
    (function (window, document, undefined) {
        'use strict';
        if (!('localStorage' in window)) return;
        var nightMode = localStorage.getItem('gmtNightMode');
        if (nightMode) {
            document.documentElement.className += ' night-mode';
        }
    })(window, document);

    (function (window, document, undefined) {

        'use strict';

        // Feature test
        if (!('localStorage' in window)) return;

        // Get our newly insert toggle
        var nightMode = document.querySelector('#night-mode');
        if (!nightMode) return;

        // When clicked, toggle night mode on or off
        nightMode.addEventListener('click', function (event) {
            event.preventDefault();
            document.documentElement.classList.toggle('dark');
            if (document.documentElement.classList.contains('dark')) {
                localStorage.setItem('gmtNightMode', true);
                return;
            }
            localStorage.removeItem('gmtNightMode');
        }, false);

    })(window, document);
</script>
-->
<!-- Javascript
================================================== -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="assets/js/tippy.all.min.js"></script>
<script src="assets/js/uikit.js"></script>
<script src="assets/js/simplebar.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>

</body>
</html>
