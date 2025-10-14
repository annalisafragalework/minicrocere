 
<h4 class="mb-4">Admin Panel</h4>
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a class="nav-link text-white" href=" <?php echo e(route('admin.index')); ?>">
                <i class="fas fa-home me-2"></i> Dashboard
            </a>
        </li>
<?php if(session('user_role') == 'administrator'): ?>
    <li class="nav-item mb-2">
        <a class="nav-link text-white" href="<?php echo e(route('admin.dottori.index')); ?>">
            <i class="fas fa-home me-2"></i> Dottori
        </a>
    </li>
<?php elseif(session('user_role') == 'dottore'): ?>
    <li class="nav-item mb-2">
        <a class="nav-link text-white" href="<?php echo e(route('admin.dottori.pazienti.delDottore', ['dottore' => session('user_id')])); ?>   ">
            <i class="fas fa-home me-2"></i> Pazienti
        </a>
    </li>
     <li class="nav-item mb-2">
 <a class="nav-link" href="<?php echo e(route('admin.dottori.calendar')); ?>">
    <i class="bi bi-calendar-plus"></i> Inserisci Calendario
</a>
</li>
<?php endif; ?>
        </li>
        
    </ul>

<?php /**PATH /var/www/html/resources/views/admin/sidebar.blade.php ENDPATH**/ ?>