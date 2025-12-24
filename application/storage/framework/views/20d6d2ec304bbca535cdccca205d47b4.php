<?php if(isset($page['visibility_show_load_more']) && $page['visibility_show_load_more']): ?>
<div class="autoload loadmore-button-container" id="search_see_more_button">
    <a data-url="<?php echo e($page['url'] ?? ''); ?>" data-url="<?php echo e(url('search?search_type='.$search_type)); ?>" data-type="form"
        data-form-id="global-search-form" data-ajax-type="post" data-loading-target="global-search-form"
        name="search_query" href="javascript:void(0)" class="btn btn-rounded btn-secondary js-ajax-ux-request"
        id="load-more-button"><?php echo app('translator')->get('lang.show_more'); ?></a>
</div>
<?php endif; ?><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/search/modal/load-more.blade.php ENDPATH**/ ?>