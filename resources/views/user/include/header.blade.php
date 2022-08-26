<header class="ly_head">
    <div class="ly_cont_inner bl_head">

        <h1 class="bl_head_logo">
            <a href="{{ route('user.index') }}" class="hp_opacity1">
                <img src="{{ asset('images/header_logo.svg') }}" width="108" height="53" alt="WEB人 ウェブジン">
            </a>
        </h1>

        <ul class="bl_nav">
            <li class="bl_nav_item"><a href="{{ route('user.bookmarks') }}" class="bl_nav_link favorite"><i class="fa-regular fa-star"></i>お気に入り</a></li>
            @if (auth('users')->user())
            <li class="bl_nav_item">
                <form action="{{ route('user.logout') }}" method="post">
                    @csrf
                    <button type="submit" class="bl_nav_link login"><i class="fa-solid fa-arrow-right-to-bracket"></i>ログアウト</button>
                </form>
            </li>
            @else
            <li class="bl_nav_item"><a href="{{ route('user.login') }}" class="bl_nav_link login"><i class="fa-solid fa-arrow-right-to-bracket"></i>ログイン</a></li>
            <li class="bl_nav_item"><a href="{{ route('user.register') }}" class="bl_nav_link registration"><i class="fa-solid fa-user-plus"></i>新規登録</a></li>
            @endif
        </ul>
        <!-- /.bl_nav -->

    </div>
</header>
