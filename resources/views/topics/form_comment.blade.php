{{-- エラーメッセージ --}}
@include('commons.error_messages')

{!! Form::open(['route' => 'comments.store']) !!}
    <div class="form-graup">
        {!! Form::textarea('content', null, ['class' => 'form-textarea', 'rows' => '2', 'placeholder' => 'コメントしてみる？']) !!}
        {{ Form::hidden('topic_id', $topic->id) }}
        <div class="toolbar">
            <!-- アップロードフォームの作成 -->
            {!! Form::file('image_path', ['class' => 'btn btn-upload']) !!}
            @csrf
            {!! Form::submit('コメントを投稿する', ['class' => 'btn btn-submit-post']) !!}
        </div>
    </div>
{!! Form::close() !!}
