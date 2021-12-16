<section class="category-list-wrap">
    <ul class='category-list'>
    @foreach ($categories as $category)
        {{-- トピックカテゴリ詳細ページへのリンク--}}
        <li class='category-list-item'>{!! link_to_route('categories.show', $category->content, ['category' => $category->id]) !!}</li>
    @endforeach
    </ul>
</section>
