<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <!-- Tailwind CSS -->
   <script src="https://cdn.tailwindcss.com"></script>
   
   <!-- SweetAlert2 -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
   <?= $this->include('templates/css'); ?>
   <title>Absensi QR Code</title>
   <style>
      /* HAPUS CSS .bg karena sudah diganti dengan Tailwind di bawah */
      .main-panel {
         position: relative;
         float: left;
         width: calc(100%);
         transition: 0.33s, cubic-bezier(0.685, 0.0473, 0.346, 1);
         min-height: auto !important;
         height: auto !important;
      }

      video#previewKamera {
         width: 100%;
         height: 400px;
         margin: 0;
      }

      .previewParent {
         width: auto;
         height: auto;
         margin: auto;
         margin: auto;
         border: 2px solid grey;
      }

      .unpreview {
         background-color: aquamarine;
         text-align: center;
      }

      .form-select {
         min-width: 200px;
      }
      /* Hilangkan scroll global */
      html, body {
         overflow: hidden;
         height: 100%;
      }
      .content {
         padding: 0 !important;
         margin-top: 70px; /* Untuk navbar fixed */
      }

      .container-fluid {
         padding: 0 15px;
      }
   </style>
</head>

<body class="bg-gray-50 overflow-hidden h-full">
   <!-- GANTI .bg dengan Tailwind -->
   <div class="absolute inset-0 bg-gradient-to-br from-green-400 to-blue-500 opacity-90 z-0"></div>
   
   <!-- Navbar Modern dengan Tailwind CSS -->
   <nav class="bg-gradient-to-r from-blue-600 to-green-600 shadow-lg fixed top-0 left-0 right-0 z-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
         <div class="flex justify-between items-center h-16">
            <!-- Logo dan Judul -->
            <div class="flex items-center space-x-3">
               <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center shadow-md">
                  <i class="material-icons text-blue-600">qr_code_scanner</i>
               </div>
               <div>
                  <h1 class="text-white font-bold text-xl">Sistem Absensi Digital</h1>
                  <p class="text-blue-100 text-xs">SMK Negeri 1 Example</p>
               </div>
            </div>
            
            <!-- Navigation Actions -->
            <div class="flex items-center space-x-4">
               <?= $this->renderSection('navaction') ?>
            </div>
         </div>
      </div>
   </nav>
   
   <?= $this->renderSection('content') ?>
   <?= $this->include('templates/js'); ?>
</body>
</html>