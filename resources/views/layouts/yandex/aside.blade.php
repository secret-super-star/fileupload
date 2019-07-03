<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <div class="text-center mx-auto">
      <p class="app-sidebar__user-name">{{Auth::user()->name}}</p>
    </div>
  </div>
  <ul class="app-menu">
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Dashboard</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item " href="{{ route('dashboard') }}"><i class="icon fa fa-dashboard"></i> Upload Dashboard</a></li>
        <li><a class="treeview-item {{ (request()->is('yandex')) ? 'active' : '' }}" href="{{ route('yandex') }}"><i class="icon fa fa-dashboard"></i> Yandex Dashboard</a></li>
      </ul>
    </li>
    <li><a class="app-menu__item {{ (request()->is('generate')) ? 'active' : '' }}" href="{{route('generate')}}"><i class="app-menu__icon fa fa-upload"></i><span class="app-menu__label">Generate Link</span></a></li>
  </ul>
</aside>
