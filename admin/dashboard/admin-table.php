<?php
// include '../../template/admin/header-dashboard.php';
require_once '../../core/init.php';
if (!Session::exists('email')) {
    header('Location: ../index.php');
}
$datas = $user->getAllData('users');
$i = 1;
$active = 'masterdata';
?>

<?php ob_start()  ?>
    <div id="content">
    <?php include '../../template/admin/nav-admin.php'; ?>

        <div class="container">
            <table class="table table-bordered table-striped data">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">No.</th>
                        <th scope="col" class="text-center">Nama</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datas as $data) {
    ?>
                    <tr>
                        <th scope="col" class="text-center"><?= $i ?></th>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['email'] ?></td>
                        <td class="text-center">
                        <a href="update-admin.php?id=<?= $data['id'] ?>"><i class="fas fa-edit text-info"></i></a> | <a href="delete.php?id=<?= $data['id']?>" onclick="javascript: return confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash-alt text-danger"></i></a>
                        </td>
                    </tr>
                    <?php $i++ ?>    
                    <?php
} ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php $content = ob_get_clean() ?>
    <!-- end #content -->
    
 <?php include '../../template/admin/main.php' ?>