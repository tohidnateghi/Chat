<!doctype html>
<!--[if lte IE 9]>         <html lang="en" class="lt-ie10 lt-ie10-msg no-focus"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en" class="no-focus">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <title>چت</title>

    <meta name="description" content="Online Exam project with laravel">
    <meta name="author" content="Tohid Nateghi">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Online Exam developed By Tohid Nateghi with Laravel framework">
    <meta property="og:site_name" content="Online Exam">
    <meta property="og:description" content="Online Exam project with laravel">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <link rel="shortcut icon" href="/img/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/img/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    {{-- <link rel="stylesheet" href="{{ mix('/css/all.css') }}"> --}}
    <link rel="stylesheet" href="/css/codebase.css">
    <link rel="stylesheet" href="/css/rtl.css">

    {{-- Custom styles --}}
    @yield('styles')

    <!-- END Stylesheets -->
</head>

<body>
    <div id="page-loader" class="hide"></div>

    <!-- Page Container -->

    <div id="page-container" class="sidebar-o sidebar-r side-scroll page-header-modern main-content-boxed">

        <!-- Sidebar -->
        @include('partials.sidebar')
        <!-- END Sidebar -->

        <!-- Header -->
        @include('partials.header')
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            @yield('content')
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        @include('partials.footer')
        <!-- END Footer -->
    </div>

    <!-- END Page Container -->

    <!-- All JS Files -->
    {{-- <script src="/js/codebase.min.js"></script> --}}
    <script src="/js/app.js"></script>
    <script src="/js/all.js"></script>

    <script>

        // @if(auth()->user()->id == 1)
        
        // Echo.private('users.id')
        //     .listen('UserCreated', function(e) {
        //         // console.log(e.user.email);
        // });

        // @endif

        
        // $('input').on('change', function(e){
        // let channel = Echo.private('chat');
        // setTimeout( () => {
        //     channel.whisper('typing', {
        //     userName: '{{ auth()->user()->name }}',
        //     text: text,
        //     typing: true
        //     })
        // }, 0)
        // });

        Echo.private('chat')
        .listenForWhisper('typing', (e) => {
            // console.log(e);
            $('#userName').text(e.userName)
            e.typing ? $('.typing').show() : $('.typing').hide();
            $('input').val(e.text);
            setTimeout( () => {
                $('.typing').hide();
            }, 1000);
        })

        setTimeout( () => {
            $('.typing').hide();
        }, 100);

    </script>


    {{-- custom scripts --}}
    @yield('scripts')
</body>

</html>