@if (count($comments) > 0)
    <ul>
        @foreach ($comments as $comment)
           <li class="media mb-3">
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
                </div>
            </li>
        @endforeach
    </ul>
@endif