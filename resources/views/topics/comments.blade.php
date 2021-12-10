@if (count($comments) > 0)
    <ul class="comment-list list-unstyled">
        @foreach ($comments as $comment)
           <li class="comment-list-item media">
                {{-- コメント所有者のメールアドレスをもとにGravatarを取得して表示 --}}
               <div  class="user-thumbnail"><img src="{{ Gravatar::get($comment->user->email, ['size' => 120]) }}" alt=""></div>
               <div class="media-body">
                   <div>
                       {{ $comment->user->name }}
                    </div>
                    <div>
                        {{-- コメント内容 --}}  
                        <p class="comment-list-text">{{ $comment->content }}</p>
                        {{-- コメント日時 --}}
                        <span class="comment-list-time">{{ $comment->created_at }}</span>
                    </div>
                     
                    @if (Auth::id() == $comment->user_id)
                        <div class="toolbar">
                            {{-- コメント削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}
                                {!! Form::submit('コメントを削除する', ['class' => 'btn btn-submit-post']) !!}
                            {!! Form::close() !!}
                        </div>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
@endif