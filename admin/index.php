<?php 
require_once '../core/init.php';
include '../template/admin/header.php';
?>

    <section>
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-4 col-md-4 frameLogin">
                <img src="../assets/img/logo.png" alt="" class="imgLogin rounded mx-auto d-block">
                <form action="#" method="POST" class="loginForm">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="password">
                    </div>
                    <div class="col-auto">
                        <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                        <label class="form-check-label" for="autoSizingCheck">
                            Remember me
                        </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" value="login">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </section>

<?php include '../template/admin/footer.php'; ?>



