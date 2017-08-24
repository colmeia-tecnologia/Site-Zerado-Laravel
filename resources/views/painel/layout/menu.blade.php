<ul>
    {{--BANNERS--}}
    @can('view-banners')
        <li>
            <a href='{{route('banners.index')}}' alt='Banners' title='Banners'>
                <i class="fa fa-picture-o" aria-hidden="true"></i> Banners
            </a>
        </li>
    @endcan
    {{--PORTFOLIO--}}
    @can('view-portfolios')
        <li>
            <a href='{{url('/portfolios')}}' alt='Portifólios' title='Portifólios'>
                <i class="fa fa-camera" aria-hidden="true"></i> Portifólios
            </a>
        </li>
    @endcan
    {{--SERVICES--}}
    @can('view-services')
        <li>
            <a href='{{route('services.index')}}' alt='Serviços' title='Serviços'>
                <i class="fa fa-wrench" aria-hidden="true"></i> Serviços
            </a>
        </li>
    @endcan
    {{--CLIENTS--}}
    @can('view-services')
        <li>
            <a href='{{route('clients.index')}}' alt='Clientes' title='Clientes'>
                <i class="fa fa-users" aria-hidden="true"></i> Clientes
            </a>
        </li>
    @endcan
    {{--Users--}}
    @can('view-users')
        <li>
            <a href='{{route('users.index')}}' alt='Usuários' title='Usuários'>
                <i class="fa fa-user" aria-hidden="true"></i> Usuários
            </a>
        </li>
    @endcan
    {{--Users--}}
    <li>
        <a href='{{url('/users/'.Auth::user()->id.'/edit')}}' alt='Meus dados' title='Meus dados'>
            <i class="fa fa-user" aria-hidden="true"></i> Meus dados
        </a>
    </li>

    {{--BLOG--}}
    <li class='menuLabel'>
        Blog
    </li>
    {{--POST_CATEGORIES--}}
    @can('view-post_categories')
        <li>
            <a href='{{route('post_categories.index')}}' alt='Categorias Post' title='Categorias Post'>
                <i class="fa fa-list" aria-hidden="true"></i> Categorias Post
            </a>
        </li>
    @endcan
    {{--POSTS--}}
    @can('view-posts')
        <li>
            <a href='{{url('/posts')}}' title='Posts' alt='Posts' title='Posts'>
                <i class="fa fa-file-text"></i> Posts
            </a>
        </li>
    @endcan
</ul>