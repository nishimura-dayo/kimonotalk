@extends('layouts.app')

@section('content')
    <div class="users container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="row">
            <div class="col-sm-3">
                <div class="profile">
                    <div class="profile-photo">
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
                            {{-- アップロードフォームの作成--}}
                            <label for="file" class="label-photo profile-label-photo"><i class="fas fa-camera"></i></label>
                            {!! Form::file('image_path', ['id' => 'file', 'class' => 'input-photo']) !!}
                            {!! Form::submit('変更', ['class' => 'btn profile-photo-submit']) !!}
                        {!! Form::close() !!}
                    @endif
                    
                    <p class="profile-name">{{ $user->name }}</p>
                </div>
            </div>
            <div class="col-sm-9">
                {!! link_to_route('categories.index', 'トピック一覧を見る', [], ['class'=> "btn-category"] ) !!}
                {{-- トピック一覧 --}}
                @include('topics.topics')
            </div>
        </div>
             </div>
        </div>
    </div>
@endsection

