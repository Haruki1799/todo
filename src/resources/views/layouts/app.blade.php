<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                Todo
            </a>
            <nav class="header-nav">
                <a class="header-nav-item" href="/categories">
                    カテゴリ一覧
                </a>
            </nav>

        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>