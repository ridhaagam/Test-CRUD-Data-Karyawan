<?php
if (!$this->session->userdata('UserLoginSession')) {
    redirect(base_url('welcome/login'));
}
$udata = $this->session->userdata('UserLoginSession');
?>

<!-- Meta -->
<?php $this->load->view('backend/template/meta') ?>

<div class="wrapper">

    <!-- Navbar -->
    <?php $this->load->view('backend/template/navbar') ?>

    <!-- Main Sidebar Container -->
    <?php $this->load->view('backend/template/sidebar') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit User Details</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Update Employee</h3>
                            </div>
                            <!-- Form Start -->
                            <form role="form" action="<?= base_url('welcome/updateUser') ?>" method="post">
                                <input type="hidden" name="nip" value="<?= $user ? $user->nip : '' ?>">

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" value="<?= $user ? $user->username : '' ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?= $user ? $user->email : '' ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" value="">
                                        <small class="text-muted">Leave blank if you don't want to change the password.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter nama" value="<?= $user ? $user->nama : '' ?>" required>
                                    </div>

                                    <!-- Jenis Kelamin -->
                                    <div class="form-group">
                                        <label for="jenisKelamin">Status Karyawan</label>
                                        <select class="form-control" id="jenisKelamin" name="jenisKelamin">
                                            <option value="Male" <?= $user && $user->jenisKelamin == 'Male' ? 'selected' : '' ?>>Male</option>
                                            <option value="Female" <?= $user && $user->jenisKelamin == 'Female' ? 'selected' : '' ?>>Female</option>
                                        </select>
                                    </div>

                                    <!-- Jabatan -->
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Enter Position" value="<?= $user ? $user->jabatan : '' ?>">
                                    </div>

                                    <!-- Tanggal Aktif Jabatan -->
                                    <div class="form-group">
                                        <label for="tanggalAktifJabatan">Tanggal Aktif Jabatan</label>
                                        <input type="date" class="form-control" id="tanggalAktifJabatan" name="tanggalAktifJabatan" value="<?= $user ? $user->tanggalAktifJabatan : '' ?>">
                                    </div>

                                    <!-- Tanggal Masuk -->
                                    <div class="form-group">
                                        <label for="tanggalMasuk">Tanggal Masuk</label>
                                        <input type="date" class="form-control" id="tanggalMasuk" name="tanggalMasuk" value="<?= $user ? $user->tanggalMasuk : '' ?>">
                                    </div>

                                    <!-- Status Karyawan -->
                                    <div class="form-group">
                                        <label for="statusKaryawan">Status Karyawan</label>
                                        <select class="form-control" id="statusKaryawan" name="statusKaryawan">
                                            <option value="Active" <?= $user && $user->statusKaryawan == 'Active' ? 'selected' : '' ?>>Active</option>
                                            <option value="Inactive" <?= $user && $user->statusKaryawan == 'Inactive' ? 'selected' : '' ?>>Inactive</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="roles">Roles</label>
                                        <select class="form-control" id="roles" name="roles">
                                            <option value="admin" <?= $user && $user->roles == 'Admin' ? 'selected' : '' ?>>Admin</option>
                                            <option value="user" <?= $user && $user->roles == 'User' ? 'selected' : '' ?>>User</option>
                                            <!-- Add more options if needed -->
                                        </select>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>

                            <!-- Form End -->
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>

    <!-- Footer -->
    <?php $this->load->view('backend/template/footer') ?>

</div>
<!-- ./wrapper -->

<!-- JS -->
<script>
    $(function() {
        // any JS functionality you want to add for this edit page
    });
</script>
<?php $this->load->view('backend/template/js') ?>
</body>

</html>