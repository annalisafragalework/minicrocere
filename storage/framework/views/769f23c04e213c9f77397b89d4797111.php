<?php $__env->startSection('content'); ?>


    <div class="container">
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <h2>Inserisci disponibilità mensile</h2>
        <form method="POST" action="<?php echo e(route('appointments.generate-slots')); ?>">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="doctor_id" value="<?php echo e(auth()->id()); ?>">
            <label for="date">Data:</label>
            <input type="date" name="date" required>

            <label for="start_hour">Ora inizio:</label>
            <input type="time" name="start_hour" required>

            <label for="end_hour">Ora fine:</label>
            <input type="time" name="end_hour" required>

            <label for="slot_duration">Durata slot (minuti):</label>
            <input type="number" name="slot_duration" value="30" min="5" required>

            <button type="submit" class="btn btn-primary mt-3">Genera Slot</button>
        </form>
        <h3 class="mt-5">Slot già generati</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Ora Inizio</th>
                    <th>Ora Fine</th>
                    <th>Paziente</th>
                </tr>
            </thead>
            <tbody> 
                <?php $__empty_1 = true; $__currentLoopData = $slots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($slot->date); ?></td>
                        <td><?php echo e($slot->start_time); ?></td>
                        <td><?php echo e($slot->end_time); ?></td>
                        <td>   
                            
                            <?php if($slot->paziente): ?>
                                <?php echo e($slot->paziente->name); ?>

                            <?php else: ?>
                                <em>Disponibile</em>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4">Nessuno slot disponibile</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
<form method="POST" action="<?php echo e(route('appointments.delete-past-slots')); ?>">
    <?php echo csrf_field(); ?>
    <button type="submit" class="btn btn-danger mt-3">Elimina slot passati non prenotati</button>
</form>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/dottori/calendar.blade.php ENDPATH**/ ?>