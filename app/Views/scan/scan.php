<?= $this->extend('templates/starting_page_layout'); ?>

<?= $this->section('navaction') ?>
<a href="<?= base_url('/admin'); ?>" class="btn btn-primary pull-right pl-3">
    <i class="material-icons mr-2">dashboard</i>
    Dashboard
</a>
<?= $this->endSection() ?>

<?= $this->section('content'); ?>
<?php
   $oppBtn = '';
   $waktu == 'Masuk' ? $oppBtn = 'pulang' : $oppBtn = 'masuk';
?>

<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row mx-auto">
                <!-- Left Sidebar - Tips -->
                <div class="col-lg-3 col-xl-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-gradient-primary text-white">
                            <h4 class="card-title mb-0"><b>Tips & Panduan</b></h4>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-info">
                                <strong>Panduan Scan:</strong>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex align-items-center">
                                    <i class="material-icons text-success mr-2">check_circle</i>
                                    Tunjukkan QR code sampai terlihat jelas di kamera
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <i class="material-icons text-success mr-2">check_circle</i>
                                    Posisikan QR code tidak terlalu jauh maupun terlalu dekat
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <i class="material-icons text-success mr-2">check_circle</i>
                                    Pastikan pencahayaan cukup untuk hasil terbaik
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="card shadow-sm border-0 mt-3">
                        <div class="card-header bg-gradient-info text-white">
                            <h4 class="card-title mb-0"><i class="material-icons mr-2">bar_chart</i> Statistik Hari Ini</h4>
                        </div>
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-6">
                                    <div class="p-2 bg-success-light rounded">
                                        <h3 class="text-success mb-0"><?= $statistik['hadir']; ?></h3>
                                        <small class="text-success">Hadir</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-2 bg-warning-light rounded">
                                        <h3 class="text-warning mb-0"><?= $statistik['terlambat']; ?></h3>
                                        <small class="text-warning">Terlambat</small>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2 text-center">
                                <small class="text-muted">Data diperbarui real-time</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Scanner Area -->
                <div class="col-lg-6 col-xl-4">
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-gradient-primary text-white">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title mb-1"><b>Absen <?= $waktu; ?></b></h4>
                                    <h6 class="card-title mb-0">Silahkan tunjukkan QR Code anda</h6>
                                </div>
                                <div class="col-md-auto">
                                    <a href="<?= base_url("scan/$oppBtn"); ?>" 
                                       class="btn btn-<?= $oppBtn == 'masuk' ? 'success' : 'warning'; ?> btn-sm">
                                        <i class="material-icons mr-1">swap_horiz</i>
                                        Absen <?= $oppBtn; ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <!-- Camera Selection -->
                            <div class="form-group mb-4">
                                <label class="font-weight-bold">Pilih Kamera</label>
                                <select id="pilihKamera" class="form-control">
                                    <option selected>Pilih perangkat kamera...</option>
                                </select>
                            </div>

                            <!-- Scanner Preview -->
                            <div class="scanner-container mb-4">
                                <div class="scanner-overlay text-center py-4" id="searching">
                                    <div class="spinner-border text-primary mb-2" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <h5 class="text-muted">Mencari QR Code...</h5>
                                </div>
                                <video id="previewKamera" class="w-100 rounded border" style="max-height: 310px; display: none;"></video>
                            </div>

                            <!-- Scan Results -->
                            <div id="hasilScan" class="mt-4"></div>
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar - Usage Guide -->
                <!-- Right Sidebar - Usage Guide -->
<div class="col-lg-3 col-xl-4">
    <!-- Jam Real-time -->
    <div class="card shadow-sm border-0 mb-3">
        <div class="card-header bg-gradient-success text-white">
            <h4 class="card-title mb-0 text-center"><b>Jam Sekarang</b></h4>
        </div>
        <div class="card-body text-center">
            <div id="jam-realtime" class="display-4 font-weight-bold text-success mb-2">
                <span id="jam">00:00:00</span>
            </div>
            <div id="tanggal" class="text-muted">
                <?= date('d F Y'); ?>
            </div>
        </div>
    </div>

    <!-- <div class="card shadow-sm border-0">
        <div class="card-header bg-gradient-info text-white">
            <h4 class="card-title mb-0"><b>Cara Penggunaan</b></h4>
        </div>
        <div class="card-body">
            <div class="list-group list-group-flush">
                <div class="list-group-item px-0">
                    <div class="d-flex align-items-start">
                        <i class="material-icons text-primary mr-2 mt-1">qr_code</i>
                        <div>
                            <h6 class="mb-1 text-primary">Scan QR Code</h6>
                            <small class="text-muted">Arahkan kamera ke QR code siswa/guru</small>
                        </div>
                    </div>
                </div>
                <div class="list-group-item px-0">
                    <div class="d-flex align-items-start">
                        <i class="material-icons text-success mr-2 mt-1">notifications</i>
                        <div>
                            <h6 class="mb-1 text-success">Notifikasi Otomatis</h6>
                            <small class="text-muted">Notifikasi WhatsApp akan dikirim otomatis</small>
                        </div>
                    </div>
                </div>
                <div class="list-group-item px-0">
                    <div class="d-flex align-items-start">
                        <i class="material-icons text-warning mr-2 mt-1">swap_horiz</i>
                        <div>
                            <h6 class="mb-1 text-warning">Ganti Waktu</h6>
                            <small class="text-muted">Klik tombol untuk ganti waktu absensi</small>
                        </div>
                    </div>
                </div>
                <div class="list-group-item px-0">
                    <div class="d-flex align-items-start">
                        <i class="material-icons text-info mr-2 mt-1">dashboard</i>
                        <div>
                            <h6 class="mb-1 text-info">Monitoring</h6>
                            <small class="text-muted">Pantau data absensi di dashboard</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
            </div>
        </div>
    </div>
