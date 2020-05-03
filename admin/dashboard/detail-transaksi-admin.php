<?php
require_once '../../core/init.php';
if (!Session::exists('email')) {
    header('Location: ../index.php');
}

if (isset($_POST['submit'])) {
    $transaction = new Transaksi();
    $id = Input::get('id_pembelian');

    $data = [
        'status' => Input::get('status')
    ];

    $transaction->updateStatus($data, $id);
}

$datas1 = $transaksi->getTransaction(Input::get('id'))[0];

// echo '<pre>';
// print_r($datas1);
// echo '</pre>';
// die;

$datas2 = $transaksi->getTransaksiJoinById('pembelian_produk', 'produk', Input::get('id'), 'id_produk', 'id_pembelian');
$i = 1;
$active = 'pos';
?>

<?php ob_start()  ?>
    <div id="content">
    <?php include '../../template/admin/nav-admin.php'; ?>
        <div class="container"> 
            <p><strong>ID : <?= $datas1['id'] ?></strong></p>
            <p><strong>Nama Kasir: <?= $datas1['admin'] ?></strong></p>
            <p><strong>Tanggal Pembelian: <?= $datas1['tanggal'] ?><strong></p>
            <p><strong>Total : <?= $datas1['total'] ?><strong></p>
            <form action="" method="POST">
            <p>Status: 
                <input type="hidden" value="<?= $datas1['id'] ?>" name="id_pembelian">
                <select name="status">
                    <option value="lunas" <?= $datas1['status'] == 'lunas' ? 'selected' : '' ?> >Lunas</option>
                    <option value="bon" <?= $datas1['status'] == 'bon' ? 'selected' : '' ?> >BON</option>
                </select>
            <input type="submit" value="Update" name="submit" class="btn btn-primary mb-1 btn-sm">
            </p>
            </form>

            <table class="table table-bordered table-striped data">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">No.</th>
                        <th scope="col" class="text-center">Nama Produk</th>
                        <th scope="col" class="text-center">Harga</th>
                        <th scope="col" class="text-center">Jumlah</th>
                        <th scope="col" class="text-center">Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datas2 as $data2) {
    ?>
                    <tr>
                        <th scope="col" class="text-center"><?= $i ?></th>
                        <td><?= $data2['nama'] ?></td>
                        <td><?= $data2['harga'] ?></td>
                        <td><?= $data2['jumlah'] ?></td>
                        <td><?= $data2['harga'] * $data2['jumlah'] ?></td>
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