{{-- エラーメッセージ --}}
@include('commons.error_messages')

{!! Form::open(['route' => 'topics.store','enctype'=>'multipart/form-data']) !!}
    <div class="form-graup">
        {!! Form::textarea('content', null, ['class' => 'form-textarea', 'rows' => '3', 'placeholder' => '気になることを書いてみてね♪']) !!}
        <div class="toolbar">
            <!-- アップロードフォームの作成 -->
            {!! Form::file('image_path', ['class' => 'btn btn-upload']) !!}
            @csrf
            {!! Form::submit('トピックを投稿する', ['class' => 'btn btn-submit-post']) !!}
        </div>
    </div>
{!! Form::close() !!}