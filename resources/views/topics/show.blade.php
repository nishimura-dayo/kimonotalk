@extends('layouts.app')

@section('content')

    <div class="topic-single">
        <h1 class="headline">トピック詳細ページ</h1>

        <section class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    {{-- トピック --}}
                    <div class="topic-detail">
                        <div class="row">
                            <div class="col-3">
                                <div class="topic-image">
                                    @if(isset( $topic->image_path ))
                                        {{-- トピック画像がある場合 --}}
                                        <img src=" {{ $topic->image_path }}" alt="">
                                    @else
                                        {{-- トピック画像がない場合 --}}
                                        <img src="{{ asset('image/no-image.png') }}" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-2">
                                        {{-- トピック所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                                        <div  class="user-thumbnail"><img src="{{ Gravatar::get($topic->user->email, ['size' => 120]) }}" alt=""></div>
                                    </div>
                                    <div class="col-10">
                                        <div>
                                            {{-- トピック所有者のユーザ詳細ページへのリンク --}}
                                            {!! link_to_route('users.show', $topic->user->name, ['user' => $topic->user->id], ['class' => 'topic-user-name']) !!}
                                        </div>
                                        {{-- トピック日時 --}}
                                        <span class="text-muted">{{ $topic->created_at }}</span>
                                    </div>
                                </div>
                                <div class="topic_content">
                                    <div class="topic_text">
                                        {{-- トピック詳細--}}
                                        {{ $topic->content }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="toolbar">
                            @if (Auth::id() == $topic->user_id)
                                {{-- トピック削除ボタンのフォーム --}}
                                {!! Form::open(['route' => ['topics.destroy', $topic->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('トピックを削除する', ['class' => 'btn btn-submit-post']) !!}
                                {!! Form::close() !!}
                            @endif
                        </div>
                    </div>
                    {{-- コメントフォーム --}}
                    @include('topics.form_comment')
                    
                    {{-- コメント一覧 --}}
                    @include('topics.comments')

                    <div  class="text-center">
                        {{-- カテゴリ別トピック一覧ページへのリンク --}}
                        {!! link_to_route('topics.index', 'トピック一覧を見る',[], ['class' => 'text_link']) !!}
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection