@if (count($topics) > 0)
    <ul class="topic-list list-unstyled">
        @foreach ($topics as $topic)
            <li class="topic-list-item">
                {{-- トピック詳細ページへのリンク --}}
                 <a href="{{ route('topics.show', ['topic' => $topic->id]) }}" class="topic-list-item-link">
                    <div class="topic-list-item-photo">
                        <div class="topic-thumbnail">
                            @if(isset( $topic->image_path ))
                                {{-- トピック画像がある場合 --}}
                                <img src=" {{ $topic->image_path }}" alt="">
                            @else
                                {{-- トピック画像がない場合 --}}
                                <img src="{{ asset('image/no-image.png') }}" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="topic-list-item-main">
                        {{-- トピック内容 --}}
                        <div class="topic-list-text">{!! nl2br(($topic->content)) !!}</div>
                        {{-- トピック日時 --}}
                        <span class="topic-list-time">{{ $topic->created_at }}</span>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
@endif

{{-- ページネーションのリンク --}}
{{ $topics->links() }}