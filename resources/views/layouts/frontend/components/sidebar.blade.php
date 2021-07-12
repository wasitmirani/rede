<div class="sidebar_inner" data-simplebar="">
    <div class="flex flex-col items-center my-6 uk-visible@s">
        <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full transition m-0.5 mr-2  w-24 h-24">
            @if(Auth::user()->image != null)
            <img src="{{asset('user/images/'.Auth::user()->image)}}" class="bg-gray-200 border-4 border-white rounded-full w-full h-full">
            @else
            <img src="{{asset('user/images/user.jpg')}}" class="bg-gray-200 border-4 border-white rounded-full w-full h-full">
            @endif
        </div>
        <a href="profile.html" class="text-xl font-medium capitalize mt-4 uk-link-reset">
            {{Auth::user()->name}}
        </a>
        <div class="flex justify-around w-full items-center text-center uk-link-reset text-gray-800 mt-6">
            <div>
                <a href="#">
                    <strong>Post</strong>
                    <div>0</div>
                </a>
            </div>
            <div>
                <a href="#">
                    <strong>Following</strong>
                    <div> 0</div>
                </a>
            </div>
            <div>
                <a href="#">
                    <strong>Followers</strong>
                    <div> 0</div>
                </a>
            </div>
        </div>
    </div>
    <hr class="-mx-4 -mt-1 uk-visible@s">
    <ul>
        <li class="active">
            <a href="{{route('new.feeds')}}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                </svg>
                <span> Feed </span> </a>
        </li>

        <li>
            <a href="{{route('messages')}}">
                <i class="uil-location-arrow"></i>
                <span> Messages </span> <span class="nav-tag"> 0</span> </a>
        </li>
        <li>
            <a href="{{route('my.interest',Auth::user()->id)}}">
                <i class="uil-location-arrow"></i>
                <span> My Interests </span> </a>
        </li>
        <li>
            <a href="{{route('my.profile')}}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span> My Profile </span> </a>
        </li>

        <li>
            <hr class="my-2">
        </li>
        <li>
            <a  href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">


                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span> Logout </span>
                </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

        </li>
    </ul>
</div>
