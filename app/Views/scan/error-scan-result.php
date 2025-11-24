<?php
use App\Libraries\enums\TipeUser;
?>
<div class="bg-white rounded-2xl p-6 shadow-2xl max-w-4xl mx-auto">
    <!-- Header Error -->
    <div class="flex items-center justify-center mb-6">
        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mr-4">
            <i class="material-icons text-red-500 text-3xl">warning</i>
        </div>
        <div>
            <h2 class="text-2xl font-bold text-gray-800"><?= $msg; ?></h2>
            <p class="text-red-600 font-semibold">Periksa informasi di bawah</p>
        </div>
    </div>
    
    <?php
    if (!empty($type)) {
        switch ($type) {
            case TipeUser::Siswa: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-gradient-to-br from-orange-50 to-amber-50 rounded-xl p-5 border border-orange-100">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center mr-3">
                                <i class="material-icons text-white text-lg">person</i>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800">Informasi Siswa</h3>
                        </div>
                        
                        <div class="space-y-3">
                            <div class="flex justify-between items-center py-2 border-b border-orange-100">
                                <span class="font-semibold text-gray-700">Nama:</span>
                                <span class="text-gray-900 font-medium"><?= $data['nama_siswa']; ?></span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-orange-100">
                                <span class="font-semibold text-gray-700">NIS:</span>
                                <span class="text-gray-900 font-medium"><?= $data['nis']; ?></span>
                            </div>
                            <div class="flex justify-between items-center py-2">
                                <span class="font-semibold text-gray-700">Kelas:</span>
                                <span class="text-gray-900 font-medium"><?= $data['kelas'] . ' ' . $data['jurusan']; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-gray-50 to-slate-50 rounded-xl p-5 border border-gray-100">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-gray-500 rounded-full flex items-center justify-center mr-3">
                                <i class="material-icons text-white text-lg">schedule</i>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800">Waktu Absensi</h3>
                        </div>
                        <?= jam($presensi ?? []); ?>
                    </div>
                </div>
            <?php break;

            case TipeUser::Guru: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-gradient-to-br from-orange-50 to-amber-50 rounded-xl p-5 border border-orange-100">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center mr-3">
                                <i class="material-icons text-white text-lg">school</i>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800">Informasi Guru</h3>
                        </div>
                        
                        <div class="space-y-3">
                            <div class="flex justify-between items-center py-2 border-b border-orange-100">
                                <span class="font-semibold text-gray-700">Nama:</span>
                                <span class="text-gray-900 font-medium"><?= $data['nama_guru']; ?></span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-orange-100">
                                <span class="font-semibold text-gray-700">NUPTK:</span>
                                <span class="text-gray-900 font-medium"><?= $data['nuptk']; ?></span>
                            </div>
                            <div class="flex justify-between items-center py-2">
                                <span class="font-semibold text-gray-700">No HP:</span>
                                <span class="text-gray-900 font-medium"><?= $data['no_hp']; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-gray-50 to-slate-50 rounded-xl p-5 border border-gray-100">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-gray-500 rounded-full flex items-center justify-center mr-3">
                                <i class="material-icons text-white text-lg">schedule</i>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800">Waktu Absensi</h3>
                        </div>
                        <?= jam($presensi ?? []); ?>
                    </div>
                </div>
            <?php break;

            default: ?>
                <div class="bg-red-50 border border-red-200 rounded-xl p-4 text-center">
                    <p class="text-red-700 font-medium">Tipe tidak valid</p>
                </div>
        <?php break;
        }
    }
    ?>
</div>

<?php
function jam($presensi)
{
?>
<div class="space-y-3">
    <div class="flex justify-between items-center py-2 border-b border-gray-100">
        <span class="font-semibold text-gray-700">Jam Masuk:</span>
        <span class="bg-gray-500 text-white px-3 py-1 rounded-full text-sm font-medium">
            <?= $presensi['jam_masuk'] ?? '-'; ?>
        </span>
    </div>
    <div class="flex justify-between items-center py-2">
        <span class="font-semibold text-gray-700">Jam Pulang:</span>
        <span class="bg-gray-500 text-white px-3 py-1 rounded-full text-sm font-medium">
            <?= $presensi['jam_keluar'] ?? '-'; ?>
        </span>
    </div>
</div>
<?php
}
?>