<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.layouts.head')
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=538878436465140';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


<!-- Page Header -->

    @include('user.layouts.header')


<!-- Main Content -->
@section('main')
    @show

<!-- Footer -->
@include('user.layouts.footer')

</body>

</html>
