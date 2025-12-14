<?php

return [
    'empty' => [
        'heading' => 'Tidak ada :label',
        'description' => 'Buat :label untuk memulai.',
    ],
    
    'filters' => [
        'heading' => 'Filter',
        'indicator' => 'Filter aktif',
        'actions' => [
            'remove' => [
                'label' => 'Hapus filter',
            ],
            'remove_all' => [
                'label' => 'Hapus semua filter',
                'tooltip' => 'Hapus semua filter',
            ],
        ],
    ],
    
    'actions' => [
        'filter' => [
            'label' => 'Filter',
        ],
        'open_bulk_actions' => [
            'label' => 'Aksi massal',
        ],
        'toggle_columns' => [
            'label' => 'Kolom',
        ],
    ],
    
    'selection_indicator' => [
        'selected_count' => '1 baris dipilih|:count baris dipilih',
        'actions' => [
            'select_all' => [
                'label' => 'Pilih semua :count',
            ],
            'deselect_all' => [
                'label' => 'Batalkan semua pilihan',
            ],
        ],
    ],
    
    'pagination' => [
        'label' => 'Navigasi halaman',
        'overview' => 'Menampilkan :first sampai :last dari :total hasil',
        'fields' => [
            'records_per_page' => [
                'label' => 'per halaman',
            ],
        ],
        'actions' => [
            'go_to_page' => [
                'label' => 'Ke halaman :page',
            ],
            'next' => [
                'label' => 'Selanjutnya',
            ],
            'previous' => [
                'label' => 'Sebelumnya',
            ],
        ],
    ],
    
    'search' => [
        'label' => 'Cari',
        'placeholder' => 'Cari',
        'indicator' => 'Cari',
    ],
];
