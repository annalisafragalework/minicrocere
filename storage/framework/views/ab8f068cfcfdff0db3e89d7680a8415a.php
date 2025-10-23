<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Nuovo Dottore</h2>

    
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errore): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($errore); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    
    <form action="<?php echo e(route('admin.dottori.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo e(old('name')); ?>" required>
        </div>
      
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo e(old('email')); ?>" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Crea Dottore</button>
        <a href="<?php echo e(route('admin.dottori.lista')); ?>" class="btn btn-secondary">Annulla</a>
    </form>
</div>
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/dottori/create.blade.php ENDPATH**/ ?>