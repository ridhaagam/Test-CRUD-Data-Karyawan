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
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Detail Employee</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content-header">
            <h1>
                Job History
                <a href="<?= base_url('welcome/list') ?>" class="btn btn-secondary float-right">Back to List</a>

            </h1>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Employee Job History</h3>
                </div>
                <div class="box-body">
                    <table id="jobHistoryTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Previous Jabatan</th>
                                <th>New Jabatan</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($jobhistory as $history) : ?>
                                <tr>
                                    <td><?= $history->NIP ?></td>
                                    <td><?= $history->previousJabatan ?></td>
                                    <td><?= $history->newJabatan ?></td>
                                    <td><?= $history->startDate ?></td>
                                    <td><?= $history->endDate ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

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