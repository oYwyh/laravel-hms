<SpladeData <?php echo e($attributes); ?>

    <?php if($data): ?> :default="<?php echo \Illuminate\Support\Js::from($data)->toHtml() ?>" <?php else: ?> :default="<?php echo $json; ?>" <?php endif; ?> :remember="<?php echo \Illuminate\Support\Js::from($remember)->toHtml() ?>" :local-storage="<?php echo \Illuminate\Support\Js::from($localStorage)->toHtml() ?>">
    <?php if (! ($store)): ?>
        <template #default="<?php echo $scope; ?>">
            <?php echo e($slot); ?>

        </template>
    <?php endif; ?>
</SpladeData><?php /**PATH C:\xampp\htdocs\hms\vendor\protonemedia\laravel-splade\src/../resources/views/functional/data.blade.php ENDPATH**/ ?>