<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'OJ CMS Template');
        $this->migrator->add('general.site_description', 'A Laravel CMS template for building custom admin panels.');
        $this->migrator->add('general.site_support_email', 'omadijaya@gmail.com');
        $this->migrator->add('general.site_support_phone', '');
        $this->migrator->add('general.site_active', true);
        $this->migrator->add('general.analytics', '');
        $this->migrator->add('general.links', [
            [
                'label' => 'GitHub',
                'url' => 'https://github.com/omadijaya',
            ],
            [
                'label' => 'LinkedIn',
                'url' => 'https://www.linkedin.com/in/omadi-jaya-16b20b64',
            ],
        ]);
    }
};
