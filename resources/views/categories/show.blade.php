@extends('layouts.app')

@section('content')
    <h1 class="category-headline">{{ $category->content }}<span class="category-headline-suffix">に関するトピック</span></h1>

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
@endsection