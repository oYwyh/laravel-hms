<div class="sidebar">
    <span class="title">Menu</span>
    <ul>
        <li><Link class="{{Route::current()->getName() == 'user.home' ? 'active' : ''}} Link" href="{{Route('user.home')}}"><i class="fa-solid fa-screwdriver-wrench" style="color:#efc74f;"></i> <span>Dashboard</span></Link></li>
        <li><Link class=" {{Route::current()->getName() == 'user.manage.appointments.index' ? 'active' : ''}} Link" href="{{route('user.manage.appointments.index')}}"><i class="fa-solid fa-lock" style="color: #3b5fe0;"></i> <span>Appointments</span></Link></li>
        <li><Link class="{{Route::current()->getName() == 'user.file' ? 'active' : ''}} Link" href="{{Route('user.file')}}"><i class="fa-solid fa-screwdriver-wrench" style="color:#b264f1;"></i> <span>Files</span></Link></li>
    </ul>
</div>
