<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>




<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




<div class="section-header">
    <h1>Message</h1>
</div>
<div class="col-12 col-sm-12 col-lg-12">
    <div class="card chat-box" id="mychatbox">
        <div class="card-header">
            <?php if (in_groups('admin')) { ?>
                <h4>Chat with Users</h4>
            <?php } else { ?>
                <h4>Chat with Admin</h4>
            <?php } ?>
            <div class="card-header-action">
                <form method="POST" action="/message/deleteall">
                    <button class=" btn btn-danger btn-sm" onclick="return confirm('Hapus semua?');"><span class="fa fa-trash"></span></button>
                </form>
            </div>
        </div>
        <div class="card-body chat-content" id="tampil">
        </div>
        <div class="card-footer chat-form">
            <?php if (in_groups('admin')) { ?>
                <div class="col-md-5" style="position:relative;margin-top: -38px; margin-left: 145px;">
                    <div class="list-group" id="show-list">

                    </div>
                </div>
            <?php } ?>
            <form method="POST" action="/message/kirim" id="chat-form">
                <?php if (in_groups('admin')) { ?>
                    <input type="hidden" name="id" id="penerima">
                    <input type="text" style="border: 0ch;" autocomplete="off" name="nama" id="search" placeholder="Nama Penerima">
                <?php } ?>
                <input autocomplete="off" name="pesan" type="text" class="form-control" placeholder="Type a message" required>
                <button type="submit" class="btn btn-primary">
                    <i class="far fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        // untuk search
        $("#search").keyup(function() {
            var searchText = $(this).val();
            if (searchText != '') {
                $.ajax({
                    url: '/message/search',
                    method: 'post',
                    data: {
                        query: searchText
                    },
                    success: function(response) {
                        $("#show-list").html(response);
                    }
                });
            } else {
                $("#show-list").html('');
            }
        });

        // untuk search juga
        $(document).on('click', 'a', function() {
            $("#search").val($(this).text());
            $("#penerima").val($("#id").val());
            $("#show-list").html('');
        });
    })
</script>
<!-- jquery -->
<script type="text/javascript">
    // membuat jquery pertama kali di jalankan jika halaman di refresh
    $(document).ready(function() {
        loadData();


        $('form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function() {
                    loadData();
                    resetForm();
                }
            });
        })
    })

    // mendefinisikan function load data, dan memanggil tampilan serta menampilkannya
    function loadData() {
        $.get('/message/tampil', function(data) {
            $('#tampil').html(data);
            $('#tampil').scrollTop($('#tampil')[0].scrollHeight);
        })
    }

    // untuk menghapus data pda kolom input
    function resetForm() {
        $('[type=text').val('');
        $('[name=pesan').focus();
    }
</script>
<?= $this->endSection(); ?>