</div>

<style>
.scanner-container {
    position: relative;
    border: 2px solid #e3f2fd;
    border-radius: 8px;
    background: #f8f9fa;
    min-height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.scanner-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    z-index: 2;
}

.bg-success-light {
    background-color: rgba(76, 175, 80, 0.1) !important;
}

.bg-warning-light {
    background-color: rgba(255, 152, 0, 0.1) !important;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #4CAF50 0%, #2196F3 100%) !important;
}

.bg-gradient-info {
    background: linear-gradient(135deg, #00BCD4 0%, #3F51B5 100%) !important;
}

.card {
    transition: transform 0.2s ease-in-out;
}

.card:hover {
    transform: translateY(-2px);
}

.list-group-item {
    border: none;
    padding: 12px 0;
}

/* Efek untuk update statistik */
.highlight-update {
    animation: pulse-update 1s ease-in-out;
    box-shadow: 0 0 0 2px rgba(76, 175, 80, 0.3);
}

@keyframes pulse-update {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

/* Tambahkan di bagian CSS yang sudah ada */
.bg-gradient-success {
    background: linear-gradient(135deg, #4CAF50 0%, #2E7D32 100%) !important;
}

#jam-realtime {
    font-family: 'Courier New', monospace;
    letter-spacing: 2px;
}

.display-4 {
    font-size: 2.5rem;
    font-weight: 300;
    line-height: 1.2;
}

/* SweetAlert2 Custom Styles */
.swal2-popup {
    border-radius: 1rem !important;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25) !important;
}

.swal2-confirm {
    border-radius: 0.75rem !important;
    padding: 0.75rem 2rem !important;
    font-weight: 600 !important;
    transition: all 0.3s ease !important;
}

.swal2-confirm:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2) !important;
}

/* Efek untuk update statistik */
.highlight-update {
    animation: pulse-update 1s ease-in-out;
    box-shadow: 0 0 0 2px rgba(76, 175, 80, 0.3);
}

