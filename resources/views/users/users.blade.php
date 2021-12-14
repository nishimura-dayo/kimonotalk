@if (count($users) > 0)
    <ul class="user-list">
        @foreach ($users as $user)
            <li class="user-list-item">
                {{-- ユーザ詳細ページへのリンク --}}
                 <a href="{{ route('users.show', ['user' => $user->id]) }}" class="user-list-item-link">
                <div class="user-thumbnail">
                    @if(isset( $user->image_path ))
                        {{-- プロフィール画像がある場合 --}}
                        <img src=" {{ $user->image_path }}" alt="">
                    @else
                        {{-- プロフィール画像がない場合 --}}
                        <img src="{{ asset('image/no-image.png') }}" alt="">
                    @endif
                </div>

                <div class="user-text">
                    <div>{{ $user->name }}</div>
                </div>
                </a>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $users->links() }}
@endif