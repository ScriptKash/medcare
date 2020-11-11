@if(Auth::user()->avatar)
<img style="width: 30%;padding-bottom:5px;" src="{{ route('user.avatar', ['filename'=>Auth::user()->avatar]) }}" />
@endif