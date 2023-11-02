<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>User Registration</title>
</head>
<body>

<!-- Navigation bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Navbar toggler button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar title link -->
        <a class="navbar-brand" href="#">Login & Register</a>
        <!-- Collapsible navbar links -->
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('welcome/login')?>">Login</a>
                </li>
            </ul>
            <!-- Navbar search form -->
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<!-- Registration form -->
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card" style="margin-top: 30px">
                <div class="card-header text-center">
                    Register Now
                </div>
                <div class="card-body">
                    <form method="post" autocomplete="off" action="<?=base_url('welcome/registerNow')?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" placeholder="User Name" name="username" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" placeholder="Email Address" name="email" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" placeholder="User Password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
						<div class="mb-3">
    <label for="nip" class="form-label">NIP</label>
    <input type="text" placeholder="NIP" name="nip" class="form-control" id="nip">
</div>

<div class="mb-3">
    <label for="nama" class="form-label">Full Name</label>
    <input type="text" placeholder="Full Name" name="nama" class="form-control" id="nama">
</div>

<div class="mb-3">
    <label for="jenisKelamin" class="form-label">Gender</label>
    <select name="jenisKelamin" class="form-control" id="jenisKelamin">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
</div>

<div class="mb-3">
    <label for="jabatan" class="form-label">Position</label>
    <input type="text" placeholder="Position" name="jabatan" class="form-control" id="jabatan">
</div>

<div class="mb-3">
    <label for="tanggalAktifJabatan" class="form-label">Activation Date</label>
    <input type="date" name="tanggalAktifJabatan" class="form-control" id="tanggalAktifJabatan">
</div>

<div class="mb-3">
    <label for="tanggalMasuk" class="form-label">Joining Date</label>
    <input type="date" name="tanggalMasuk" class="form-control" id="tanggalMasuk">
</div>

<div class="mb-3">
    <label for="statusKaryawan" class="form-label">Employment Status</label>
    <select name="statusKaryawan" class="form-control" id="statusKaryawan">
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select>
</div>
<div class="mb-3">
    <label for="roles" class="form-label">Roles</label>
    <select name="roles" class="form-control" id="roles">
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select>
</div>
                        <!-- Submit button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Register Now</button>
                        </div>
                        <!-- Registration success message -->
                        <?php if($this->session->flashdata('success')) { ?>
                            <p class="text-success text-center" style="margin-top: 10px;"><?=$this->session->flashdata('success')?></p>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
        <!-- Empty column for centering the form -->
        <div class="col-md-4"></div>
    </div>
</div>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
