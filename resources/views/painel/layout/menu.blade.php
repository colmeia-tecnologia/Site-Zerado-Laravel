<ul>
    {{--BANNERS--}}
    <li>
        <a href='{{route('banners.index')}}' alt='Banners' title='Banners'>
            <i class="fa fa-picture-o" aria-hidden="true"></i> Banners
        </a>
    </li>
    {{--PORTFOLIO--}}
    <li>
        <a href='{{url('/portfolios')}}' alt='Portifólios' title='Portifólios'>
            <i class="fa fa-camera" aria-hidden="true"></i> Portifólios
        </a>
    </li>
    {{--SERVICES--}}
    <li>
        <a href='{{route('services.index')}}' alt='Serviços' title='Serviços'>
            <i class="fa fa-wrench" aria-hidden="true"></i> Serviços
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