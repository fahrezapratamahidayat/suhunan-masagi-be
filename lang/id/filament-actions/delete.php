<?php

return [
    'modal' => [
        'heading' => 'Apakah Anda yakin?',
        'actions' => [
            'cancel' => [
                'label' => 'Batal',
            ],
            'confirm' => [
                'label' => 'Konfirmasi',
            ],
        ],
    ],
    
    'delete' => [
        'label' => 'Hapus',
        'modal' => [
            'heading' => 'Hapus :label',
            'description' => 'Apakah Anda yakin ingin menghapus ini? Tindakan ini tidak dapat dibatalkan.',
            'actions' => [
                'delete' => [
                    'label' => 'Hapus',
                ],
            ],
        ],
        'notifications' => [
            'deleted' => [
                'title' => 'Berhasil dihapus',
            ],
        ],
    ],
    
    'replicate' => [
        'label' => 'Duplikat',
        'modal' => [
            'heading' => 'Duplikat :label',
        ],
        'notifications' => [
            'replicated' => [
                'title' => 'Berhasil diduplikat',
            ],
        ],
    ],
    
    'restore' => [
        'label' => 'Pulihkan',
        'modal' => [
            'heading' => 'Pulihkan :label',
        ],
        'notifications' => [
            'restored' => [
                'title' => 'Berhasil dipulihkan',
            ],
        ],
    ],
];
