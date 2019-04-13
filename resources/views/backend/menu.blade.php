@admin
    @component('backend.link')
    @slot('link'){{ url('backend/admin') }}@endslot
    @slot('icon')icon fa fa-tachometer @endslot
    @slot('name')Dashboard @endslot
    @endcomponent
    @component('backend.link')
    @slot('link'){{ url('backend/articles') }}@endslot
    @slot('icon')icon fa fa-pencil-square-o @endslot
    @slot('name')Custom Table @endslot
    @endcomponent
    @component('backend.link')
    @slot('link'){{ url('backend/users') }}@endslot
    @slot('icon')icon fa fa-user @endslot
    @slot('name')Usuarios @endslot
    @endcomponent
    @component('backend.link')
    @slot('link'){{ url('backend/orders') }}@endslot
    @slot('icon')icon fa fa-shopping-cart @endslot
    @slot('name')Órdenes @endslot
    @endcomponent
    @component('backend.link')
    @slot('link'){{ url('backend/questions') }}@endslot
    @slot('icon')icon fa fa-question @endslot
    @slot('name')Preguntas @endslot
    @endcomponent    
    @component('backend.link')
    @slot('link'){{ url('backend/messages') }}@endslot
    @slot('icon')icon fa fa-envelope @endslot
    @slot('name')Mensajes @endslot
    @endcomponent
    @component('backend.link')
    @slot('link'){{ url('backend/brands') }}@endslot
    @slot('icon')icon fa fa-th-large @endslot
    @slot('name')Marcas @endslot
    @endcomponent
    @component('backend.link')
    @slot('link'){{ url('backend/category') }}@endslot
    @slot('icon')icon fa fa-list @endslot
    @slot('name')Categorías @endslot
    @endcomponent
    @component('backend.link')
    @slot('link'){{ url('backend/subcategory') }}@endslot
    @slot('icon')icon fa fa-list-alt @endslot
    @slot('name')Subcategorías @endslot
    @endcomponent    
    @component('backend.dropdown')
    {!! Helper::setActive('products') !!}
    @slot('link'){{ url('backend/products') }}@endslot
    @slot('m_icon')icon fa fa-table @endslot
    @slot('m_name')Catálogo @endslot
    @slot('s_icon')icon fa fa-pencil-square-o @endslot
    @slot('s_name')Editar productos @endslot
    @endcomponent
@endadmin
@user
    @component('backend.link')
    @slot('link'){{ url('backend/user') }}@endslot
    @slot('icon')icon fa fa-tachometer @endslot
    @slot('name')Panel de usuario @endslot
    @endcomponent
    @component('backend.link')
    @slot('link'){{ url('backend/profile') }}@endslot
    @slot('icon')icon fa fa-eye @endslot
    @slot('name')Perfil @endslot
    @endcomponent
    @component('backend.link')
    @slot('link'){{ url('backend/user-orders') }}@endslot
    @slot('icon')icon fa fa-money @endslot
    @slot('name')Mis órdenes @endslot
    @endcomponent    
    @component('backend.link')
    @slot('link'){{ url('backend/user-messages') }}@endslot
    @slot('icon')icon fa fa-envelope @endslot
    @slot('name')Mensajes @endslot
    @endcomponent    
    @component('backend.link')
    @slot('link'){{ url('backend/my-questions') }}@endslot
    @slot('icon')icon fa fa-question @endslot
    @slot('name')Mis preguntas @endslot
    @endcomponent
@enduser