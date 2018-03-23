<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blog Post - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/blog-post.css')}}" rel="stylesheet">
    <link href="{{asset('css/st.css')}}" rel="stylesheet">
    <link href="{{asset('css/languages.min.css')}}" rel="stylesheet">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap-filestyle.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/js.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>

  </head>

  <body>
  @yield('header')
  <div class="container" style="min-height: calc(100vh - 175px); padding-top: 50px;padding-bottom: 50px">

      <div class="row">
        @yield('sidebar')
        @yield('content')
      </div>
  </div>

  @yield('footer')





  </body>

</html>
