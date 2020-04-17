<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  
  <header class="base-header">
    <div class="mod-header">
      <div class="mod-header__inner">
        <h1 class="mod-header__logo">
          タレントブックス
        </h1>
        <div class="mod-header__sub">
          
        </div>
      </div>
  
      <nav class="mod-globalnavi">
        <ul class="mod-globalnavi__navi">
          <li class="mod-globalnavi__naviItem">
            <a href="/">
              <b>タレント
              </b>
              <span class="dsp_ib">一覧を見る
              </span>
            </a>
          </li>
          <li class="mod-globalnavi__naviItem">
            <a href="/books/">
              <b>本
              </b>
              <span class="dsp_ib">一覧を見る
              </span>
              </a>
            </li>
          <li class="mod-globalnavi__naviItem">
            <a href="/authors/">
              <b>著者
              </b>
              <span class="dsp_ib">一覧を見る
              </span>
            </a>
          </li>
        </ul>
      <!-- /.mod-globalnavi -->
     </nav>
    <!-- /.mod-header -->
   </div>
  <!-- /gheader -->
  </header>
  <hr>

  <main class="py-4">
      @yield('content')
  </main>
</body>
</html>
