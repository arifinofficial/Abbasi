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

$datas1 = $transaksi->getTransaksiJoinById('pembelian', 'customer', Input::get('id'), 'id_customer', 'id');
foreach ($datas1 as $data1);
$datas2 = $transaksi->getTransaksiJoinById('pembelian_produk', 'produk', Input::get('id'), 'id_produk', 'id_pembelian');
$i = 1;
$active = 'transaksi';
?>

<?php ob_start()  ?>
    <div id="content">
    <?php include '../../template/admin/nav-admin.php'; ?>
        <div class="container"> 
            <div class="row">
                <div class="col-md-6 text-detail">
                    <table class="table">
                        <tr>
                            <td>Order ID</td>
                            <td>:</td>
                            <td><?= $data1['order_id'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $data1['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pembelian</td>
                            <td>:</td>
                            <td><?= $data1['tanggal'] ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?= $data1['email'] ?></td>
                        </tr>
                        <tr>
                            <td>No Telpon</td>
                            <td>:</td>
                            <td><?= $data1['no_telp'] ?></td>
                        </tr>
                        <tr>
                            <td>Provinsi</td>
                            <td>:</td>
                            <td><?= $transaksi->getData('city', $data1['id_city'])[0]['province'] ?></td>
                        </tr>
                        <tr>
                            <td>Kota</td>
                            <td>:</td>
                            <td><?= $transaksi->getData('city', $data1['id_city'])[0]['city_name'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $data1['alamat'] ?></td>
                        </tr>
                        <tr>
                            <td>Ekspedisi</td>
                            <td>:</td>
                            <td><?= $data1['courier'] ?></td>
                        </tr>
                    </table>
                    <form action="" method="POST">
                    <p class="text-dark">Status: 
                        <input type="hidden" value="<?= $data1['0'] ?>" name="id_pembelian">
                        <select name="status">
                            <option value="pending" <?= $data1['status'] == 'pending' ? 'selected' : '' ?> >Pending</option>
                            <option value="dikirim" <?= $data1['status'] == 'dikirim' ? 'selected' : '' ?> >Dikirim</option>
                        </select>
                    <input type="submit" value="Update" name="submit" class="btn btn-primary mb-1 btn-sm">
                    </p>
                    </form>
                </div>
                <div class="col-md-6">
                <p class="text-dark">Bukti Transfer</p>
                    <?php
                        if ($data1['bukti'] != 'null') {
                            ?>
                    <img src="../../bukti_trf/<?=$data1['bukti']?>" class="mb-4" alt="">
                    <?php
                        }
                    ?>
                </div>
            </div>

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