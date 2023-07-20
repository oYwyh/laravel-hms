<div class="sidebar">
    <span class="title">Menu</span>
    <ul>
        <li><Link class="<?php echo e(Route::current()->getName() == 'admin.home' ? 'active' : ''); ?> Link" href="<?php echo e(Route('admin.home')); ?>"><i class="fa-solid fa-screwdriver-wrench" style="color:#efc74f;"></i> <span>Dashboard</span></Link></li>
        <li><Link class=" <?php echo e(Route::current()->getName() == 'admin.admins' ? 'active' : ''); ?> Link" href="<?php echo e(route('admin.admins')); ?>"><i class="fa-solid fa-lock" style="color: #3b5fe0;"></i> <span>Admins</span></Link></li>
        <li><Link class=" <?php echo e(Route::current()->getName() == 'admin.doctors' ? 'active' : ''); ?> Link" href="<?php echo e(route('admin.doctors')); ?>"><i class="fa-solid fa-user-doctor" style="color:#efc74f;"> </i><span>Doctors</span></Link></li>
        <li><Link class=" <?php echo e(Route::current()->getName() == 'admin.pateints' ? 'active' : ''); ?> Link" href="<?php echo e(route('admin.patients')); ?>"><i class="fa-solid fa-user" style="color:#e97aca;"></i> <span>Patient</span></Link></li>
    </ul>
</div>
<?php /**PATH C:\xampp\htdocs\hms\resources\views/components/admin/sidebar.blade.php ENDPATH**/ ?>