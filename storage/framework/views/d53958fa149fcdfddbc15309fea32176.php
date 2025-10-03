<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-left: 250px;">
    <div class="container-fluid">
        
        <span class="navbar-brand">Benvenuta </span> 
        <div class="d-flex">
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button class="btn btn-outline-danger" type="submit">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>
</nav>
<?php /**PATH /var/www/html/resources/views/admin/topbar.blade.php ENDPATH**/ ?>