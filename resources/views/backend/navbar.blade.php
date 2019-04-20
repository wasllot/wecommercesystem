<nav class="navbar navbar-default navbar-fixed-top navbar-top">

    <div class="container-fluid">

        <div class="navbar-header">

            <button type="button" class="navbar-expand-toggle">

                <i class="fa fa-bars icon"></i>

            </button>

            <ol class="breadcrumb navbar-breadcrumb show">

                @admin

                    <li>Panel de administrador</li>

                @endadmin

                @user

                    <li>Panel de usuario</li>

                @enduser

                <li class="active">{{Auth::user()->email}}</li>

                <li class="active">

                    <a href="{{ url('fullrepuesto') }}">Volver al sitio</a>

                </li>

            </ol>

            <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">

                <i class="fa fa-th icon"></i>

            </button>

        </div>

        <ul class="nav navbar-nav navbar-right">

            <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">

                <i class="fa fa-times icon"></i>

            </button>

            <li class="dropdown profile">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{Auth::user()->name}}

                    <span class="caret"></span>
                    
                </a>

                <ul class="dropdown-menu animated fadeInDown">

                    <li>

                        <div class="profile-info">

                            <h4 class="username">{{Auth::user()->name}}</h4>

                            <p>{{Auth::user()->email}}</p>

                            <div class="btn-group margin-bottom-2x" role="group">
                                <button type="button" class="btn btn-default">
                                    <i class="fa fa-user"></i>

                                    @admin

                                        <a href="{{ url('backend/admin') }}">Perfil</a>

                                    @endadmin

                                    @user

                                        <a href="{{ url('backend/user') }}">Perfil</a>

                                    @enduser

                                </button>

                                <button type="button" class="btn btn-default">

                                    <i class="fa fa-sign-out"></i>

                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Salir

                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>

                                </button>

                            </div>

                        </div>

                    </li>

                </ul>

            </li>

        </ul>

    </div>

</nav>