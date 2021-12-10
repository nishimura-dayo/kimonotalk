@extends('layouts.app')

@section('content')
    <div class="users">
        <h1 class="headline">〇〇関するトピック一覧</h1>

        <section class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    {{-- トピックフォーム --}}
                    @include('topics.form_topic')
                    {{-- トピック一覧 --}}
                    @include('topics.topics')
                </div>
            </div>
        </section>
    </div>
@endsection