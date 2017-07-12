<ul>
    {{--Posts--}}
    <li class='menuLabel'>
        Blog
    </li>
    <li>
        <a href='{{route('post_categories.index')}}' alt='Categorias Post' title='Categorias Post'>
            <i class="fa fa-list" aria-hidden="true"></i> Categorias Post
        </a>
    </li>
    <li>
        <a href='{{url('/posts')}}' title='Posts' alt='Posts' title='Posts'>
            <i class="fa fa-file-text"></i> Posts
        </a>
    </li>
</ul>