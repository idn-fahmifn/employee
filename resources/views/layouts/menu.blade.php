@if(Auth::user()->level == 'admin')
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item menu-open">
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/home" class="nav-link active">
                    <i class="fa fa-home nav-icon"></i>
                    <p>Dashboard</p>
                </a>
                <a href="/user" class="nav-link">
                    <i class="fa fa-user nav-icon"></i>
                    <p>Karyawan</p>
                </a>
                <a href="/jabatan" class="nav-link">
                    <i class="fa fa-tags nav-icon"></i>
                    <p>Jabatan</p>
                </a>
                <a href="/admin-attendance" class="nav-link">
                    <i class="fa fa-list nav-icon"></i>
                    <p>Absensi</p>
                </a>
                <a href="/paket" class="nav-link disabled">
                    <i class="fa fa-dollar-sign nav-icon"></i>
                    <p>Payroll</p>
                    <sup class="badge badge-danger">soon</sup>
                </a>
            </li>
            <li class="nav-item menu-open">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Generate
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/report" class="nav-link">
                            <i class="far fa-circle text-danger nav-icon"></i>
                            <p>Laporan Absensi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle text-success nav-icon"></i>
                            <p>Laporan Payroll</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
</ul>
@elseif(Auth::user()->level == 'employee')
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item menu-open">
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/home" class="nav-link active">
                    <i class="fa fa-home nav-icon"></i>
                    <p>Dashboard</p>
                </a>
                <a href="/attendance/create" class="nav-link">
                    <i class="fa fa-list nav-icon"></i>
                    <p>Absensi</p>
                </a>
                <a href="/paket" class="nav-link disabled">
                    <i class="fa fa-dollar-sign nav-icon"></i>
                    <p>Slip Gaji</p>
                    <sup class="badge badge-danger">soon</sup>
                </a>
            </li>
        </ul>
    </li>
@endif