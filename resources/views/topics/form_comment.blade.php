{{-- エラーメッセージ --}}
@include('commons.error_messages')

{!! Form::open(['route' => 'comments.store']) !!}
    <div class="form-graup">
        {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '2', 'placeholder' => 'コメントしてみる？']) !!}
        {{ Form::hidden('topic_id', $topic->id) }}
        <div class="toolbar">
            {!! Form::submit('コメントを投稿する', ['class' => 'btn btn-submit-post']) !!}
        </div>
    </div>
{!! Form::close() !!}
