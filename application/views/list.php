<?php
if ($this->session->userdata('UserLoginSession')) {
    $udata = $this->session->userdata('UserLoginSession');
    // echo 'Welcome'.' '.$udata['username'];
} else {
    redirect(base_url('welcome/login'));
}

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
                        <h1 class="m-0 text-dark">List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">List</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Employee Report</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="employeeTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jabatan</th>
                                            <th>Tanggal Aktif Jabatan</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Status Karyawan</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($employees as $emp) : ?>
                                            <tr>
                                                <td><?php echo $emp->NIP; ?></td>
                                                <td><?php echo $emp->Nama; ?></td>
                                                <td><?php echo $emp->JenisKelamin; ?></td>
                                                <td><?php echo $emp->jabatan; ?></td>
                                                <td><?php echo $emp->tanggalAktifJabatan; ?></td>
                                                <td><?php echo $emp->tanggalMasuk; ?></td>
                                                <td><?php echo $emp->statusKaryawan; ?></td>
                                                <td>
                                                    <a href="<?= base_url('welcome/detail/') . $emp->NIP ?>" class="btn btn-primary btn-sm">Detail</a>
                                                    <a href="<?= base_url('welcome/edit/') . $emp->NIP ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="<?= base_url('welcome/delete/') . $emp->NIP ?>" class="btn btn-danger btn-sm">Delete</a>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
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
        $("#employeeTable").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
<?php $this->load->view('backend/template/js') ?>
</body>

</html>

<a href="<?= base_url('welcome/logout') ?>">Logout</a>