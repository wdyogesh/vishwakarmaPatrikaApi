<!DOCTYPE html>
<html class="h-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo e(trans('labels.admin_title')); ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(Helper::image_path(@Helper::appdata()->favicon)); ?>"><!-- Favicon icon -->
    <link href="<?php echo e(url('/storage/app/public/admin-assets/assets/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('/storage/app/public/admin-assets/assets/plugins/toastr/css/toastr.min.css')); ?>" rel="stylesheet">
</head>
<body class="h-100">
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="#"><center><img src="<?php echo e(Helper::image_path(@Helper::appdata()->logo)); ?>" height="100" width="100" alt=""></center></a>
                                <form method="POST" class="mt-5 mb-5 login-input" action="<?php echo e(URL::to('admin/auth')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <input id="envato_username" type="text" class="form-control <?php $__errorArgs = ['envato_username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="envato_username" value="<?php echo e(old('envato_username')); ?>" required autocomplete="envato_username" autofocus placeholder="Envato Username">
                                        <?php $__errorArgs = ['envato_username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="Email">
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group">
                                        <input id="purchase_key" type="text" class="form-control <?php $__errorArgs = ['purchase_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="purchase_key" required autocomplete="current-purchase_key" placeholder="Purchase Key">
                                        <?php $__errorArgs = ['purchase_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <?php
                                    $text = str_replace('auth', 'admin', url()->current());
                                    ?>
                                    <div class="form-group">
                                        <input id="domain" type="hidden" class="form-control <?php $__errorArgs = ['domain'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="domain" required autocomplete="current-domain" value="<?php echo e($text); ?>" placeholder="domain" readonly="">
                                    </div>
                                    <button type="submit" class="btn login-form__btn submit w-100">
                                        <?php echo e(__('Submit')); ?>

                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo e(url('/storage/app/public/admin-assets/assets/plugins/common/common.min.js')); ?>"></script>
    <script src="<?php echo e(url('/storage/app/public/admin-assets/assets/js/custom.min.js')); ?>"></script>
    <script src="<?php echo e(url('/storage/app/public/admin-assets/assets/js/settings.js')); ?>"></script>
    <script src="<?php echo e(url('/storage/app/public/admin-assets/assets/js/gleek.js')); ?>"></script>
    <script src="<?php echo e(url('/storage/app/public/admin-assets/assets/js/styleSwitcher.js')); ?>"></script>
    <script src="<?php echo e(url('/storage/app/public/admin-assets/assets/plugins/toastr/js/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(url('/storage/app/public/admin-assets/assets/plugins/toastr/js/toastr.init.js')); ?>"></script>
    <script>
        <?php if(Session::has('success')): ?>
            toastr.options = {
                "closeButton" : true,
                "progressBar" : true
            },
            toastr.success("<?php echo e(session('success')); ?>");
        <?php endif; ?>
        <?php if(Session::has('error')): ?>
            toastr.options ={
                "closeButton" : true,
                "progressBar" : true,
                "timeOut" : 10000
            },
            toastr.error("<?php echo e(session('error')); ?>");
        <?php endif; ?>
     </script>
</body>
</html>
<?php /**PATH D:\XAMPP\htdocs\mywinkel\resources\views//auth.blade.php ENDPATH**/ ?>