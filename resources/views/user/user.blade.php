<h1>
    @auth
       {{ auth()->user()->full_name }}
       {{ auth()->user()->email }}
       {{ auth()->user()->number }}
       {{ auth()->user()->password }}


    @endauth
   </h1>
   