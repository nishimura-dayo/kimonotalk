@extends('layouts.app')

@section('content')
    <div class="users container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="row">
            <div class="col-sm-3">
                <div class="personal-photo"">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                    <img src="{{ Gravatar::get($user->email, ['size' => 200]) }}">
                </div>
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

