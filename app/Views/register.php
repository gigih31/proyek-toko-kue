<!DOCTYPE html>
<head>
</head>
<body>
        <h1>Registrasi User Baru</h1>

        <?php if(session()->getFlashdata('error')):?>
        <div style="color: red;">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    
        <form action="<?= site_url('proses_register_user'); ?>" method="post">           
        Nama Lengkap :
                <input type="text" name="nama">
              Username :
                <input type="text" name="username">
          Password :
          <input type="text" name="password">
          Email :
                <input type="text" name="email">
                <button type="submit">Register</button>
                
        </form>
</body>



</html>
