<div class="header">
    <div class="wrapper">
        <div class="logo">place<span>holder</span></div>
        <div class="icons">
            <div class="dropdown">
                <?php if (isset($component)) { $__componentOriginalf128d9c762a54c6319e56d0f2cbd6d1e = $component; } ?>
<?php $component = ProtoneMedia\Splade\Components\Toggle::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('splade-toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(ProtoneMedia\Splade\Components\Toggle::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <div class="bell" @click.prevent="toggle" id="dropbbtn">
                        <i class="fa-solid fa-bell"></i>
                    </div>
                    <?php if (isset($component)) { $__componentOriginal9c1b3bcdbb92880d08ba057cf26c9bd2 = $component; } ?>
<?php $component = ProtoneMedia\Splade\Components\Transition::resolve(['show' => 'toggled'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('splade-transition'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(ProtoneMedia\Splade\Components\Transition::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <div id="dropdown-bell-content" class="dropdown-content">
                                <div class="box">
                                    <div class="img">
                                        <img src="<?php echo e(asset('images/doc.jpg')); ?>" alt="">
                                    </div>
                                    <div class="msg">
                                        ez
                                    </div>
                                </div>
                                <div class="divider-primary"></div>
                                <div class="box">
                                    <div class="img">
                                        <img src="<?php echo e(asset('images/doc.jpg')); ?>" alt="">
                                    </div>
                                    <div class="msg">
                                        ez
                                    </div>
                                </div>
                                <div class="divider-primary"></div>
                                <div class="box">
                                    <div class="img">
                                        <img src="<?php echo e(asset('images/doc.jpg')); ?>" alt="">
                                    </div>
                                    <div class="msg">
                                        ez
                                    </div>
                                </div>
                                <div class="divider-primary"></div>
                                <div class="box">
                                    <div class="img">
                                        <img src="<?php echo e(asset('images/doc.jpg')); ?>" alt="">
                                    </div>
                                    <div class="msg">
                                        ez
                                    </div>
                                </div>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c1b3bcdbb92880d08ba057cf26c9bd2)): ?>
<?php $component = $__componentOriginal9c1b3bcdbb92880d08ba057cf26c9bd2; ?>
<?php unset($__componentOriginal9c1b3bcdbb92880d08ba057cf26c9bd2); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf128d9c762a54c6319e56d0f2cbd6d1e)): ?>
<?php $component = $__componentOriginalf128d9c762a54c6319e56d0f2cbd6d1e; ?>
<?php unset($__componentOriginalf128d9c762a54c6319e56d0f2cbd6d1e); ?>
<?php endif; ?>
            </div>
            <div class="divider">
            </div>
            <div class="dropdown">
                <?php if (isset($component)) { $__componentOriginalf128d9c762a54c6319e56d0f2cbd6d1e = $component; } ?>
<?php $component = ProtoneMedia\Splade\Components\Toggle::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('splade-toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(ProtoneMedia\Splade\Components\Toggle::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <div class="profile-pic" @click.prevent="toggle" id="droppbtn">
                        <img src="<?php echo e(asset('images/doc.jpg')); ?>" alt="">
                    </div>
                    <?php if (isset($component)) { $__componentOriginal9c1b3bcdbb92880d08ba057cf26c9bd2 = $component; } ?>
<?php $component = ProtoneMedia\Splade\Components\Transition::resolve(['show' => 'toggled'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('splade-transition'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(ProtoneMedia\Splade\Components\Transition::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <div id="dropdown-profile-content" class="dropdown-content">
                            <?php if (isset($component)) { $__componentOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a = $component; } ?>
<?php $component = ProtoneMedia\Splade\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('splade-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(ProtoneMedia\Splade\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'form','confirm' => true,'action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(Route('admin.logout'))]); ?>
                                <?php if (isset($component)) { $__componentOriginal2d975ce603f483bebe2dbee59a477e99 = $component; } ?>
<?php $component = ProtoneMedia\Splade\Components\Form\Submit::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('splade-submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(ProtoneMedia\Splade\Components\Form\Submit::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['style' => 'background: none; color:black !important; border:none !important;']); ?><?php echo e(Auth::guard('admin')->user()->name); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d975ce603f483bebe2dbee59a477e99)): ?>
<?php $component = $__componentOriginal2d975ce603f483bebe2dbee59a477e99; ?>
<?php unset($__componentOriginal2d975ce603f483bebe2dbee59a477e99); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a)): ?>
<?php $component = $__componentOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a; ?>
<?php unset($__componentOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a = $component; } ?>
<?php $component = ProtoneMedia\Splade\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('splade-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(ProtoneMedia\Splade\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'form','confirm' => 'Logout','confirm-text' => 'Are you sure you want to logout?','confirm-button' => 'Yes!','cancel-button' => 'No, I want to stay!','action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(Route('admin.logout'))]); ?>
                                <?php if (isset($component)) { $__componentOriginal2d975ce603f483bebe2dbee59a477e99 = $component; } ?>
<?php $component = ProtoneMedia\Splade\Components\Form\Submit::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('splade-submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(ProtoneMedia\Splade\Components\Form\Submit::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['style' => 'background: none; color:black !important; border:none !important;']); ?>Logout <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d975ce603f483bebe2dbee59a477e99)): ?>
<?php $component = $__componentOriginal2d975ce603f483bebe2dbee59a477e99; ?>
<?php unset($__componentOriginal2d975ce603f483bebe2dbee59a477e99); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a)): ?>
<?php $component = $__componentOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a; ?>
<?php unset($__componentOriginal8070f1a8f8bb4059ff6ff5b9ed074a0a); ?>
<?php endif; ?>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c1b3bcdbb92880d08ba057cf26c9bd2)): ?>
<?php $component = $__componentOriginal9c1b3bcdbb92880d08ba057cf26c9bd2; ?>
<?php unset($__componentOriginal9c1b3bcdbb92880d08ba057cf26c9bd2); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf128d9c762a54c6319e56d0f2cbd6d1e)): ?>
<?php $component = $__componentOriginalf128d9c762a54c6319e56d0f2cbd6d1e; ?>
<?php unset($__componentOriginalf128d9c762a54c6319e56d0f2cbd6d1e); ?>
<?php endif; ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\hms\resources\views/components/admin/header.blade.php ENDPATH**/ ?>