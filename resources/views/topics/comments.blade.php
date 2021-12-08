@if (count($comments) > 0)
    <ul class="comment-list list-unstyled">
        @foreach ($comments as $comment)
           <li class="comment-list-item media py-3">
                {{-- コメント所有者のメールアドレスをもとにGravatarを取得して表示 --}}
               <div  class="user-thumbnail"><img src="{{ Gravatar::get($comment->user->email, ['size' => 120]) }}" alt=""></div>
               <div class="media-body">
                   <div>
                       {{ $comment->user->name }}
                    </div>
                    <div>
                        {{-- コメント内容 --}}  
                        <p class="mb-0">{{ $comment->content }}</p>
                        {{-- コメント日時 --}}
                        <span class="text-muted">{{ $comment->created_at }}</span>
                     </div>
                     <div class="text-right">
                        @if (Auth::id() == $comment->user_id)
                            {{-- コメント削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除する', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endif