<?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!--each row-->
    <tr id="contact_<?php echo e($contact->id); ?>">
        
        <td class="contacts_col_first_name" id="contacts_col_first_name_<?php echo e($contact->id); ?>">
            <span class="user-avatar-container"><img src="<?php echo e($contact->avatar); ?>" alt="user"
                    class="img-circle avatar-xsmall">
                <?php if($contact->is_online): ?>
                    <span class="online-status bg-success" data-toggle="tooltip"
                        title="<?php echo e(cleanLang(__('lang.user_is_online'))); ?>"></span>
                <?php endif; ?>
            </span> <span><?php echo e($contact->first_name); ?></span>
            <?php echo e($contact->last_name); ?>

            <!--account owner-->
            <?php if($contact->account_owner == 'yes'): ?>
                <span class="sl-icon-star text-warning p-l-5" data-toggle="tooltip"
                    title="<?php echo e(cleanLang(__('lang.account_owner'))); ?>"
                    id="account_owner_icon_<?php echo e($contact->clientid); ?>"></span>
            <?php endif; ?>

        </td>
        <?php if(config('visibility.contacts_col_client')): ?>
            <td class="contacts_col_company" id="contacts_col_company_<?php echo e($contact->id); ?>">
                <a
                    href="<?php echo e(url('/clients')); ?>/<?php echo e($contact->clientid); ?>"><?php echo e(str_limit($contact->client_company_name, 15)); ?></a>
            </td>
        <?php endif; ?>
        <td class="contacts_col_email" id="contacts_col_email_<?php echo e($contact->id); ?>">
            <?php echo e($contact->email); ?>

        </td>
        <td class="contacts_col_phone" id="contacts_col_phone_<?php echo e($contact->id); ?>"><?php echo e($contact->phone ?? '---'); ?></td>
        <?php if(config('visibility.contacts_col_last_active')): ?>
            <td class="contacts_col_last_active" id="contacts_col_last_active_<?php echo e($contact->id); ?>">
                <?php echo e($contact->carbon_last_seen); ?>

            </td>
        <?php endif; ?>
        <?php if(config('visibility.action_column')): ?>
            <td class="contacts_col_action actions_column" id="contacts_col_action_<?php echo e($contact->id); ?>">
                <!--action button-->
                <span class="list-table-action dropdown font-size-inherit">
                    <!--delete-->
                    <?php if(config('visibility.action_buttons_delete') == 'show' && $contact->account_owner == 'no'): ?>
                        <button type="button" title="<?php echo e(cleanLang(__('lang.delete'))); ?>"
                            class="data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm confirm-action-danger"
                            data-confirm-title="<?php echo e(cleanLang(__('lang.delete_user'))); ?>"
                            data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>" data-ajax-type="DELETE"
                            data-url="<?php echo e(url('/')); ?>/contacts/<?php echo e($contact->id); ?>">
                            <i class="bi bi-trash3 trash"></i>
                        </button> 
                    <?php endif; ?>
                    <!--edit-->
                    <?php if(config('visibility.action_buttons_edit')): ?>
                        <button type="button" title="<?php echo e(cleanLang(__('lang.edit'))); ?>"
                            class="data-toggle-action-tooltip btn btn-outline-success sl-icon-note-border btn-circle btn-sm edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                            data-toggle="modal" data-target="#commonModal"
                            data-url="<?php echo e(urlResource('/contacts/' . $contact->id . '/edit')); ?>"
                            data-loading-target="commonModalBody"
                            data-modal-title="<?php echo e(cleanLang(__('lang.edit_user'))); ?>"
                            data-action-url="<?php echo e(urlResource('/contacts/' . $contact->id . '?ref=list')); ?>"
                            data-action-method="PUT" data-action-ajax-class=""
                            data-action-ajax-loading-target="contacts-td-container">
                            <i class="sl-icon-note"></i>
                        </button>
                    <?php endif; ?>

                    <!--send email-->
                    <?php if(auth()->user()->is_team): ?>
                        <button type="button" title="<?php echo app('translator')->get('lang.send_email'); ?>"
                            class="data-toggle-action-tooltip btn btn-outline-warning   btn-circle btn-sm edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                            data-toggle="modal" data-target="#commonModal"
                            data-url="<?php echo e(url('/appwebmail/compose?view=modal&resource_type=user&resource_id=' . $contact->id)); ?>"
                            data-loading-target="commonModalBody" data-modal-title="<?php echo app('translator')->get('lang.send_email'); ?>"
                            data-action-url="<?php echo e(url('/appwebmail/send')); ?>" data-action-method="POST"
                            data-modal-size="modal-xl" data-action-ajax-loading-target="clients-td-container">
                            <ion-icon name="mail-outline" class=" display-inline-block m-t-3 email"></ion-icon>
                        </button>
                    <?php endif; ?>

                    <!--change password-->
                    <?php if(config('visibility.action_buttons_change_password')): ?>
                        <button type="button" title="<?php echo e(cleanLang(__('lang.update_password'))); ?>"
                            class="data-toggle-action-tooltip btn btn-outline-default btn-circle btn-sm edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                            data-toggle="modal" data-target="#commonModal"
                            data-url="<?php echo e(urlResource('/user/updatepassword?contact_id=' . $contact->id)); ?>"
                            data-loading-target="commonModalBody"
                            data-modal-title="<?php echo e(cleanLang(__('lang.update_password'))); ?>"
                            data-action-url="<?php echo e(urlResource('/user/updatepassword')); ?>" data-action-method="PUT"
                            data-action-ajax-class="" data-action-ajax-loading-target="contacts-td-container">
                            <i class="sl-icon-lock"></i>
                        </button>
                    <?php endif; ?>

                </span>
                <!--action button-->
            </td>
        <?php endif; ?>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--each row-->
<?php /**PATH /home/neosao-nscrmdevelopment/htdocs/nscrmdevelopment.neosao.co.in/application/resources/views/pages/contacts/components/table/ajax.blade.php ENDPATH**/ ?>