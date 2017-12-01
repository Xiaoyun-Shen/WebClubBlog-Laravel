<!DOCTYPE html>
<html lang="en">

    @include('admin.layouts.head')

    <body class="hold-transition skin-purple sidebar-mini">

        <div class="wrapper">
            @include('admin.layouts.header')
            @include('admin.layouts.sidebar')
            @section('main')
                @show
            @include('admin.layouts.footer')
        </div>

    </body>

</html>
