<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user.layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user.content','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user.content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <div class="box">
            <div class="title">Overview</div>

        </div>
        <div class="overview">
            <div class="profile-box">
                <div class="main">
                    <div class="row">
                        <div class="img-box">
                            <img src="<?php echo e(Auth::user()->image ? asset('storage/'.Auth::user()->image) : asset('images/doc.jpg')); ?>" alt="">
                        </div>
                        <div class="column">
                            <p class="name"><?php echo e($user->name); ?></p>
                            <p class="age"><?php echo e($user->age); ?> years old</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <div class="label">Height</div>
                            <div class="txt"><?php echo e($user->height); ?></div>
                        </div>
                        <div class="column">
                            <div class="label">Weight</div>
                            <div class="txt"><?php echo e($user->weight); ?></div>
                        </div>
                        <div class="column">
                            <div class="label">Blood Type</div>
                            <div class="txt"><?php echo e($user->blood); ?></div>
                        </div>
                    </div>
                </div>
                <div class="nor-row">
                    <div class="nor-column">
                        <p class="label">Phone Number</p>
                        <p class="txt"><?php echo e($user->phone); ?></p>
                    </div>
                    <div class="nor-column">
                        <p class="label">Email</p>
                        <p class="txt"><?php echo e($user->email); ?></p>
                    </div>
                    <div class="nor-column">
                        <p class="label">Passport</p>
                        <p class="txt"><?php echo e($user->passport); ?></p>
                    </div>
                    <div class="nor-column">
                        <p class="label">Card Number</p>
                        <p class="txt"><?php echo e($user->id); ?></p>
                    </div>
                    <div class="nor-column">
                        <p class="label">Medical Condition</p>
                        <p class="txt"><?php echo e($user->conditions ? $user->conditions : 'None'); ?></p>
                    </div>
                </div>
            </div>
            <div class="clender-box">
                <clender id="clender" doctor="<?php echo e(implode(',',$doctor)); ?>" date="<?php echo e(implode(',',$date)); ?>"/>
            </div>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal85e14d8f2eb9be41c54f3ef4caf4b63b = $component; } ?>
<?php $component = ProtoneMedia\Splade\Components\Script::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('splade-script'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(ProtoneMedia\Splade\Components\Script::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal85e14d8f2eb9be41c54f3ef4caf4b63b)): ?>
<?php $component = $__componentOriginal85e14d8f2eb9be41c54f3ef4caf4b63b; ?>
<?php unset($__componentOriginal85e14d8f2eb9be41c54f3ef4caf4b63b); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\hms\resources\views/dashboard/user/home.blade.php ENDPATH**/ ?>