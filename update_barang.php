<?php
require "koneksi.php";
$sql=mysqli_query($koneksi, "select * from barang where kode_barang='$_GET[kode]'");
$data= mysqli_fetch_array($sql);
?>

<h3> Ubah Data Barang </h3>

<form action="" method="post">
    <table>
        <tr>
            <td width="120"> Kode Barang </td>
            <td><input type="text" name="kode_barang" value="<?php echo $data['kode_barang']; ?>"> </td>
        </tr>
        <tr>
            <td width="120"> Nama Barang </td>
            <td><input type="text" name="nama_barang"  value="<?php echo $data['nama_barang']; ?>"> </td>
        </tr>
        <tr>
            <td width="120"> Harga </td>
            <td><input type="text" name="harga_barang"  value="<?php echo $data['harga_barang']; ?>"> </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="proses" value="Ubah"> </td>
            <td></td>
            <input type="button" value="Go back!" onclick="history.back()">
        </tr>
</table>

</form>

<?php
include "koneksi.php";

if(isset($_POST['proses'])){
    mysqli_query($koneksi, "update barang set
    nama_barang = '$_POST[nama_barang]',
    harga_barang = '$_POST[harga]'
    where kode_barang = '$_GET[kode]'");

    echo "Data barang telah tersimpan";
    echo "<meta http-equiv=refresh content=1;URL='barang-tambah.php'>";
}
?>