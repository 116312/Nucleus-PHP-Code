<!DOCTYPE html>
<html>

@include('admin.layout.head')

<body class="theme-indigo">

<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!}
    var token = '{!! csrf_token() !!}'

</script>
@if(session('status') && session('status') == 100)
    <script type="text/javascript">
        var status = {!! json_encode(session('status')) !!}
        var message = {!! json_encode(session('message')) !!}
        var type = {!! json_encode(session('type')) !!}
    </script>
@endif


@include('admin.layout.navbar')

@include('admin.layout.asidebar')

@yield('admin-section')

@include('admin.layout.script')

</body>

</html>