<html>
<head>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
  <title>@yield('title')</title>
</head>
<body>
  <header>
    <div class="inner">
      YouTubebuybuy
    </div>
  </header>
  <div class="nav">
    <ul>
      <li>test</li>
      <li>test</li>
      <li>test</li>
      <li>test</li>
      <li>test</li>
    </ul>
  </div>
  <section class="main">
    <div class="inner">
      <h1>@yield('title')</h1>
      section('menubar')
      <h2 class="menutitle">*メニュー</h2>
      <ul>
        <li>@show</li>
      </ul>
      <hr size="1">
      <div class="content">
        @yield('content')
      </div>
    </div>
  </section>
  <div class="footer">
    @yield('footer')
  </div>
</body>
</html>