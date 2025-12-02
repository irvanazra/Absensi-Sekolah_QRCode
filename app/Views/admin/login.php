<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Petugas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-blue-600 to-green-600 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform transition-all duration-300 hover:shadow-2xl">
            <!-- Header Card -->
            <div class="bg-gradient-to-r from-primary-500 to-primary-700 p-6 text-white">
                <h1 class="text-2xl font-bold">Login Petugas</h1>
                <p class="text-primary-100 mt-2">Silahkan masukkan username dan password anda</p>
            </div>

            <!-- Message Block (placeholder) -->
            <div class="p-4">
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded hidden" id="message-block">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-yellow-400"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-yellow-700" id="message-text">
                                <!-- Message content will appear here -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="p-6">
                <form action="#" method="post">
                    <div class="space-y-5">
                        <!-- Username/Email Field -->
                        <div>
                            <label for="login" class="block text-sm font-medium text-gray-700 mb-1">
                                <?= lang('Auth.emailOrUsername') ?>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                                <input 
                                    type="text" 
                                    id="login" 
                                    name="login" 
                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 <?php if (session('errors.login')) : ?>border-red-500<?php endif ?>" 
                                    placeholder="Masukkan username atau email"
                                    autofocus
                                >
                            </div>
                            <?php if (session('errors.login')) : ?>
                                <p class="mt-1 text-sm text-red-600 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    <?= session('errors.login') ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                                Password
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input 
                                    type="password" 
                                    id="password" 
                                    name="password" 
                                    class="block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 <?php if (session('errors.password')) : ?>border-red-500<?php endif ?>" 
                                    placeholder="Masukkan password"
                                >
                                <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <i class="fas fa-eye text-gray-400 hover:text-gray-600"></i>
                                </button>
                            </div>
                            <?php if (session('errors.password')) : ?>
                                <p class="mt-1 text-sm text-red-600 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    <?= session('errors.password') ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <!-- Remember Me -->
                        <?php if ($config->allowRemembering) : ?>
                        <div class="flex items-center">
                            <input 
                                id="remember" 
                                name="remember" 
                                type="checkbox" 
                                class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded"
                                <?php if (old('remember')) : ?> checked <?php endif ?>
                            >
                            <label for="remember" class="ml-2 block text-sm text-gray-700">
                                <?= lang('Auth.rememberMe') ?>
                            </label>
                        </div>
                        <?php endif; ?>

                        <!-- Submit Button -->
                        <button 
                            type="submit" 
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-gradient-to-r from-primary-500 to-primary-700 hover:from-primary-600 hover:to-primary-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all duration-200 transform hover:-translate-y-0.5"
                        >
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            <?= lang('Auth.loginAction') ?>
                        </button>

                        <!-- Forgot Password Link -->
                        <?php if ($config->activeResetter) : ?>
                        <div class="text-center">
                            <a 
                                href="<?= url_to('forgot') ?>" 
                                class="text-sm text-primary-600 hover:text-primary-800 font-medium transition-colors duration-200"
                            >
                                <?= lang('Auth.forgotYourPassword') ?>
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-6 text-white text-sm">
            <p>&copy; <?= date('Y') ?> Sistem Login Petugas. All rights reserved.</p>
        </div>
    </div>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Demo error message (untuk keperluan preview)
        document.addEventListener('DOMContentLoaded', function() {
            // Uncomment baris di bawah untuk menampilkan pesan error demo
            // showDemoMessage();
        });

        function showDemoMessage() {
            const messageBlock = document.getElementById('message-block');
            const messageText = document.getElementById('message-text');
            
            messageText.textContent = 'Username atau password salah. Silakan coba lagi.';
            messageBlock.classList.remove('hidden');
            
            setTimeout(() => {
                messageBlock.classList.add('hidden');
            }, 5000);
        }
    </script>
</body>
</html> 