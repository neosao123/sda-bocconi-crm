<!--checkbox actions-->
<?php echo $__env->make('pages.projects.components.actions.checkbox-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--main table view-->
<?php echo $__env->make('pages.projects.views.cards.layout.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--filter-->
<?php if(auth()->user()->is_team): ?>
<?php echo $__env->make('pages.projects.components.misc.filter-projects', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<!--filter-->

<!--export-->
<?php if(config('visibility.list_page_actions_exporting')): ?>
<?php echo $__env->make('pages.export.projects.export', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<!--export--><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/projects/views/cards/layout/wrapper.blade.php ENDPATH**/ ?>