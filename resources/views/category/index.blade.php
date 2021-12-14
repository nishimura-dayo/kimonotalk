@extends('layouts.app')

@section('content')
    <div class="users">
        <h1 class="headline">トピックカテゴリ一覧</h1>

        <section class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <ul>
                        
                    @foreach ($categories as $category)
                        {{-- トピックカテゴリ詳細ページへのリンク--}}
                        <li>{!! link_to_route('category.show', $category->content, ['category' => $category->id]) !!}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </section>
    </div>
@endsection