@keyframes pulse-update {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

/* Scanner styles tetap sama */
.scanner-container {
    position: relative;
    border: 2px solid #e3f2fd;
    border-radius: 8px;
    background: #f8f9fa;
    min-height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.scanner-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    z-index: 2;
}
</style>

<script type="text/javascript" src="<?= base_url('assets/js/plugins/zxing/zxing.min.js') ?>"></script>
<script src="<?= base_url('assets/js/core/jquery-3.5.1.min.js') ?>"></script>
<script type="text/javascript">
    let selectedDeviceId = null;
    let audio = new Audio("<?= base_url('assets/audio/beep.mp3'); ?>");
    const codeReader = new ZXing.BrowserMultiFormatReader();
    const sourceSelect = $('#pilihKamera');

    $(document).ready(function() {
        console.log('Document ready, initializing scanner...');
        initScanner();
        updateJam();
    });

    // Fungsi untuk update jam real-time
    function updateJam() {
        const now = new Date();
        const jam = now.getHours().toString().padStart(2, '0');
        const menit = now.getMinutes().toString().padStart(2, '0');
        const detik = now.getSeconds().toString().padStart(2, '0');
        
        const waktuString = `${jam}:${menit}:${detik}`;
        document.getElementById('jam').textContent = waktuString;
        
        if (!window.tanggalDiperbarui || window.tanggalDiperbarui !== now.toDateString()) {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const tanggalString = now.toLocaleDateString('id-ID', options);
            document.getElementById('tanggal').textContent = tanggalString;
            window.tanggalDiperbarui = now.toDateString();
        }
    }

    setInterval(updateJam, 1000);

    $(document).on('change', '#pilihKamera', function() {
       selectedDeviceId = $(this).val();
       if (codeReader) {
          codeReader.reset();
          initScanner();
       }
    });

    function initScanner() {
       codeReader.listVideoInputDevices()
          .then(videoInputDevices => {
             if (videoInputDevices.length < 1) {
                alert("Camera not found!");
                return;
             }

             if (selectedDeviceId == null) {
                selectedDeviceId = videoInputDevices.length <= 1 ? videoInputDevices[0].deviceId : videoInputDevices[1].deviceId;
             }

             if (videoInputDevices.length >= 1) {
                sourceSelect.html('');
                videoInputDevices.forEach((element) => {
                   const sourceOption = document.createElement('option')
                   sourceOption.text = element.label
                   sourceOption.value = element.deviceId
                   if (element.deviceId == selectedDeviceId) {
                      sourceOption.selected = 'selected';
                   }
                   sourceSelect.append(sourceOption)
                })
             }

             $('#previewKamera').show();
             $('#searching').hide();

             codeReader.decodeOnceFromVideoDevice(selectedDeviceId, 'previewKamera')
                .then(result => {
                   console.log('QR Code detected:', result.text);
                   cekData(result.text);

                   $('#previewKamera').hide();
                   $('#searching').show();

                   if (codeReader) {
                      codeReader.reset();
                      setTimeout(() => {
                         initScanner();
                      }, 2500);
                   }
                })
                .catch(err => console.error('QR Scan error:', err));
          })
          .catch(err => console.error('Camera access error:', err));
    }

    // Fungsi untuk update statistik
    function updateStatistik() {
        jQuery.ajax({
            url: "<?= base_url('scan/statistik'); ?>",
            type: 'get',
            dataType: 'json',
            cache: false,
            success: function(response) {
                $('.bg-success-light h3').text(response.hadir);
                $('.bg-warning-light h3').text(response.terlambat);
                
                $('.bg-success-light, .bg-warning-light').addClass('highlight-update');
                setTimeout(function() {
                    $('.bg-success-light, .bg-warning-light').removeClass('highlight-update');
                }, 1000);
            },
            error: function(xhr, status, thrown) {
                console.log('Failed to get statistics:', thrown);
            }
        });
    }

    async function cekData(code) {
       jQuery.ajax({
          url: "<?= base_url('scan/cek'); ?>",
          type: 'post',
          data: {
             'unique_code': code,
             'waktu': '<?= strtolower($waktu); ?>'
          },
          success: function(response, status, xhr) {
             audio.play();
             
             // Tampilkan SweetAlert2 dengan response
             Swal.fire({
                 html: response,
                 width: 800,
                 showCloseButton: true,
                 showConfirmButton: true,
                 confirmButtonText: 'Scan Lagi',
                 confirmButtonColor: '#4CAF50',
                 background: 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                 backdrop: 'rgba(0,0,0,0.4)',
                 customClass: {
                     popup: 'rounded-2xl shadow-2xl',
                     confirmButton: 'px-6 py-3 rounded-lg font-semibold shadow-lg hover:shadow-xl transition-all duration-300'
                 },
                 didOpen: () => {
                     // Animasi masuk
                     const popup = Swal.getPopup();
                     popup.style.transform = 'scale(0.8)';
                     popup.animate([
                         { transform: 'scale(0.8)', opacity: 0 },
                         { transform: 'scale(1)', opacity: 1 }
                     ], {
                         duration: 300,
                         easing: 'ease-out'
                     });
                 }
             }).then((result) => {
                 if (result.isConfirmed) {
                     // Lanjutkan scanning
                     setTimeout(() => {
                         initScanner();
                     }, 500);
                 }
             });

             // Update statistik
             setTimeout(function() {
                 updateStatistik();
             }, 500);
          },
          error: function(xhr, status, thrown) {
             console.log('Scan error:', thrown);
             
             // Tampilkan error dengan SweetAlert2
             Swal.fire({
                 icon: 'error',
                 title: 'Terjadi Kesalahan',
                 text: 'Error: ' + thrown,
                 confirmButtonText: 'Coba Lagi',
                 confirmButtonColor: '#f44336',
                 background: '#fff',
                 customClass: {
                     popup: 'rounded-2xl shadow-2xl'
                 }
             }).then((result) => {
                 if (result.isConfirmed) {
                     setTimeout(() => {
                         initScanner();
                     }, 500);
                 }
             });
          }
       });
    }

    // Update statistik secara periodik setiap 10 detik
    setInterval(updateStatistik, 10000);
    setTimeout(updateStatistik, 1000);
</script>

<?= $this->endSection(); ?>