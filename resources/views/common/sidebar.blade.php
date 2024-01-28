<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- <i class="fas fa-university"></i> --}}
            <img alt="Logo" style="max-width: 30px !important" src="{{ asset('images/icon.png') }}" />
        </div>
        <div class="sidebar-brand-text mx-3">ANNS </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tableau de bord</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Gestion
    </div>
    @hasrole('Admin')
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDown"
                aria-expanded="true" aria-controls="taTpDropDown">
                <i class="fas fa-user-alt"></i>
                <span>Gestion des utilisateurs</span>
            </a>
            <div id="taTpDropDown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Gestion des utilisateurs:</h6>
                    <a class="collapse-item" href="{{ route('users.index') }}">Liste</a>
                    <a class="collapse-item" href="{{ route('users.create') }}">Ajouter un nouveau</a>
                
                </div>
            </div>
        </li>

    @endhasrole

    <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDowntypestructures"
                aria-expanded="true" aria-controls="taTpDropDowntypestructures">
              <i class="fas fa-map-pin"></i>
                <span> Types de structure</span>
            </a>
            <div id="taTpDropDowntypestructures" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Types de structure:</h6>
                    <a class="collapse-item" href="{{ route('typestructures.index') }}">Liste</a>
                    <a class="collapse-item" href="{{ route('typestructures.create') }}">Ajouter un nouveau</a>
                
                </div>
            </div>
    </li>

    <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDownstructures"
                aria-expanded="true" aria-controls="taTpDropDownstructures">
                
                <i class="fas fa-map-marker-alt"></i>
                <span>Gestion des structures</span>
            </a>
            <div id="taTpDropDownstructures" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Gestion des structures:</h6>
                    <a class="collapse-item" href="{{ route('structure.index') }}">Liste</a>
                    <a class="collapse-item" href="{{ route('structure.create') }}">Ajouter un nouveau</a>
                
                </div>
            </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    @hasrole('Admin')
        <!-- Heading -->
       

        <!-- Nav Item - Pages Collapse Menu -->
        {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Masters</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Role & Permissions</h6>
                        <a class="collapse-item" href="{{ route('roles.index') }}">Roles</a>
                        <a class="collapse-item" href="{{ route('permissions.index') }}">Permissions</a>
                    </div>
                </div>
                </li> --}}

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    @endhasrole

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>Se déconnecter</span>
        </a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>