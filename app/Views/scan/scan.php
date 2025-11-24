<?= $this->extend('templates/starting_page_layout'); ?>

<?= $this->section('navaction') ?>
<a href="<?= base_url('/admin'); ?>" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition-all duration-300 transform hover:-translate-y-1 ml-auto">
    <i class="material-icons mr-2 text-white">dashboard</i>
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
                    <!-- Quick Stats - Vertikal dengan Tailwind -->
<div class="card shadow-sm border-0">
    <div class="card-header bg-gradient-to-r from-blue-500 to-blue-700 text-white py-3">
        <h4 class="card-title mb-0 flex items-center text-lg font-bold">
            <i class="material-icons mr-2">bar_chart</i> 
            Statistik Hari Ini
        </h4>
    </div>
    <div class="card-body p-4">
        <div class="flex flex-col space-y-4">
            <!-- Hadir -->
            <div class="text-center bg-green-50 rounded-xl p-4 border-2 border-green-200 shadow-md transition-all duration-300 hover:shadow-lg">
                <div class="flex items-center justify-center mb-3">
                    <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center mr-3">
                        <i class="material-icons text-white text-lg">check_circle</i>
                    </div>
                    <h5 class="text-green-700 font-bold text-lg">Hadir</h5>
                </div>
                <div class="text-5xl font-bold text-green-600 mb-1"><?= $statistik['hadir']; ?></div>
                <div class="text-green-500 font-medium">Orang</div>
            </div>
            
            <!-- Terlambat -->
            <div class="text-center bg-orange-50 rounded-xl p-4 border-2 border-orange-200 shadow-md transition-all duration-300 hover:shadow-lg">
                <div class="flex items-center justify-center mb-3">
                    <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center mr-3">
                        <i class="material-icons text-white text-lg">schedule</i>
                    </div>
                    <h5 class="text-orange-700 font-bold text-lg">Terlambat</h5>
                </div>
                <div class="text-5xl font-bold text-orange-600 mb-1"><?= $statistik['terlambat']; ?></div>
                <div class="text-orange-500 font-medium">Orang</div>
            </div>
        </div>
    </div>
</div>
                </div>

                <!-- Main Scanner Area -->
                <div class="bg-white rounded-2xl shadow-xl border-0 overflow-hidden transition-all duration-300 hover:shadow-2xl">
    <!-- Card Header -->
    <div class="bg-gradient-to-r from-green-500 to-blue-600 text-white px-6 py-4">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div class="mb-2 md:mb-0">
                <h4 class="text-xl font-bold">Absen <?= $waktu; ?></h4>
                <p class="text-blue-100 text-sm">Silahkan tunjukkan QR Code anda</p>
            </div>
            <div>
                <a href="<?= base_url("scan/$oppBtn"); ?>" 
                   class="inline-flex items-center px-4 py-2 rounded-lg text-white font-semibold shadow-md transition-all duration-300 transform hover:-translate-y-1 <?= $oppBtn == 'masuk' ? 'bg-green-500 hover:bg-green-600' : 'bg-yellow-500 hover:bg-yellow-600'; ?>">
                    <i class="material-icons mr-2">swap_horiz</i>
                    Absen <?= $oppBtn; ?>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Card Body -->
    <div class="p-6">
        <!-- Camera Selection -->
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Pilih Kamera</label>
            <select id="pilihKamera" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                <option selected>Pilih perangkat kamera...</option>
            </select>
        </div>

        <!-- Scanner Preview -->
        <div class="relative border-2 border-dashed border-blue-200 rounded-xl bg-gray-50 min-h-[300px] flex items-center justify-center mb-6 transition-all duration-300 hover:border-blue-300">
            <div class="absolute inset-0 flex flex-col items-center justify-center z-10" id="searching">
                <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-500 mb-4"></div>
                <h5 class="text-gray-500 font-medium">Mencari QR Code...</h5>
            </div>
            <video id="previewKamera" class="w-full rounded-lg max-h-[310px] hidden object-cover"></video>
        </div>

        <!-- Scan Results -->
        <div id="hasilScan" class="mt-6"></div>
    </div>
</div>

