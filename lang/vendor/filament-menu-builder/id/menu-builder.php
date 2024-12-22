<?php

declare(strict_types=1);

return [
    'form' => [
        'title' => 'Judul',
        'url' => 'URL',
        'linkable_type' => 'Tipe',
        'linkable_id' => 'ID',
    ],
    'resource' => [
        'name' => [
            'label' => 'Nama',
        ],
        'locations' => [
            'label' => 'Lokasi',
            'empty' => 'Tidak Ditugaskan',
        ],
        'items' => [
            'label' => 'Item',
        ],
        'is_visible' => [
            'label' => 'Visibilitas',
            'visible' => 'Terlihat',
            'hidden' => 'Tersembunyi',
        ],
    ],
    'actions' => [
        'add' => [
            'label' => 'Tambahkan ke Menu',
        ],
        'locations' => [
            'label' => 'Lokasi',
            'heading' => 'Kelola Lokasi',
            'description' => 'Pilih menu yang muncul di setiap lokasi.',
            'submit' => 'Perbarui',
            'form' => [
                'location' => [
                    'label' => 'Lokasi',
                ],
                'menu' => [
                    'label' => 'Menu yang Ditugaskan',
                ],
            ],
            'empty' => [
                'heading' => 'Tidak ada lokasi yang terdaftar',
            ],
        ],
    ],
    'items' => [
        'expand' => 'Perluas',
        'collapse' => 'Tutup',
        'empty' => [
            'heading' => 'Tidak ada item dalam menu ini.',
        ],
    ],
    'custom_link' => 'Tautan Kustom',
    'custom_text' => 'Teks Kustom',
    'open_in' => [
        'label' => 'Buka di',
        'options' => [
            'self' => 'Tab yang sama',
            'blank' => 'Tab baru',
            'parent' => 'Tab induk',
            'top' => 'Tab atas',
        ],
    ],
    'notifications' => [
        'created' => [
            'title' => 'Tautan dibuat',
        ],
        'locations' => [
            'title' => 'Lokasi menu diperbarui',
        ],
    ],
    'panel' => [
        'empty' => [
            'heading' => 'Tidak ada item yang ditemukan',
            'description' => 'Tidak ada item dalam menu ini.',
        ],
        'pagination' => [
            'previous' => 'Sebelumnya',
            'next' => 'Berikutnya',
        ],
    ],
];
