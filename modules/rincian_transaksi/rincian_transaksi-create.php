<?php
ob_start();
?>
<?php require_once("database.php"); ?>
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=rincian_transaksi-create?">Home</a></li>
  <li class="disabled">Data Rincian Transaksi</li>
</ul>
</nav>
<form action="" method="post">
  <!-- field jumlah -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jumlah" class="text-right middle">Jumlah</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="jumlah" placeholder="jumlah" required>
    </div>
  </div>
  <!-- field transaksi -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="transaksi_id" class="text-right middle">transaksi</label>
    </div>
    <div class="small-6 cell">
      <select name="transaksi_id">
      <option value = ""> Pilih Nomer Transaksi </option>
      <?php
        $db = new Database();
        $db->select('transaksi','id, nomer');
        $res = $db->getResult();
        foreach ($res as &$r){
          echo "<option value=$r[id]>$r[nomer]</option>";
        }    
      ?>
      </select>
    </div>
  </div>
  <!-- field tarif -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tarif_id" class="text-right middle">tarif</label>
    </div>
    <div class="small-6 cell">
    <select name="tarif_id">
    <option value = ""> Pilih Harga </option>
      <?php
        $db = new Database();
        $db->select('tarif','id, harga');
        $res = $db->getResult();
        foreach ($res as &$r){
          echo "<option value=$r[id]>$r[harga]</option>";
        }    
      ?>
      </select>
    </div>
  </div>
  <!-- Aksi -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jumlah" class="text-right middle"></label>
    </div>
    <div class="small-6 cell">
		<div class="small button-group">
  <button class="button" type="submit" name="submit">Simpan</button>
  <button class="button" type="reset">Reset</button>
  <a class="button" href='javascript:self.history.back();'>Kembali</a>
</div>
    </div>
  </div>
</form>
<?php 


// check action submit
if(isset($_POST['submit'])){
  $jumlah = $_POST['jumlah'];
  $transaksi_id = $_POST['transaksi_id'];
  $tarif_id = $_POST['tarif_id'];
  
  $db=new Database();
  $db->insert('rincian_transaksi',
  array(
    'jumlah'=>$jumlah,
    'transaksi_id'=>$transaksi_id,
    'tarif_id'=>$tarif_id
  ));
  $res=$db->getResult();
  // print_r($res);
  // redirect to list
  header('Location: /laundry2/index.php?module=rincian_transaksi');
}
?>