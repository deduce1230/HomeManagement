<!DOCTYPE HTML>
<html lang="ja">
<head>
@yield('head')
</head>
<body>
<header>
@yield('header')
</header>
<div id="contents">
    <div id="main">
        @yield('content')
    </div>
</div>
@yield('pageJs')
@yield('footer')
<div class="totop"><a href="#"><img src="/images/totop.png" alt="ページのトップへ戻る"></a></div><!-- /.totop -->
</body>
</html>

