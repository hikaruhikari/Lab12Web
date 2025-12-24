<?php
// Query untuk menampilkan data (Variabel $db sudah tersedia dari indeks.php root)
$sql = 'SELECT * FROM data_barang';
$result = $db->query($sql);
?>

<div class="content-wrapper">
    <header>
        <h1>Data Barang</h1>
    </header>
    <div class="main-content">
        <a href="user/tambah" class="btn-tambah">Tambah Barang</a>
        
        <table class="main">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if($result && mysqli_num_rows($result) > 0): ?>
                    <?php while($row = mysqli_fetch_array($result)): ?>
                        <tr>
                            <td><img src="modules/user/<?= $row['gambar'];?>" alt="<?=$row['nama'];?>" style="width: 50px;"></td>
                            <td><?= $row['nama'];?></td>
                            <td><?= $row['kategori'];?></td>
                            <td><?= number_format($row['harga_jual'], 0, ',', '.');?></td>
                            <td><?= number_format($row['harga_beli'], 0, ',', '.');?></td>
                            <td><?= $row['stok'];?></td>
                            <td>
                                <a href="user/ubah/<?= $row['id_barang']; ?>">Ubah</a> |
                                <a href="user/hapus/<?= $row['id_barang']; ?>" onclick="return confirm('Yakin?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="7">Belum ada data</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>