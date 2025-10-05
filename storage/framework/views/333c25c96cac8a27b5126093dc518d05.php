<?php $__env->startSection('content'); ?>
<main class="content-dashboard">
    <div class="container-fluid">
        <h2 class="mb-4">Modifica Utente</h2>

        
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errore): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($errore); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        
        <form action="<?php echo e(route('admin.utenti.update', $utente)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo e(old('name', $utente->name)); ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo e(old('email', $utente->email)); ?>" required>
            </div>

            <div class="mb-3">
                <label for="ruoli" class="form-label">Ruoli</label>
                <select name="ruoli[]" id="ruoli" class="form-select" multiple>
                    <?php $__currentLoopData = $ruoliDisponibili; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ruolo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($ruolo); ?>" <?php echo e(in_array($ruolo, $utente->getRoleNames()->toArray()) ? 'selected' : ''); ?>>
                            <?php echo e(ucfirst($ruolo)); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <small class="text-muted">Tieni premuto Ctrl (Cmd su Mac) per selezioni multiple</small>
            </div>

            <button type="submit" class="btn btn-success">Aggiorna Utente</button>
            <a href="<?php echo e(route('admin.utenti.index')); ?>" class="btn btn-secondary ms-2">Annulla</a>
        </form>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/utenti/edit.blade.php ENDPATH**/ ?>