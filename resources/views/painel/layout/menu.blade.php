<ul>
    {{--BANNERS--}}
    <li>
        <a href='{{url('/banners')}}' alt='Banners' title='Banners'>
            <i class="fa fa-picture-o" aria-hidden="true"></i> Banners
        </a>
    </li>

    {{--BLOG--}}
    <li class='menuLabel'>
        Blog
    </li>
    {{--POST_CATEGORIES--}}
    <li>
        <a href='{{route('post_categories.index')}}' alt='Categorias Post' title='Categorias Post'>
            <i class="fa fa-list" aria-hidden="true"></i> Categorias Post
        </a>
    </li>
    {{--POSTS--}}
    <li>
        <a href='{{url('/posts')}}' title='Posts' alt='Posts' title='Posts'>
            <i class="fa fa-file-text"></i> Posts
        </a>
    </li>
</ul>