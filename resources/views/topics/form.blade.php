{{-- エラーメッセージ --}}
@include('commons.error_messages')

{!! Form::open(['route' => 'topics.store','enctype'=>'multipart/form-data']) !!}
    <div class="form-graup">
        {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '2']) !!}
        <!-- アップロードフォームの作成 -->
        {!! Form::file('image_path') !!}
        @csrf
        {!! Form::submit('トピックを投稿する', ['class' => 'btn btn-primary btn-block']) !!}
    </div>
{!! Form::close() !!}