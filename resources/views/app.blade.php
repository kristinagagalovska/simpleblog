<html>
<head>
    <title>Simple Blog</title>
</head>
<body>
<ul>
    <li>
        <a href="{{ url('/')}}">Home</a>
    </li>
</ul>
<ul>
    @if (Auth::guest())
        <li>
            <a href="{{url('/auth/login')}}">Login</a>
        </li>
        <li>
            <a href="{{url('/auth/register')}}">Register</a>
        </li>
    @else
         <li>
             <a href="#">{{Auth::user()->name}}</a>
             <ul>
                 @if(Auth::user()->can_post())
                     <li>
                         <a href="{{url('/new-post')}}">Add new post</a>
                     </li>
                     <li>
                         <a href="{{url('/user/'.Auth::id().'/posts')}}">My Posts</a>
                     </li>
                 @endif
                 <li>
                     <a href="{{url('/user/'.Auth::id())}}">My Profile</a>
                 </li>
                 <li>
                     <a href="{{url('/auth/logout')}}">Logout</a>
                 </li>
                     @endif
             </ul>

         </li>
</ul>



<h2>@yield('title')</h2>
@yield('title-meta')
@yield('content')

</body>
</html>