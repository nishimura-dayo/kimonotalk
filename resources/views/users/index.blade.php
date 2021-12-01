@extends('layouts.app')

@section('content')
    <div class="users">
        <h1 class="headline">ユーザ一覧</h1>

        <section class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    {{-- ユーザ一覧 --}}
                    @include('users.users')
                </div>
            </div>
        </section>
    </div>
@endsection