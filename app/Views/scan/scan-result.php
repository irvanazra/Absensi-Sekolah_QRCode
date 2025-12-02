<?php
use App\Libraries\enums\TipeUser;

switch ($type) {
   case TipeUser::Siswa:
?>
<div class="bg-gradient-to-r from-green-400 to-blue-500 rounded-2xl p-6 shadow-2xl max-w-4xl mx-auto mt-4">
    <!-- Header Success -->
    <div class="flex items-center justify-center mb-6">
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mr-4">
            <i class="material-icons text-green-500 text-3xl">check_circle</i>
        </div>
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Absen <?= $waktu; ?> Berhasil!</h2>
            <p class="text-green-600 font-semibold">Siswa berhasil melakukan absensi</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <!-- Informasi Siswa -->
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-5 border border-blue-100">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                    <i class="material-icons text-white text-lg">person</i>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Informasi Siswa</h3>
            </div>
            
            <div class="space-y-3">
                <div class="flex justify-between items-center py-2 border-b border-blue-100">
                    <span class="font-semibold text-gray-700">Nama:</span>
                    <span class="text-gray-900 font-medium"><?= $data['nama_siswa']; ?></span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-blue-100">
                    <span class="font-semibold text-gray-700">NIS:</span>
                    <span class="text-gray-900 font-medium"><?= $data['nis']; ?></span>
                </div>
                <div class="flex justify-between items-center py-2">
                    <span class="font-semibold text-gray-700">Kelas:</span>
                    <span class="text-gray-900 font-medium"><?= $data['kelas'] . ' ' . $data['jurusan']; ?></span>
                </div>
            </div>
        </div>

        <!-- Waktu Absensi -->
        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-5 border border-green-100">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center mr-3">
                    <i class="material-icons text-white text-lg">schedule</i>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Waktu Absensi</h3>
            </div>
            <?= jam($presensi); ?>
        </div>
    </div>

    <!-- Notifikasi WhatsApp -->
    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 text-center">
        <div class="flex items-center justify-center">
            <i class="material-icons text-blue-500 mr-2">notifications</i>
            <span class="text-blue-700 font-medium">Notifikasi WhatsApp telah dikirim ke orang tua</span>
        </div>
    </div>
</div>
<?php break;

   case TipeUser::Guru:
?>
<div class="bg-gradient-to-r from-green-400 to-blue-500 rounded-2xl p-6 shadow-2xl max-w-4xl mx-auto mt-4">
    <!-- Header Success -->
    <div class="flex items-center justify-center mb-6">
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mr-4">
            <i class="material-icons text-green-500 text-3xl">check_circle</i>
        </div>
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Absen <?= $waktu; ?> Berhasil!</h2>
            <p class="text-green-600 font-semibold">Guru berhasil melakukan absensi</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <!-- Informasi Guru -->
        <div class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-xl p-5 border border-purple-100">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center mr-3">
                    <i class="material-icons text-white text-lg">school</i>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Informasi Guru</h3>
            </div>
            
            <div class="space-y-3">
                <div class="flex justify-between items-center py-2 border-b border-purple-100">
                    <span class="font-semibold text-gray-700">Nama:</span>
                    <span class="text-gray-900 font-medium"><?= $data['nama_guru']; ?></span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-purple-100">
                    <span class="font-semibold text-gray-700">NUPTK:</span>
                    <span class="text-gray-900 font-medium"><?= $data['nuptk']; ?></span>
                </div>
                <div class="flex justify-between items-center py-2">
                    <span class="font-semibold text-gray-700">No HP:</span>
                    <span class="text-gray-900 font-medium"><?= $data['no_hp']; ?></span>
                </div>
            </div>
        </div>

        <!-- Waktu Absensi -->
        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-5 border border-green-100">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center mr-3">
                    <i class="material-icons text-white text-lg">schedule</i>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Waktu Absensi</h3>
            </div>
            <?= jam($presensi); ?>
        </div>
    </div>

    <!-- Notifikasi WhatsApp -->
    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 text-center">
        <div class="flex items-center justify-center">
            <i class="material-icons text-blue-500 mr-2">notifications</i>
            <span class="text-blue-700 font-medium">Notifikasi WhatsApp telah dikirim</span>
        </div>
    </div>
</div>
<?php break;

   default:
?>
<div class="bg-white rounded-2xl p-6 shadow-2xl max-w-md mx-auto text-center">
    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
        <i class="material-icons text-red-500 text-3xl">error</i>
    </div>
    <h3 class="text-xl font-bold text-gray-800 mb-2">Tipe tidak valid!</h3>
    <p class="text-gray-600">Silahkan coba lagi</p>
</div>
<?php
      break;
}

function jam($presensi)
{
?>
<div class="space-y-3">
    <div class="flex justify-between items-center py-2 border-b border-green-100">
        <span class="font-semibold text-gray-700">Jam Masuk:</span>
        <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-medium">
            <?= $presensi['jam_masuk'] ?? '-'; ?>
        </span>
    </div>
    <div class="flex justify-between items-center py-2">
        <span class="font-semibold text-gray-700">Jam Pulang:</span>
        <span class="bg-teal-500 text-white px-3 py-1 rounded-full text-sm font-medium">
            <?= $presensi['jam_keluar'] ?? '-'; ?>
        </span>
    </div>
</div>
<?php
}
?>