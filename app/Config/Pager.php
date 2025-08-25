<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Pager extends BaseConfig
{
    public array $templates = [
        'default_full'   => 'CodeIgniter\Pager\Views\default_full',
        'default_simple' => 'CodeIgniter\Pager\Views\default_simple',
        'default_head'   => 'CodeIgniter\Pager\Views\default_head',

        // Tambahan template Bootstrap
        'bootstrap_full' => 'App\Views\Pagers\bootstrap_full',
    ];

    public int $perPage = 20;
}