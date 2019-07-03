<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <div class="text-center mx-auto">
      <p class="app-sidebar__user-name">{{Auth::user()->name}}</p>
    </div>
  </div>
  <ul class="app-menu">
    <li><a class="app-menu__item {{ (request()->is('yandex')) ? 'active' : '' }}" href="{{route('yandex')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
    <li><a class="app-menu__item {{ (request()->is('generate')) ? 'active' : '' }}" href="{{route('generate')}}"><i class="app-menu__icon fa fa-upload"></i><span class="app-menu__label">Generate Link</span></a></li>
  </ul>
</aside>
