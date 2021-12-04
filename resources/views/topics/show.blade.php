@extends('layouts.app')

@section('content')

    <div class="users">
        <h1 class="headline">id= {{ $topic->id }} トピック詳細ページ</h1>

        <section class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    {{ $topic->content }}
                </div>
            </div>
        </section>
    </div>

@endsection