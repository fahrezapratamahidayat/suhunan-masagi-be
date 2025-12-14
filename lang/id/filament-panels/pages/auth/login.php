<?php

return [
    'title' => 'Masuk',
    
    'heading' => 'Masuk ke akun Anda',
    
    'actions' => [
        'register' => [
            'before' => 'atau',
            'label' => 'daftar akun',
        ],
        'request_password_reset' => [
            'label' => 'Lupa kata sandi?',
        ],
    ],
    
    'form' => [
        'email' => [
            'label' => 'Email',
        ],
        'password' => [
            'label' => 'Kata Sandi',
        ],
        'remember' => [
            'label' => 'Ingat saya',
        ],
        'actions' => [
            'authenticate' => [
                'label' => 'Masuk',
            ],
        ],
    ],
    
    'messages' => [
        'failed' => 'Email atau kata sandi salah.',
    ],
    
    'notifications' => [
        'throttled' => [
            'title' => 'Terlalu banyak percobaan login',
            'body' => 'Silakan coba lagi dalam :seconds detik.',
        ],
    ],
];
