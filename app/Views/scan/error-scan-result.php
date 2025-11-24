<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <div class="d-flex align-items-center">
        <i class="material-icons mr-2">warning</i>
        <h4 class="alert-heading mb-0 text-dark"><?= $msg; ?></h4>
    </div>
    
    <?php
    use App\Libraries\enums\TipeUser;

    if (!empty($type)) {
        switch ($type) {
            case TipeUser::Siswa: ?>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card bg-light border-0">
                            <div class="card-body">
                                <h5 class="card-title text-primary">
                                    Informasi Siswa
                                </h5>
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item d-flex justify-content-between align-items-center bg-transparent px-0">
                                        <span class="font-weight-bold text-dark">Nama:</span>
                                        <span class="text-dark"><?= $data['nama_siswa']; ?></span>
                                    </div>
                                    <div class="list-group-item d-flex justify-content-between align-items-center bg-transparent px-0">
                                        <span class="font-weight-bold text-dark">NIS:</span>
                                        <span class="text-dark"><?= $data['nis']; ?></span>
                                    </div>
                                    <div class="list-group-item d-flex justify-content-between align-items-center bg-transparent px-0">
                                        <span class="font-weight-bold text-dark">Kelas:</span>
                                        <span class="text-dark"><?= $data['kelas'] . ' ' . $data['jurusan']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-light border-0">
                            <div class="card-body">
                                <h5 class="card-title text-primary">
                                    Waktu Absensi
                                </h5>
                                <?= jam($presensi ?? []); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php break;

            case TipeUser::Guru: ?>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card bg-light border-0">
                            <div class="card-body">
                                <h5 class="card-title text-primary">
                                    Informasi Guru
                                </h5>
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item d-flex justify-content-between align-items-center bg-transparent px-0">
                                        <span class="font-weight-bold text-dark">Nama:</span>
                                        <span class="text-dark"><?= $data['nama_guru']; ?></span>
                                    </div>
                                    <div class="list-group-item d-flex justify-content-between align-items-center bg-transparent px-0">
                                        <span class="font-weight-bold text-dark">NUPTK:</span>
                                        <span class="text-dark"><?= $data['nuptk']; ?></span>
                                    </div>
                                    <div class="list-group-item d-flex justify-content-between align-items-center bg-transparent px-0">
                                        <span class="font-weight-bold text-dark">No HP:</span>
                                        <span class="text-dark"><?= $data['no_hp']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-light border-0">
                            <div class="card-body">
                                <h5 class="card-title text-primary">
                                    Waktu Absensi
                                </h5>
                                <?= jam($presensi ?? []); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php break;

            default: ?>
                <p class="text-danger mt-2">
                    Tipe tidak valid
                </p>
        <?php break;
        }
    }
    ?>

    <div class="mt-3">
        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="clearData()">
            Coba Lagi
        </button>
    </div>
</div>

<?php
function jam($presensi)
{
?>
<div class="list-group list-group-flush">
    <div class="list-group-item d-flex justify-content-between align-items-center bg-transparent px-0">
        <span class="font-weight-bold text-dark">Jam Masuk:</span>
        <span class="badge badge-<?= !empty($presensi['jam_masuk']) ? 'primary' : 'secondary'; ?> badge-pill">
            <?= $presensi['jam_masuk'] ?? '-'; ?>
        </span>
    </div>
    <div class="list-group-item d-flex justify-content-between align-items-center bg-transparent px-0">
        <span class="font-weight-bold text-dark">Jam Pulang:</span>
        <span class="badge badge-<?= !empty($presensi['jam_keluar']) ? 'info' : 'secondary'; ?> badge-pill">
            <?= $presensi['jam_keluar'] ?? '-'; ?>
        </span>
    </div>
</div>
<?php
}
?>

<script>
function clearData() {
    $('#hasilScan').html('');
    location.reload();
}
</script>