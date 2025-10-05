 
 

<?php $__env->startSection('content'); ?>
<main class="content-dashboard">
    <div class="container-fluid">
        <h2 class="mb-4">Gestione Utenti</h2>

        
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        
        <a href="<?php echo e(route('admin.utenti.create')); ?>" class="btn btn-primary mb-3">Nuovo Utente</a>

        
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ruoli</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $utenti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $utente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr> 
                            <td><?php echo e($utente->name); ?></td>
                            <td><?php echo e($utente->email); ?></td>
                            <td><?php echo e(implode(', ', $utente->getRoleNames()->toArray())); ?></td>
                            <td>
                     <a href="<?php echo e(route('admin.utenti.edit', $utente)); ?>" class="btn btn-sm btn-warning">Modifica</a>
                                <form action="<?php echo e(route('admin.utenti.destroy', $utente)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Eliminare questo utente?')">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        
        <div class="d-flex justify-content-center">
            <?php echo e($utenti->links()); ?>

        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>




 

<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/utenti/index.blade.php ENDPATH**/ ?>