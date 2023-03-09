<nav id="sidebar">
    <div id="main-menu">
        <ul class="sidebar-nav center">
            @if(Auth::user()->isAdmin())
                <ul>
                    <li id="theme_list">
                        <a id="theme_select" class="select-center" data-toggle="modal" data-target="#exampleModal" href="#">
                            @if (empty(Auth::user()->currentEntity))
                                Seleccionar organización ...
                            @else
                                {{ Auth::user()->currentEntity->name }}
                            @endif
                        </a>
                        <a id="theme_select_caret" class="select-center" data-toggle="modal" data-target="#exampleModal" href="#"></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
                <hr class="divider m-t-0 m-b-0">
                @if(Auth::user()->current_entity == null)
                    <li class="{{ (str_contains(Route::currentRouteName(), 'dashboard.')) ? 'current active':'' }}">
                        <a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i><span class="sidebar-text">Inicio</span></a>
                    </li>
                    <li class="{{ (str_contains(Route::currentRouteName(), 'access.')) ? 'current active':'' }}">
                        <a href="{{ route('admin.access.index') }}"><i class="fa fa-lock"></i><span class="sidebar-text">Accesos</span></a>
                    </li>
                    <li class="{{ (str_contains(Route::currentRouteName(), 'entities.')) ? 'current active':'' }}">
                        <a href="{{ route('admin.entities.index') }}"><i class="fa fa-building"></i><span class="sidebar-text">Entidades</span></a>
                    </li>
                    {{--<li class="{{ (str_contains(Route::currentRouteName(), 'prices-ranges.')) ? 'current active':'' }}">--}}
                        {{--<a href="{{ route('admin.prices-ranges.index') }}"><i class="fa fa-dollar"></i><span class="sidebar-text">Tarifas</span></a>--}}
                    {{--</li>--}}
                    <li class="hasSub {{ (str_contains(Route::currentRouteName(), 'invoices.')) ? 'current active':'' }}">
                        <a href="{{ route('admin.invoices.index') }}"><i class="fa fa-list-alt"></i><span class="sidebar-text">Gestión comercial</span></a>
                        <ul class="submenu collapse">
                          <li class="{{(str_contains(Route::currentRouteName(), 'invoices.index')) ? 'current active' : ''}}">
                            <a href="{{route('admin.invoices.index')}}"><i class="fa fa-list"></i><span class="sidebar-text">Listado</span></a>
                          </li>
                          <li class="{{(str_contains(Route::currentRouteName(), 'traders.') ? 'current active' : '')}}">
                            <a href="{{route('admin.invoices.traders.index')}}"><i class="fa fa-user"></i><span class="sidebar-text">Comerciales</span></a>
                          </li>
                        <li class="{{(str_contains(Route::currentRouteName(), 'cross-sale.') ? 'current active' : '')}}">
                            <a href="{{route('admin.invoices.cross-sale.index')}}"><i class="fa fa-arrows"></i><span class="sidebar-text">Venta Cruzada</span></a>
                        </li>
                        </ul>
                    </li>
                    {{--<li class="{{ (str_contains(Route::currentRouteName(), 'cross-sale.')) ? 'current active':'' }}">--}}
                        {{--<a href="{{ route('admin.cross-sale.index') }}"><i class="fa fa-crosshairs"></i><span class="sidebar-text">Venta cruzada</span></a>--}}
                    {{--</li>--}}
                @endif
            @endif

            @if(Auth::user()->isAdmin() && Auth::user()->current_entity != null || !Auth::user()->isAdmin())
                    <li class="{{ (str_contains(Route::currentRouteName(), 'dashboard.')) ? 'current active':'' }}">
                        <a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i><span class="sidebar-text">Inicio</span></a>
                    </li>
                    <li class="hasSub {{ (str_contains(Route::currentRouteName(), 'setup.')) ? 'current active':'' }}">
                        <a href="#">
                            <i class="fa fa-cogs"></i>
                            <span class="sidebar-text">Configuración</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="submenu collapse">
                            <li class="{{ str_contains(Route::currentRouteName(), 'setup.data') ? 'current active':'' }}">
                                <a href="{{ route('setup.data.index') }}"><i class="fa fa-pencil-square-o"></i><span class="sidebar-text">Entidad</span></a>
                            </li>
                            <li class="{{ str_contains(Route::currentRouteName(), 'setup.users') ? 'current active':'' }}">
                                <a href="{{ route('setup.users.index') }}"><i class="fa fa-users"></i><span class="sidebar-text">Usuarios App</span></a>
                            </li>
                            {{--<li class="{{ str_contains(Route::currentRouteName(), 'setup.app') ? 'current active':'' }}">--}}
                                {{--<a href="{{ route('setup.app.index') }}"><i class="fa fa-pencil-square-o"></i><span class="sidebar-text">Configurador App</span></a>--}}
                            {{--</li>--}}
                        </ul>
                    </li>
                    <li class="hasSub {{ (str_contains(Route::currentRouteName(), 'events.')) ? 'current active':'' }}">
                        <a href="#">
                            <i class="fa fa-calendar"></i>
                            <span class="sidebar-text">Notificaciones</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="submenu collapse">
                            <?php
                                $previous = session('event_previous');
                                $route = (empty($previous) || $previous[0] == 'listado') ? '.list'  : '.calendar';
                            ?>
                            <li class="{{ (str_contains(Route::currentRouteName(), 'calendar.') || str_contains(Route::currentRouteName(), 'events.') && !str_contains(Route::currentRouteName(), 'list.') && $route == '.calendar') ? 'current active':'' }}">
                                <a href="{{ route('events.calendar.index') }}"><i class="fa fa-calendar-o"></i><span class="sidebar-text">Calendario</span></a>
                            </li>
                            <li class="{{ (str_contains(Route::currentRouteName(), 'list.') || str_contains(Route::currentRouteName(), 'events.') && !str_contains(Route::currentRouteName(), 'calendar.') && $route == '.list') ? 'current active':'' }}">
                                <a href="{{ route('events.list.index') }}"><i class="fa fa-list-ol"></i><span class="sidebar-text">Listado</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ (str_contains(Route::currentRouteName(), 'polls.')) ? 'current active':'' }}">
                        <a href="{{ route('polls.index') }}"><i class="fa fa-pencil-square-o"></i><span class="sidebar-text">Encuestas</span></a>
                    </li>
                    <li class="hasSub {{ (str_contains(Route::currentRouteName(), 'stats.')) ? 'current active':'' }}">
                        <a href="#">
                            <i class="fa fa-bar-chart-o"></i>
                            <span class="sidebar-text">Estadísticas</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="submenu collapse">
                            <li class="{{ str_contains(Route::currentRouteName(), 'stats.entity.') ? 'current active':'' }}">
                                <a href="{{ route('stats.entity.index') }}"><i class="fa fa-list-ol"></i><span class="sidebar-text">Por entidad</span></a>
                            </li>
                            <li class="{{ str_contains(Route::currentRouteName(), 'stats.poll.') ? 'current active':'' }}">
                                <a href="{{ route('stats.poll.index') }}"><i class="fa fa-list-ol"></i><span class="sidebar-text">Por encuesta</span></a>
                            </li>
                            <li class="{{ str_contains(Route::currentRouteName(), 'stats.event.')  ? 'current active':'' }}">
                                <a href="{{ route('stats.event.index') }}"><i class="fa fa-list-ol"></i><span class="sidebar-text">Por notificación</span></a>
                            </li>
                        </ul>
                    </li>
            @endif
        </ul>
    </div>
</nav>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="{{ route('dashboard.change-company') }}">
        {{ csrf_field() }}
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleccionar organización</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('partials.plugins.autocomplete')
                @include('partials.forms.autocomplete',
                ['label' => 'Organizaciones', 'name' => 'entity_id', 'value_id' => Auth::user()->currentEntity->id ?? 'null', 'value_text' => Auth::user()->currentEntity->name ?? '',
                'required' => false, 'placeholder' => 'Comienza a escribir para recibir sugerencias...', 'url' => route('dashboard.entities'),
                'onSelect' => '$caller.parents(".modal-content").first().find(".btn-primary").first().prop("disabled",false)'
                ])
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button disabled type="submit" class="btn btn-primary">Seleccionar</button>
            </div>
        </div>
    </div>
    </form>
</div>
