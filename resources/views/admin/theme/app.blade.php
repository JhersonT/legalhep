<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Administracion LegalHelp</title>
</head>
@extends('admin.theme.style')
<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>      
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg" id="btn_notification"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
            <span class="badge headerBadge2">
              {{auth()->user()->unreadNotifications->count()}} </span> </a>
          <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
            <div class="dropdown-header">
              Notificaciones
              <div class="float-right">
              </div>
            </div>
            <div class="dropdown-list-content dropdown-list-icons">
              @forelse ( auth()->user()->unreadNotifications as $not)
              <router-link to="/admin/detalle/consulta/{{$not->data["consulta"]}}" class="dropdown-item dropdown-item-unread" id="consulta"> <span class="dropdown-item-icon bg-primary text-white"><i class="far
                fa-user"></i>
          </span> <span class="dropdown-item-desc">{{$not->data["name"]}} a creado una nueva consulta <span class="time">{{$not->created_at->diffForHumans()}}</span>
          </span>
        </router-link>
              @empty
              <a href="#" class="dropdown-item dropdown-item-unread"><span class="dropdown-item-desc">No Hay notificaciones
          </span>
        </a>
              @endforelse
            </div>
            <div class="dropdown-footer text-center">
              <a href="#">View All <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
        </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{asset("admin/img/user.png")}}"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">LegalpHelp</div>
              <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item has-icon text-danger d-flex align-items-center"> <i class="fas fa-sign-out-alt"></i>
                  Cerrar Sesión
                </button>
              </form>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <div id="app">
          <aside id="sidebar-wrapper">
            <div class="sidebar-user">
              <div class="sidebar-user-picture">
                <img alt="image" src="{{asset("admin/img/userbig.png")}}">
              </div>
              <div class="sidebar-user-details">
                <div class="user-name">{{auth()->user()->name}}</div>
                <div class="user-role">{{ auth()->user()->getRoleNames()["0"]?auth()->user()->getRoleNames()["0"] !== "Admin"? auth()->user()->getRoleNames()["0"]: "Administrador" : "" ;}}</div>
              </div>
            </div>
            <ul class="sidebar-menu">
              {{-- <li class="menu-header">Main</li> --}}
             {{--  <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i data-feather="user"></i><span>Administradores</span></a>
                <ul class="dropdown-menu">
                  <li><router-link class="nav-link" to="/admin/create/cliente">Crear Usuario</router-link></li>
                  <li><a class="nav-link" href="index2.html">Datos Nutricionales</a></li>
                  <li><a class="nav-link" href="index2.html">Plan Nutricional</a></li>
                </ul>
              </li> --}}
              @can('admin.documento')
              <li class="dropdown">
                <router-link to="/admin/clientes" class="nav-link has-dropdown"><i data-feather="folder"></i><span>Dashboard</span></router-link>
              </li>
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i data-feather="folder"></i><span>Documentos</span></a>
                <ul class="dropdown-menu">
                  <li><router-link class="nav-link" to="/admin/create/expediente">Crear Expediente</router-link></li>
                </ul>
              </li>
              @endcan
              @can('admin.categorias')
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i data-feather="folder"></i><span>Categorias</span></a>
                <ul class="dropdown-menu">
                  <li><router-link class="nav-link" to="/admin/create/categoria">Crear Categoria</router-link></li>
                  <li><router-link class="nav-link" to="/admin/show/categorias">Listar Categorias</router-link></li>
                  <li><router-link class="nav-link" to="/admin/create/subcategoria">Crear Sub Categoria</router-link></li>
                  <li><router-link class="nav-link" to="/admin/show/subcategorias">Listar Sub Categorias</router-link></li>
                  <li><router-link class="nav-link" to="/admin/create/categoria/servicio">Crear Servicio</router-link></li>
                  <li><router-link class="nav-link" to="/admin/show/categoria/servicios">Lista de Servicios</router-link></li>
                </ul>
              </li>
              @endcan
              @can('admin.enlaces')
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i data-feather="link"></i><span>Enlaces</span></a>
                <ul class="dropdown-menu">
                  <li><router-link class="nav-link" to="/admin/create/enlace">Crear Enlace</router-link></li>
                  <li><router-link class="nav-link" to="/admin/show/enlaces" >Lista de Enlaces</router-link></li>
     
                </ul>
              </li>
              @endcan
              @can('admin.abogados')
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i data-feather="briefcase"></i><span>Abogados</span></a>
                <ul class="dropdown-menu">
                  <li><router-link class="nav-link" to="/admin/create/abogado">Crear Abogado</router-link></li>
                  <li><router-link class="nav-link" to="/admin/show/abogados">Gestionar Abogados</router-link></li>
                </ul>
              </li>
              @endcan
              @can('admin.clientes')
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i data-feather="user-plus"></i><span>Clientes</span></a>
                <ul class="dropdown-menu">
                  <li><router-link class="nav-link" to="/admin/show/clientes">Registro de Clientes</router-link></li>
                </ul>
              </li>
              @endcan
              @can('admin.consultas')
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i data-feather="clipboard"></i><span>Consultas</span></a>
                <ul class="dropdown-menu">
                  <li><router-link class="nav-link" to="/admin/show/consultas">Registro de Consultas</router-link></li>
                </ul>
              </li>
              @endcan
              @can('admin.calendario')
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i data-feather="calendar"></i><span>Calendario</span></a>
                <ul class="dropdown-menu">
                  <li id="btn_calendario"><router-link class="nav-link" to="/admin/show/calendario" >Registro de Eventos</router-link></li>
                  <li><router-link class="nav-link" to="/admin/create/evento">Crear Eventos</router-link></li>
                  <li><router-link class="nav-link" to="/admin/show/eventos">Administrar Eventos</router-link></li>
                </ul>
              </li>
              @endcan
              @can('admin.servicios')
              <li class="menu-header">Servicios</li>
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i data-feather="settings"></i><span>Cupones</span></a>
                <ul class="dropdown-menu">
                  <li><router-link class="nav-link" to="/admin/create/cupon">Crear Cupón</router-link></li>
                  <li><router-link class="nav-link" to="/admin/show/cupones">Registro de Cupones</router-link></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i data-feather="settings"></i><span>Mi Abogado</span></a>
                <ul class="dropdown-menu">
                  <li><router-link class="nav-link" to="/admin/create/servicio/abogado">Crear Servicio</router-link></li>
                  <li><router-link class="nav-link" to="/admin/show/servicio/abogado">Registro de Servicios</router-link></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i data-feather="settings"></i><span>Abogado de Emergencia</span></a>
                <ul class="dropdown-menu">
                  <li><router-link class="nav-link" to="/admin/create/servicio/emergencia">Crear Servicio</router-link></li>
                  <li><router-link class="nav-link" to="/admin/show/servicio/emergencia">Registro de Servicios</router-link></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i data-feather="settings"></i><span>Whatsapp</span></a>
                <ul class="dropdown-menu">
                  <li><router-link class="nav-link" to="/admin/create/whatsapp">Crear Enlace</router-link></li>
                  <li><router-link class="nav-link" to="/admin/show/whatsapp">Registro de Enlaces</router-link></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i data-feather="settings"></i><span>Cuentas Bancarias</span></a>
                <ul class="dropdown-menu">
                  <li><router-link class="nav-link" to="/admin/create/cuenta">Agregar Cuenta</router-link></li>
                  <li><router-link class="nav-link" to="/admin/show/cuentas">Administrar Cuentas</router-link></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i data-feather="settings"></i><span>UIT</span></a>
                <ul class="dropdown-menu">
                  <li><router-link class="nav-link" to="/admin/create/impuesto">Agregar Unidad</router-link></li>
                  <li><router-link class="nav-link" to="/admin/show/impuesto">Administrar Unidad</router-link></li>
                </ul>
              </li>
              @endcan
            </ul>
          </aside>
        </div>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div id="app">
              <router-view :id="{{auth()->user()->id}}"></router-view>
            </div>
          </div>
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>

                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label>
                    <span class="control-label p-r-20">Mini Sidebar</span>
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <input type="hidden" value="{{auth()->user()->id}}" id="user_id">
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022 <div class="bullet"></div> Desarrollador por <a href="#">Sonysoft</a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
 @include('admin.theme.footer')
