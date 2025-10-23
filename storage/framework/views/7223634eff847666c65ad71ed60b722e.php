 
<?php $__env->startSection('content'); ?>
<main class="content-dashboard">
    <div class="container-fluid">
        <h2 class="mb-4">Gestione dottori</h2>

        
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        
        <a href="<?php echo e(route('admin.dottori.create')); ?>" class="btn btn-primary mb-3">Nuovo Dottore</a>

        
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>Telefono</th>
                        <th>Email</th>
                      <th>Tipo Abbonamento</th>
                         <th>Free</th> 
                             <th>Operazioni</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $dottori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dottore): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                  <a href="<?php echo e(route('admin.dottori.pazienti.delDottore', ['dottore' => $dottore->id])); ?>" class="text-decoration-none">
                                <?php echo e($dottore->name); ?>

                            </a>                          
                            </td>
                                 <td>
                  
                                <?php echo e($dottore->Cognome); ?>

                  
                            </td>  
                                <td>
                  
                                <?php echo e($dottore->phone); ?>

                  
                            </td>  
                            <td><?php echo e($dottore->email); ?></td>
                              <td><?php echo e($dottore->subscription_type); ?></td>
                               <td><?php echo e($dottore->is_trial); ?></td> 
                           <td>
                            <a href="<?php echo e(route('admin.dottori.edit', $dottore->id)); ?>" class="btn btn-sm btn-warning">
                                Modifica
                            </a>

                                <form action="<?php echo e(route('admin.dottori.destroy', $dottore)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Eliminare questo dottore?')"
                                        aria-label="Elimina <?php echo e($dottore->name); ?>">Elimina</button>
                                </form>
                                 </td>  
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </tbody>
            </table>
        </div>

        
        <div class="d-flex justify-content-center">
           
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/doctor.blade.php ENDPATH**/ ?>