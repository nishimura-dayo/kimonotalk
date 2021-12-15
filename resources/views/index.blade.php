@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div class="users container">
            <h1 class="headline">トップページ（ログイン中）</h1>
            <div class="row">
                <div class="col-sm-8">
                    {{-- トピック一覧 --}}
                    {{-- @include('topics.topics') --}}
                </div>
            </div>
        </div>
    @else
        <section class="firstview">
            <div class="home-icatch">
                <h1 class="home-headline">着物に関する疑問や悩み、色々あるよね。</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'はじめる', [], ['class' => 'btn-entry']) !!}
            </div>
        </section>
        <section class="home-menu">
            <h2 class="home-title">カテゴリから探す</h2>
            <div class="home-menu-list">
                <dl class="home-menu-list-item">
                    <dt class="home-category-name"><a href="/category/1" class="home-menu-btn1">着物ショップ</a></dt>
                    <dd class="home-category-text">安心してお買い物しましょ</dd>
                </dl>
                <dl class="home-menu-list-item">
                    <dt class="home-category-name"><a href="/category/2" class="home-menu-btn2">着物コーデ</a></dt>
                    <dd class="home-category-text">このコーディネートが好き</dd>
                </dl>
                <dl class="home-menu-list-item">
                    <dt class="home-category-name"><a href="/category/3" class="home-menu-btn3">着付けテクニック</a></dt>
                    <dd class="home-category-text">簡単に着る方法ないですか？</dd>
                </dl>
                <dl class="home-menu-list-item">
                    <dt class="home-category-name"><a href="/category/4" class="home-menu-btn4">着物姿の芸能人</a></dt>
                    <dd class="home-category-text">おしゃれな芸能人探し</dd>
                </dl>
                <dl class="home-menu-list-item">
                    <dt class="home-category-name"><a href="/category/5" class="home-menu-btn5">着物警察</a></dt>
                    <dd class="home-category-text">ある日突然警察に襲われた</dd>
                </dl>
                <dl class="home-menu-list-item">
                    <dt class="home-category-name"><a href="/category/6" class="home-menu-btn6">お手入れ・収納</a></dt>
                    <dd class="home-category-text">ドライクリーニングしか駄目？</dd>
                </dl>
            </div>
        </section>
    @endif
    <footer>
        <small>© 2021 webクリエイターの生活</small>
    </footer>
@endsection