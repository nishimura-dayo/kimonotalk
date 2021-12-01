@if (count($users) > 0)
    <ul class="user-list">
        @foreach ($users as $user)
            <li class="user-list-item">
                {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                <div  class="user-thumbnail"><img src="{{ Gravatar::get($user->email, ['size' => 120]) }}" alt=""></div>
                <div class="user-text">
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $user->name, ['user' => $user->id]) !!}
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $users->links() }}
@endif