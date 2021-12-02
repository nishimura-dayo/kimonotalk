
    <ul class="list-unstyled">
        @foreach ($topics as $topic)
            <li class="media mb-3">
                {{-- トピック所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                <div  class="user-thumbnail"><img src="{{ Gravatar::get($topic->user->email, ['size' => 120]) }}" alt=""></div>
                
                <div class="media-body">
                    <div>
                        {{-- トピック所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $topic->user->name, ['user' => $topic->user->id]) !!}
                        <span class="text-muted">{{ $topic->created_at }}</span>
                    </div>
                    <div>
                        {{-- 投稿内容 --}}
                        <p class="mb-0">{!! nl2br(e($topic->content)) !!}</p>
                    </div>
                    <div>
                        @if (Auth::id() == $topic->user_id)
                            {{-- トピック削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['topics.destroy', $topic->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除する', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $topics->links() }}
