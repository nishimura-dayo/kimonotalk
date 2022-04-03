{{-- エラーメッセージ --}}
@include('commons.error_messages')

{!! Form::open(['route' => 'topics.store','enctype'=>'multipart/form-data']) !!}
    <div class="form-graup">
        {!! Form::textarea('content', null, ['class' => 'form-textarea', 'rows' => '3', 'placeholder' => '気になることを書いてみてね♪']) !!}

        <div class="view_box"></div>

        <div class="toolbar">
            {{-- アップロードフォームの作成--}}
            <label for="file" class="label-photo"><i class="fas fa-camera"></i></label>
            {!! Form::file('image_path', ['id' => 'file', 'class' => 'input-photo']) !!}
            @csrf
            {{ Form::hidden('category_id', $category->id) }}
            {!! Form::submit('トピックを投稿する', ['class' => 'btn btn-submit-post']) !!}
        </div>
    </div>
{!! Form::close() !!}