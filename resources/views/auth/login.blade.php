@extends('layouts.app')

@section('content')
    <div class="login">
        <h1 class="headline">ログイン</h1>
        
        <section class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div class="form-wrap">
                        
                        {{-- エラーメッセージ --}}
                        @include('commons.error_messages')
        
                        {!! Form::open(['route' => 'login.post']) !!}
                            <div class="form-group">
                                {!! Form::label('email', 'メールアドレス') !!}
                                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            </div>
            
                            <div class="form-group">
                                {!! Form::label('password', 'パスワード') !!}
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                            </div>
                            {!! Form::submit('ログインする', ['class' => 'btn-submit']) !!}
                        {!! Form::close() !!}
                        </div>

                    {{-- ユーザ登録ページへのリンク --}}
                    <p class="form-notice">アカウントを持っていませんか → {!! link_to_route('signup.get', 'ユーザ登録') !!}</p>                        
                        
                </div>
            </div>
        </section>
    </div>
@endsection