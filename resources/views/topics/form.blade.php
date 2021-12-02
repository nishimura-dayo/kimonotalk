{!! Form::open(['route' => 'topics.store']) !!}
    <div class="form-graup">
        {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '2']) !!}
        {!! Form::submit('トピックを投稿する', ['class' => 'btn btn-primary btn-block']) !!}
    </div>
{!! Form::close() !!}