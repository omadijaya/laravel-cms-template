<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;

    public ?string $site_description;

    public bool $site_active;

    public ?string $site_support_email;

    public ?string $site_support_phone;

    public ?string $analytics;

    public ?array $links;

    public static function group(): string
    {
        return 'general';
    }
}
