@extends('layouts.app')

@section('content')

    <div class="users">
        <h1 class="headline">トピック詳細ページ</h1>

        <section class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div class="topic_content">
                        <h3>トピック内容↓</h3>
                        <div class="topic_text">
                            {{-- トピック詳細--}}
                            {{ $topic->content }}
                        </div>
                    </div>

                    {{-- コメントフォーム --}}
                    @include('topics.form_comment')

                    {{-- カテゴリ別トピック一覧ページへのリンク --}}
                    {!! link_to_route('topics.index', 'トピック一覧を見る',[], ['class' => 'text_link']) !!}
                </div>
            </div>
        </section>
    </div>

@endsection