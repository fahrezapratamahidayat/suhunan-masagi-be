<?php

return [
    'validation' => [
        'required' => 'Kolom :attribute wajib diisi.',
        'email' => 'Kolom :attribute harus berupa email yang valid.',
        'max' => [
            'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            'array' => 'Kolom :attribute tidak boleh lebih dari :max item.',
        ],
        'min' => [
            'string' => 'Kolom :attribute harus minimal :min karakter.',
            'array' => 'Kolom :attribute harus minimal :min item.',
        ],
        'unique' => 'Kolom :attribute sudah digunakan.',
        'url' => 'Kolom :attribute harus berupa URL yang valid.',
        'numeric' => 'Kolom :attribute harus berupa angka.',
        'image' => 'Kolom :attribute harus berupa gambar.',
        'mimes' => 'Kolom :attribute harus berupa file dengan tipe: :values.',
    ],
];
