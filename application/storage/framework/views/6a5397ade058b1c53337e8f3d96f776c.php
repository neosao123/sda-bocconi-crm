
<?php $__env->startSection('content'); ?>
<div class="form-container">
    <div class="login-container" id="login-container">
        <div class=" text-center company__info">
            <span class="company__logo">
                <img src="<?php echo e(runtimeLogoLarge()); ?>" class="logo-image">
            </span>
            <!-- <h2 class="logo-title"><?php echo e(config('app.name')); ?></h2> -->
        </div>
        <h1 class="title">Log In</h1>
        <form lass="form-group" id="loginForm">
            <div class="input-container">
                <input type="text" placeholder="<?php echo e(cleanLang(__('lang.email'))); ?>" autofocus="on" name="email" id="email" value="<?php echo e(old('email') ?? request()->cookie('email')); ?>" />
            </div>
            <div class="input-container">
                <input type="password" placeholder="<?php echo e(cleanLang(__('lang.password'))); ?>" autofocus="on" name="password" value="<?php echo e(request()->cookie('password') ?? ''); ?>" />
            </div>

            <div class="remember mt-3">
                <input type="checkbox" name="remember_me" id="remember_me" <?php echo e(old('remember_me') || request()->hasCookie('email') ? 'checked' : ''); ?>>
                <label for="remember_me" style="color: #1d407f;"><?php echo e(cleanLang(__('lang.remember_me'))); ?></label>
                <div class="">
                    <a href="<?php echo e(url('forgotpassword')); ?>" class="mb-2">Forgot Password?</a>
                </div>
            </div>

            <div class="gray-line"></div>

            <div class="account-controls">
                <div class="buttons">
                    <button type="submit" value="Submit" class="continue" id="loginSubmitButton" data-button-loading-annimation="yes" data-button-disable-on-click="yes"
                        data-url="<?php echo e(url('login?action=initial&redirect_url=' . request('redirect_url'))); ?>" data-ajax-type="POST">
                        <?php echo e(cleanLang(__('lang.continue'))); ?> <i class="fas fa-angle-right"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="placeholder-banner" id="banner">
        <img src="<?php echo e(url('public/images/home-page-banner.jpg')); ?>" alt="" class="banner">
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.wrapperauth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/neosao-sdabocconicrm/htdocs/sdabocconicrm.neosao.co.in/application/resources/views/pages/authentication/login.blade.php ENDPATH**/ ?>