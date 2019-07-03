<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <div class="text-center mx-auto">
      <p class="app-sidebar__user-name">{{Auth::user()->name}}</p>
    </div>
  </div>
  <ul class="app-menu">
    <li><a class="app-menu__item {{ (request()->is('dashboard')) ? 'active' : '' }}" href="{{route('dashboard')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
    @if(Auth::user()->role_id == 1)
      <li><a class="app-menu__item {{ (request()->is('settings  ')) ? 'active' : '' }}" href="{{route('settings')}}"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Settings</span></a></li>
      <li><a class="app-menu__item {{ (request()->is('users')) ? 'active' : '' }}" href="{{route('users')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Users</span></a></li>
    @endif
    <li><a class="app-menu__item {{ (request()->is('upload')) ? 'active' : '' }}" href="{{route('upload')}}"><i class="app-menu__icon fa fa-upload"></i><span class="app-menu__label">Upload video</span></a></li>
  </ul>
</aside>