<div class="col-lg-3 col-xl-4">
    <!-- Jam Real-time -->
    <div class="bg-white rounded-xl shadow-md border-0 overflow-hidden mb-4 transition-all duration-300 hover:shadow-lg">
    <div class="bg-gradient-to-r from-green-500 to-green-600 text-white py-3 px-4">
        <h4 class="text-center font-bold text-lg">Jam Sekarang</h4>
    </div>
    <div class="p-6 text-center">
        <div id="jam-realtime" class="font-mono text-4xl font-bold text-green-600 mb-3 tracking-wider">
            <span id="jam">00:00:00</span>
        </div>
        <div id="tanggal" class="text-gray-500 font-medium">
            <?= date('d F Y'); ?>
        </div>
    </div>
</div>
</div>
            </div>
        </div>
    </div>
</div>

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
                // Gunakan alert sederhana seperti kode lama
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

             // Tampilkan video dan sembunyikan overlay - SEDERHANA seperti kode lama
             $('#previewKamera').removeClass('hidden');
             $('#searching').addClass('hidden');

             codeReader.decodeOnceFromVideoDevice(selectedDeviceId, 'previewKamera')
                .then(result => {
                   console.log('QR Code detected:', result.text);
                   
                   // LANGSUNG proses data seperti kode lama
                   cekData(result.text);

                   // Sembunyikan video dan tampilkan overlay
                   $('#previewKamera').addClass('hidden');
                   $('#searching').removeClass('hidden');

                   // Reset dan delay 2.5 detik seperti kode lama
                   if (codeReader) {
                      codeReader.reset();
                      setTimeout(() => {
                         initScanner();
                      }, 2500);
                   }
                })
                .catch(err => {
                   console.error('QR Scan error:', err);
                   // Auto restart sederhana seperti kode lama
                   setTimeout(() => {
                      initScanner();
                   }, 1000);
                });
          })
          .catch(err => {
             console.error('Camera access error:', err);
             alert('Cannot access camera.');
          });
    }

    // Fungsi untuk update statistik - TETAP gunakan yang baru
    function updateStatistik() {
        jQuery.ajax({
            url: "<?= base_url('scan/statistik'); ?>",
            type: 'get',
            dataType: 'json',
            cache: false,
            success: function(response) {
                const statHadir = document.querySelector('.bg-green-50 .text-5xl');
                const statTerlambat = document.querySelector('.bg-orange-50 .text-5xl');
                
                if (statHadir) statHadir.textContent = response.hadir;
                if (statTerlambat) statTerlambat.textContent = response.terlambat;

                const statsCards = document.querySelectorAll('.bg-green-50, .bg-orange-50');
                statsCards.forEach(card => {
                    card.classList.add('animate-pulse', 'ring-2');
                    setTimeout(function() {
                        card.classList.remove('animate-pulse', 'ring-2');
                    }, 1000);
                });
            },
            error: function(xhr, status, thrown) {
                console.log('Failed to get statistics:', thrown);
            }
        });
    }

    async function cekData(code) {
       // Tampilkan loading state
       $('#searching').html(`
           <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-500 mb-4"></div>
           <h5 class="text-gray-600 font-medium">Memproses QR Code...</h5>
       `);

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
                 confirmButtonColor: '#10B981'
             }).then((result) => {
                 // Reset ke state awal
                 $('#searching').html(`
                     <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-500 mb-4"></div>
                     <h5 class="text-gray-500 font-medium">Mencari QR Code...</h5>
                 `);
                 
                 // Scanner akan restart otomatis dari initScanner setelah 2.5 detik
                 // Tidak perlu memanggil initScanner() di sini
             });

             // Update statistik
             setTimeout(function() {
                 updateStatistik();
             }, 500);
          },
          error: function(xhr, status, thrown) {
             console.log('Scan error:', thrown);
             
             // Reset ke state awal
             $('#searching').html(`
                 <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-500 mb-4"></div>
                 <h5 class="text-gray-500 font-medium">Mencari QR Code...</h5>
             `);
             
             Swal.fire({
                 icon: 'error',
                 title: 'Terjadi Kesalahan',
                 text: 'Error: ' + thrown,
                 confirmButtonText: 'Coba Lagi',
                 confirmButtonColor: '#EF4444'
             }).then((result) => {
                 // Scanner akan restart otomatis dari initScanner setelah 2.5 detik
                 // Tidak perlu memanggil initScanner() di sini
             });
          }
       });
    }

    // Update statistik secara periodik setiap 10 detik
    setInterval(updateStatistik, 10000);
    setTimeout(updateStatistik, 1000);
</script>

<?= $this->endSection(); ?>