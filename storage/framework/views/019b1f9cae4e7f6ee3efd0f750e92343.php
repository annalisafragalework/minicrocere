 
 


<?php $__env->startSection('content'); ?>
    
<main class="content-dashboard">
    <div class="container-fluid">
        <?php 
       
            $ruoli = $user->getRoleNames()->toArray();
        ?>

        <?php if(in_array('administrator', $ruoli)): ?>
            <h1>Benvenuto nel Pannello Amministratore!</h1>
            <p>Questa è la tua Dashboard iniziale. Inizia ad aggiungere i widget.</p>
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
<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/index.blade.php ENDPATH**/ ?>