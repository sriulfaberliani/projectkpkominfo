<div class='container'>
    <div class='row'>
        <div class='col-md-12'>
        <h1 class="h3 mb-2 text-gray-800">Change Password</h1>
            <?php if(isset($validation)):?>
            <div class='alert alert-danger'><?= $validation->listErrors(); ?></div>
            <?php endif;?>
            <?php if(session()->getTempdata('success')): ?>
                <div class='alert alert-success'><?= session()->getTempdata('success') ;?></div>
            <?php endif; ?>
                
            <?php if(session()->getTempdata('error')): ?>
               <div class='alert alert-danger'><?= session()->getTempdata('error') ;?></div>
            <?php endif; ?>
            
            <?= form_open();?>
            <div class='form-group'>
                <label>Masukkan Password Lama</label>
                <input type='password' name='opwd' class='form-control'>
            </div>
            <div class='form-group'>
                <label>Password Baru</label>
                <input type='password' name='npwd' class='form-control'>
            </div>
            <div class='form-group'>
                <label>Konfirmasi Password Baru</label>
                <input type='password' name='cnpwd' class='form-control'>
            </div>
            <div class='form-group'>
                <input type='submit' name='update' value='Update' class='btn btn-primary'>
            </div>
            <?= form_close();?>
        </div>
    </div>
</div>
