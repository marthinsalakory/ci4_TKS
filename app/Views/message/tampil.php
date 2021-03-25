<?php foreach ($message as $m) : ?>
    <?php if ($m['penerima'] == user()->id || $m['pengirim'] == user()->id) { ?>
        <?php if ($m['pengirim'] == user()->id) { ?>
            <div class="chat-item chat-right">
                <!-- <img src="../dist/img/avatar/avatar-2.png"> -->
                <div class="chat-details">
                    <?php if (in_groups('admin')) { ?>
                        <div class="chat-time"><b>You -> <?= $m['nama_penerima']; ?></b></div>
                    <?php } else { ?>
                        <div class="chat-time"><b>You</b></div>
                    <?php } ?>
                    <div class="chat-text"><?= $m['pesan']; ?></div>
                    <div class="chat-time"><?= $m['date']; ?></div>
                </div>
            </div>
        <?php } else { ?>
            <div class="chat-item chat-left">
                <!-- <img src="../dist/img/avatar/avatar-1.png"> -->
                <div class="chat-details">
                    <?php if (in_groups('admin')) { ?>
                        <div class="chat-time"><b><?= $m['nama_lengkap']; ?> -> You</b></div>
                    <?php } else { ?>
                        <div class="chat-time"><b>Admin</b></div>
                    <?php } ?>
                    <div class="chat-text"><?= $m['pesan']; ?></div>
                    <div class="chat-time"><?= $m['date']; ?></div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
<?php endforeach; ?>
<!-- <div class="chat-item chat-left chat-typing" id="bawa">
    <img src="../dist/img/avatar/avatar-1.png">
    <div class="chat-details">
        <div class="chat-text">
        </div>
    </div>
</div> -->