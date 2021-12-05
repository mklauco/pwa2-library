
<button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
  
  <i class="c-sidebar-nav-icon cil-menu">
    
  </i>
  
</button>
<a class="c-header-brand d-lg-none" href="#">
  
  
</a>
<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
  
  <i class="c-sidebar-nav-icon cil-menu">
    
  </i>
  
</button>
<ul class="c-header-nav d-md-down-none">
  <li class="c-header-nav-item px-3">
    <a class="c-header-nav-link" href="https://coreui.io/docs/getting-started/introduction/"> CoreUI 3.4.0 Docs</a>
  </li>
  <li class="c-header-nav-item px-3">
    <a class="c-header-nav-link" href="https://coreui.io/demo/free/3.4.0/icons/coreui-icons-free.html"> CoreUI Free Icons</a>
  </li>
  <li class="c-header-nav-item px-3">
    <a class="c-header-nav-link" href="https://coreui.io/demo/free/3.4.0/"> CoreUI 3.4.0 Entire Template</a>
  </li>
</ul>

<ul class="c-header-nav ml-auto mr-4">
  
  <li class="c-header-nav-item dropdown">
    <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      
      <div class="c-avatar">
        <i class="c-sidebar-nav-icon cil-user"></i>
      </div>
      {{ (Auth::user()->first_name) }}&nbsp;{{ (Auth::user()->last_name) }}
    </a>
    
    <div class="dropdown-menu dropdown-menu-right pt-0">
      <div class="dropdown-header bg-light py-2">
        <strong>Account</strong>
      </div>
      <div class="dropdown-divider">       
      </div>
      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">            
        <i class="c-sidebar-nav-icon cil-account-logout"></i>
        {{ __('Logout') }}
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </a>    
  </div>
</li>
</ul>

{{-- <div class="c-subheader px-3">     --}}
  {{-- <ol class="breadcrumb border-0 m-0">     --}}
    {{-- <li class="breadcrumb-item">Home</li>     --}}
    {{-- <li class="breadcrumb-item">       --}}
      {{-- <a href="#">Admin</a>     --}}
      {{-- </li>     --}}
      {{-- <li class="breadcrumb-item active">Dashboard</li>       --}}
      {{-- </ol>  --}}
      {{-- </div> --}}