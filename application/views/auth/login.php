<body class="bg-gradient-primary">
<body style="background-image: url('<?= filter_var(base_url('assets/img/userb.jpg'), FILTER_DEFAULT); ?>');">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-4 mx-auto mt-4">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">SINGO LIAR Login</h1>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <form class="user" method="post" action="<?= filter_var(base_url('auth'), FILTER_DEFAULT); ?> ">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email..." value="<?= set_value('email'); ?>">
                                            <?= form_error('email', '<small class="text-danger pl-3" >', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                            <?= form_error('password', '<small class="text-danger pl-3" >', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-block">
                                            Log In
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small text-danger" href="<?= filter_var(base_url('auth/forgotpassword'), FILTER_DEFAULT); ?>">Lupa Password??</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small text-success" href="<?= filter_var(base_url('auth/registration'), FILTER_DEFAULT); ?>">Buat Akun Sekarang!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
