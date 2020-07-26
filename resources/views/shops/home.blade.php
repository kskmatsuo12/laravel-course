ショップログイン
{{--Auth::guard('user')->check()--}}
{{Auth::guard('shop')->check()}}

{{Auth::guard('shop')->user()->name}}

<form method="POST" action="{{route('shop.logout')}}">
@csrf
    <button type="submit">logout</button>
</form>