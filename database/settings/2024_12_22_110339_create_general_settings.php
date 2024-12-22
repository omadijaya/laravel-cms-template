<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'OJ CMS Template');
        $this->migrator->add('general.site_active', true);
        $this->migrator->add('general.links', [
            [
                'label' => 'Facebook',
                'url' => 'https://facebook.com',
            ],
            [
                'label' => 'Instagram',
                'url' => 'https://instagram.com',
            ],
        ]);
    }
};
