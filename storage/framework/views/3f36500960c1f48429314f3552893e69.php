<!DOCTYPE html>
<html lang="it">
<head>
    <?php echo $__env->make('admin.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>
<body class="min-vh-100 d-flex flex-column">

    
    <div class="d-flex flex-grow-1">

          
      <nav class="bg-dark text-white p-3" style="width: 250px;">
            <?php echo $__env->make('admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </nav>

        
        <div class="d-flex flex-column flex-grow-1">

            
            <header class="bg-light border-bottom p-3">
                <?php echo $__env->make('admin.topbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </header>

            
            <main class="container-fluid py-4 flex-grow-1">
                <?php echo $__env->yieldContent('content'); ?>
            </main>

            
            <footer class="bg-light text-center py-3 mt-auto border-top">
                <?php echo $__env->make('admin.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </footer>
        </div>
    </div>

    
    <?php echo $__env->make('admin.scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/admin/master.blade.php ENDPATH**/ ?>