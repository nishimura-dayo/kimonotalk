@extends('layouts.app')

@section('content')
    @if(Auth::check())
    <div class="category">
        <h1 class="category-headline">カテゴリ<span class="category-headline-suffix">から探す</span></h1>
        @include('categories.categories')
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
            <h1 class="home-title">カテゴリから探す</span></h1>
            @include('categories.categories')
        </section>
    @endif
@endsection