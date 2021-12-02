@extends('layouts.app')

@section('content')
    <div class="users container">
        <div class="row">
            <div class="col-sm-4">
                {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="" src="{{ Gravatar::get($user->email, ['size' => 200]) }}">
                <p>{{ $user->name }}</p>
            </div>
            <div class="col-sm-8">
                {{-- トピック一覧 --}}
                @include('topics.topics')
            </div>
        </div>
    </div>
@endsection

