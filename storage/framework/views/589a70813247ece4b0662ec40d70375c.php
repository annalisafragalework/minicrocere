<?php if (isset($component)) { $__componentOriginal497bdfe8ec2d462e58d92006dd0e83f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal497bdfe8ec2d462e58d92006dd0e83f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'minicrociere::components.layouts.master','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('minicrociere::layouts.master'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <h1>Hello World</h1>

    <p>Module: <?php echo config('minicrociere.name'); ?></p>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal497bdfe8ec2d462e58d92006dd0e83f5)): ?>
<?php $attributes = $__attributesOriginal497bdfe8ec2d462e58d92006dd0e83f5; ?>
<?php unset($__attributesOriginal497bdfe8ec2d462e58d92006dd0e83f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal497bdfe8ec2d462e58d92006dd0e83f5)): ?>
<?php $component = $__componentOriginal497bdfe8ec2d462e58d92006dd0e83f5; ?>
<?php unset($__componentOriginal497bdfe8ec2d462e58d92006dd0e83f5); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/Modules/MiniCrociere/resources/views/index.blade.php ENDPATH**/ ?>