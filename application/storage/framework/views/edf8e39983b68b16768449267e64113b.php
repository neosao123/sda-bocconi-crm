<!--each category-->
<div class="x-each-category <?php echo e($projects['search_type'] ?? 'all'); ?>">

    <!--heading-->
    <?php if($projects['search_type'] == 'all'): ?>
    <div class="x-heading clearfix">
        <span class="pull-left x-title">
            <?php echo app('translator')->get('lang.projects'); ?>
        </span>
        <span class="pull-right x-count">
            <a href="javascript:void(0);" class="ajax-request" data-url="<?php echo e(url('search?search_type=projects')); ?>"
                data-type="form" data-form-id="global-search-form" data-ajax-type="post"
                data-loading-target="global-search-form" name="search_query"><?php echo app('translator')->get('lang.view_all'); ?>
                (<?php echo e($projects['count']); ?>)</a>
        </span>
    </div>
    <?php endif; ?>

    <!--results-->
    <ul>

        <!-- each result -->
        <?php $__currentLoopData = $projects['results']->take(runtimeSearchDisplyLimit($projects['search_type'])); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="projects">
            <a href="javascript:void(0);">
                <!--icon-->
                <span class="x-icon">
                    <i class="ti-folder"></i>
                </span>
                <!--title-->
                <span class="x-title">
                    <a href="<?php echo e(url('projects/'.$project->project_id)); ?>"><?php echo e($project->project_title); ?></a>
                </span>
                <!--matched  on tags-->
                <?php if($project->tags->isNotEmpty() && $project->tags->contains('tag_title', $search_query)): ?>
                <span class="ti-bookmark x-tag-match" title="<?php echo app('translator')->get('lang.matched_tags'); ?>" data-toggle="tooltip"></span>
                <?php endif; ?>
                <!--meta-->
                <span class="x-meta">
                    - #<?php echo e($project->project_id ?? 0); ?>

                </span>
            </a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <!--ajax loading-->

    </ul>
</div><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/search/results/projects.blade.php ENDPATH**/ ?>