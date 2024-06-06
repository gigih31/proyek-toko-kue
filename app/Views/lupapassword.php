<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
 </head>
<body>
<a href="<?= site_url('login') ?>" >LOGIN</a>
<hr>

<?php if(session()->getFlashdata('error')):?>
        <div style="color: red;">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    
        <form action="<?= site_url('proses_lupa_password'); ?>" method="post">
             Email yang Terdaftar :
                    <input name="email" type="text">
                                     
       <button type="submit">
                        Reset Password
                    </button>
             
            </form>
</body>
</html>
