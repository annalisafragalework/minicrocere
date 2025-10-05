
    <h4 class="mb-4">Admin Panel</h4>
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a class="nav-link text-white" href=" <?php echo e(route('admin.index')); ?>">
                <i class="fas fa-home me-2"></i> Dashboard
            </a>
        </li>
           <li class="nav-item mb-2">
        <a class="nav-link text-white" href="<?php echo e(route('admin.utenti.index')); ?>">
    <i class="fas fa-home me-2"></i> Utenti
</a>

        </li>
        
    </ul>

<?php /**PATH /var/www/html/resources/views/admin/sidebar.blade.php ENDPATH**/ ?>