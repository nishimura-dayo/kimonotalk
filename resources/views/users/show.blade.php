@extends('layouts.app')

@section('content')
    <div class="users container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="row">
            <div class="col-sm-3">
                <div class="personal-photo">
                    @if(isset( $user->image_path ))
                        {{-- プロフィール画像がある場合 --}}
                        <img src=" {{ $user->image_path }}" alt="">
                    @else
                        {{-- プロフィール画像がない場合 --}}
                        <img src="{{ asset('image/no-image.png') }}" alt="">
                    @endif
                </div>

                @if (Auth::id() == $user->id)
                    {{-- プロフィール画像編集 --}}
                    {!! Form::open(['route' => 'users.avatorUpdate','enctype'=>'multipart/form-data', 'method' => 'PUT']) !!}
                        <!-- アップロードフォームの作成 -->
                        {!! Form::file('image_path', ['class' => '']) !!}
                        {!! Form::submit('送信する', ['class' => 'btn btn-sm btn-info']) !!}
                    {!! Form::close() !!}
                @endif

                <p class="text-center">{{ $user->name }}</p>
            </div>
            <div class="col-sm-9">
                {{-- トピック一覧 --}}
                @include('topics.topics')
            </div>
        </div>
             </div>
        </div>
    </div>
@endsection

