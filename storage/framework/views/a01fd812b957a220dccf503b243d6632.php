<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php echo e(app('laravel-splade-seo')->renderHead()); ?>

        <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
    </head>
    <body class="font-sans antialiased">
        <div id="app" data-components="<?php echo e(json_encode($components)); ?>" data-html="<?php echo e(json_encode($html)); ?>" data-dynamics="<?php echo e(json_encode($dynamics)); ?>" data-splade="<?php echo e(json_encode($splade)); ?>">
<?php echo $ssrBody; ?>

</div>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\hms\resources\views/root.blade.php ENDPATH**/ ?>