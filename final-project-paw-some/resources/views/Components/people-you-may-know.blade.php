@foreach( \App\Models\User::all() as $user)

    @if($user->id !== \Illuminate\Support\Facades\Auth::user()->id)
        <a href="/account/{{$user->id}}">
            <div class="contact-avatar">
                <img src="/storage/profile/{{$user->picture}}" alt="">
                <span class="user_status "></span>
            </div>
            <div class="contact-username"> {{$user->name}}</div>
        </a>

    @endif
@endforeach
