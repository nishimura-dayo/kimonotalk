{{-- エラーメッセージ --}}
@include('commons.error_messages')

{!! Form::open(['route' => 'comments.store','enctype'=>'multipart/form-data']) !!}
    <div class="form-graup">
        {!! Form::textarea('content', null, ['class' => 'form-textarea', 'rows' => '2', 'placeholder' => 'コメントしてみる？']) !!}
        {{ Form::hidden('topic_id', $topic->id) }}
        <div class="toolbar">
            {{-- アップロードフォームの作成--}}
            <label for="file" class="label-photo"><i class="fas fa-camera"></i></label>
            {!! Form::file('image_path', ['id' => 'file', 'class' => 'input-photo']) !!}
            @csrf
            {!! Form::submit('コメントを投稿する', ['class' => 'btn btn-submit-post']) !!}
        </div>
    </div>
{!! Form::close() !!}
