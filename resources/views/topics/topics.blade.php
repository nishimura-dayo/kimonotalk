 @if (count($topics) > 0)
    <ul class="list-unstyled">
        @foreach ($topics as $topic)
            <li class="media mb-3">
                {{-- トピック詳細ページへのリンク --}}
                {{-- {!! link_to_route('topics.show', $topic->id, ['topic' => $topic->id]) !!} --}}

                {{-- トピック所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                <div  class="user-thumbnail"><img src="{{ Gravatar::get($topic->user->email, ['size' => 120]) }}" alt=""></div>

                <div class="media-body">
                    <div>
                        {{-- トピック所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $topic->user->name, ['user' => $topic->user->id], ['class' => 'text_link']) !!}
                    </div>
                    <div>
                        {{-- トピック詳細ページへのリンク --}}
                        <a href="{{ route('topics.show', ['topic' => $topic->id]) }}" class="topic_link">
                            {{-- トピック内容 --}}
                            <p class="mb-0">{!! nl2br(e($topic->content)) !!}</p>
                            {{-- トピック日時 --}}
                            <span class="text-muted">{{ $topic->created_at }}</span>
                        </a>
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
 @endif
{{-- ページネーションのリンク --}}
{{ $topics->links() }}
