<?php

namespace App\Helpers;

class Constant
{
    // Role Available
    const ROLES = [
        'admin',
        'admin_registrasi',
        'admin_laboratorium',
        'admin_bagian_poli',
        'kepala_rekam_medis'
    ];

    // Allowed role can see the widget
    const WIDGET_BOX = [ 'admin', 'kepala_rekam_medis', 'admin_registrasi', 'admin_laboratorium', 'admin_bagian_poli', ];
    // Allowed role can see the diagnosis widget
    const WIDGET_DIAGNOSIS = [ 'admin_registrasi', 'kepala_rekam_medis', ];
    // Allowed role can see the register chart
    const WIDGET_CHART_REGISTRASI = [ 'admin_registrasi', 'kepala_rekam_medis', ];
}
