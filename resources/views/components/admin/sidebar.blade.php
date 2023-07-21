<div class="sidebar">
    <span class="title">Menu</span>
    <ul>
        <li><Link class="{{Route::current()->getName() == 'admin.home' ? 'active' : ''}} Link" href="{{Route('admin.home')}}"><i class="fa-solid fa-screwdriver-wrench" style="color:#efc74f;"></i> <span>Dashboard</span></Link></li>
        <li><Link class=" {{Route::current()->getName() == 'admin.manage.admins.index' ? 'active' : ''}} Link" href="{{route('admin.manage.admins.index')}}"><i class="fa-solid fa-lock" style="color: #3b5fe0;"></i> <span>Admins</span></Link></li>
        <li><Link class=" {{Route::current()->getName() == 'admin.manage.doctors.index' ? 'active' : ''}} Link" href="{{route('admin.manage.doctors.index')}}"><i class="fa-solid fa-user-doctor" style="color:#efc74f;"> </i><span>Doctors</span></Link></li>
        <li><Link class=" {{Route::current()->getName() == 'admin.manage.users.index' ? 'active' : ''}} Link" href="{{route('admin.manage.users.index')}}"><i class="fa-solid fa-user" style="color:#e97aca;"></i> <span>Patient</span></Link></li>
    </ul>
</div>
