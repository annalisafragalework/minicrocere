
<!DOCTYPE html>
<html lang="it">
<head>
    <?php echo $__env->make('admin.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>
<body>
    <div id="wrapper">
        <?php echo $__env->make('admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <div id="content-wrapper">
            <?php echo $__env->make('admin.topbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <main class="container-fluid py-4">
                <?php echo $__env->yieldContent('content'); ?>
            </main>

           
        </div>
        <?php echo $__env->make('admin.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div> 

    <?php echo $__env->make('admin.scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/admin/master.blade.php ENDPATH**/ ?>