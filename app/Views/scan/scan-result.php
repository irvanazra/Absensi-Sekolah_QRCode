<?php
use App\Libraries\enums\TipeUser;

switch ($type) {
   case TipeUser::Siswa:
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <div class="d-flex align-items-center">
        <i class="material-icons mr-2">check_circle</i>
        <h4 class="alert-heading mb-0 text-dark">Absen <?= $waktu; ?> Berhasil!</h4>
    </div>
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
                    <?= jam($presensi); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 text-center">
        <small class="text-muted">
            Notifikasi WhatsApp telah dikirim
        </small>
    </div>
</div>
<?php break;

   case TipeUser::Guru:
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <div class="d-flex align-items-center">
        <i class="material-icons mr-2">check_circle</i>
        <h4 class="alert-heading mb-0 text-dark">Absen <?= $waktu; ?> Berhasil!</h4>
    </div>
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
                    <?= jam($presensi); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 text-center">
        <small class="text-muted">
            Notifikasi WhatsApp telah dikirim
        </small>
    </div>
</div>
<?php break;

   default:
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="material-icons mr-2">error</i>
    <strong class="text-dark">Tipe tidak valid!</strong> Silahkan coba lagi.
</div>
<?php
      break;
}

function jam($presensi)
{
?>
<div class="list-group list-group-flush">
    <div class="list-group-item d-flex justify-content-between align-items-center bg-transparent px-0">
        <span class="font-weight-bold text-dark">Jam Masuk:</span>
        <span class="badge badge-primary badge-pill"><?= $presensi['jam_masuk'] ?? '-'; ?></span>
    </div>
    <div class="list-group-item d-flex justify-content-between align-items-center bg-transparent px-0">
        <span class="font-weight-bold text-dark">Jam Pulang:</span>
        <span class="badge badge-info badge-pill"><?= $presensi['jam_keluar'] ?? '-'; ?></span>
    </div>
</div>
<?php
}
?>