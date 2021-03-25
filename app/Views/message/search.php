<?php foreach ($tes as $us) { ?>
    <a href="#" class=" list-group-item list-group-item-action border-1"><?= $us['nama_lengkap']; ?></a>
    <input type="hidden" name="id" id="id" value="<?= $us['id']; ?>">
<?php } ?>