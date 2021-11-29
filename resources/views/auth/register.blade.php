@extends('layouts.app')

@section('content')
    <div class="signup">
        <h1 class="headline">ユーザ登録</h1>
        
        <section class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div class="form-wrap">
                        
                        {{-- エラーメッセージ --}}
                        @include('commons.error_messages')
        
                        {!! Form::open(['route' => 'signup.post']) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'お名前') !!}
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
            
                            <div class="form-group">
                                {!! Form::label('email', 'メールアドレス') !!}
                                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            </div>
            
                            <div class="form-group">
                                {!! Form::label('password', 'パスワード') !!}
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                            </div>
            
                            <div class="form-group">
                                {!! Form::label('password_confirmation', '確認用パスワード') !!}
                                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                            </div>
            
                            {!! Form::submit('登録する', ['class' => 'btn-submit']) !!}
                        {!! Form::close() !!}
                        </div>
                </div>
            </div>
        </section>
    </div>
@endsection