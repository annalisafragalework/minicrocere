<?php $__env->startSection('content'); ?>
<main class="content-dashboard">
    <div class="container-fluid">
        <h2 class="mb-4">
            Pazienti di <?php echo e($dottore->name); ?>

        </h2>

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <a href="<?php echo e(route('admin.dottori.pazienti.create', ['dottore' => $dottore])); ?>" class="btn btn-primary mb-3">
            Nuovo Paziente
        </a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ruoli</th>
                    <th>Primario</th>
                    <th>Location</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $pazienti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paziente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($paziente->name); ?></td>
                        <td><?php echo e($paziente->email); ?></td>
                        <td><?php echo e($paziente->roles->pluck('name')->join(', ')); ?></td>
                        <td><?php echo e($paziente->pivot->is_primary ? 'Sì' : 'No'); ?></td>
                        <td><?php echo e($paziente->pivot->location); ?></td>
                        <td>
                            <a href="<?php echo e(route('admin.dottori.pazienti.edit', ['dottore' => $dottore, 'paziente' => $paziente])); ?>" class="btn btn-sm btn-warning">
                                Modifica
                            </a>

                            <form action="<?php echo e(route('admin.dottori.pazienti.destroy', ['dottore' => $dottore, 'paziente' => $paziente])); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Eliminare questo paziente?')">Elimina</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <?php echo e($pazienti->links()); ?>

    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/dottori/pazienti/index.blade.php ENDPATH**/ ?>