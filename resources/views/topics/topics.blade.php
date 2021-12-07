@if (count($topics) > 0)
    <ul class="list-unstyled">
        @foreach ($topics as $topic)
            <li class="py-3 border-bottom">
                {{-- トピック詳細ページへのリンク --}}
                 <a href="{{ route('topics.show', ['topic' => $topic->id]) }}" class="row">
                    <div class="col-2 topic-thumbnail">
                        トピック画像
                    </div>
                    <div class="col-10">
                        {{-- トピック内容 --}}
                        <p class="mb-0">{!! nl2br(($topic->content)) !!}</p>
                        {{-- トピック日時 --}}
                        <span class="text-muted">{{ $topic->created_at }}</span>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
@endif
    {{-- ページネーションのリンク --}}
    {{ $topics->links() }}