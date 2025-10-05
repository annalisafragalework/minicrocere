 


<?php $__env->startSection('content'); ?>
    
<main class="content-dashboard">
    <div class="container-fluid">
        <?php 
            $ruoli = $user->getRoleNames()->toArray();
        ?>

        <?php if(in_array('administrator', $ruoli)): ?>
            <h1>qui la tabella administretor utenti</h1>
       

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Gestione Utenti</h2>

    <a href="<?php echo e(route('utenti.create')); ?>" class="btn btn-primary mb-3">Nuovo Utente</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $utenti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $utente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($utente->name); ?></td>
                <td><?php echo e($utente->email); ?></td>
                <td>
                    <a href="<?php echo e(route('utenti.edit', $utente)); ?>" class="btn btn-sm btn-warning">Modifica</a>
                    <form action="<?php echo e(route('utenti.destroy', $utente)); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Eliminare questo utente?')">Elimina</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php echo e($utenti->links()); ?>

</div>
<?php $__env->stopSection(); ?>






        <?php elseif(in_array('proprietario', $ruoli)): ?>
            <h1>Benvenuto nel Pannello Proprietario!</h1>
            <p>Questa è la tua Dashboard iniziale. Inizia ad aggiungere i widget.</p>
        <?php else: ?>
            <h1>Benvenuto!</h1>
            <p>Accesso base al sistema. Contatta l’amministratore per maggiori permessi.</p>
        <?php endif; ?>
    </div>
</main>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/utenti/utenti.blade.php ENDPATH**/ ?>