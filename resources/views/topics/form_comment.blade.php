{{-- エラーメッセージ --}}
@include('commons.error_messages')

{!! Form::open(['route' => 'comments.store']) !!}
    <div class="form-graup mb-3">
        {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '2']) !!}
        {{ Form::hidden('topic_id', $topic->id) }}     
        {!! Form::submit('コメントする', ['class' => 'btn btn-primary btn-block']) !!}
    </div>
{!! Form::close() !!}