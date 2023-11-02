<?php $this->load->view('backend/template/meta') ?>

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Interview</b>&nbsp;Test</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <!-- Display default admin and user credentials for demo -->
                <p class="login-box-msg">Login admin: User: admin Pass: Admin</p>
                <p class="login-box-msg">Login user: User: user Pass: user</p>
                
                <!-- Display error messages if any -->
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error') ?>
                    </div>
                <?php endif; ?>
                
                <!-- Login form -->
                <form action="<?= base_url('loginController/authenticate') ?>" method="post">
                    <div class="input-group mb-3">
                        <!-- Username input field -->
                        <input type="text" class="form-control" placeholder="Username" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <!-- User icon for the username input field -->
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <!-- Password input field -->
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <!-- Lock icon for the password input field -->
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <!-- Remember Me checkbox -->
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <!-- Submit button for the form -->
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
