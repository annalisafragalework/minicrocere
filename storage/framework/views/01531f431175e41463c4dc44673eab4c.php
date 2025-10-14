<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Modifica Paziente</h2>

    <form action="<?php echo e(route('admin.dottori.pazienti.update', $paziente->id)); ?>" method="POST">
        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="name">Nome</label>
            <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $paziente->name)); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo e(old('email', $paziente->email)); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Aggiorna</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/dottori/pazienti/edit.blade.php ENDPATH**/ ?>