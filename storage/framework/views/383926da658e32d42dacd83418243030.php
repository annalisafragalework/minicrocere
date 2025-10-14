<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Dettaglio Paziente</h2>

    <p><strong>Nome:</strong> <?php echo e($paziente->name); ?></p>
    <p><strong>Email:</strong> <?php echo e($paziente->email); ?></p>
    <p><strong>Ruoli:</strong> <?php echo e($paziente->roles->pluck('name')->join(', ')); ?></p>

    <a href="<?php echo e(route('admin.dottori.editpaziente', $paziente->id)); ?>" class="btn btn-warning">Modifica</a>
    <a href="<?php echo e(route('admin.dottori.indexpazienti')); ?>" class="btn btn-secondary">Torna alla lista</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/dottori/pazienti/show.blade.php ENDPATH**/ ?>