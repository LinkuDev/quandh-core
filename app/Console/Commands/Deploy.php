<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Deploy extends Command
{
    protected $signature = 'deploy {--fresh : Xóa toàn bộ DB và tạo lại}';

    protected $description = 'Chạy các bước thiết lập: migrate, seed, key, storage link, scribe generate';

    public function handle(): int
    {
        $steps = [
            ['Tạo application key', 'key:generate', ['--force' => true]],
            [$this->option('fresh') ? 'Migrate fresh + seed' : 'Migrate + seed', 'migrate'.($this->option('fresh') ? ':fresh' : ''), ['--seed' => true, '--force' => true]],
            ['Tạo storage symlink', 'storage:link', []],
            ['Generate API docs (Scribe)', 'scribe:generate', ['--force' => true]],
        ];

        foreach ($steps as [$label, $command, $args]) {
            $this->info(">> {$label}...");
            $this->call($command, $args);
            $this->newLine();
        }

        $this->info('Deploy hoàn tất!');

        return self::SUCCESS;
    }
}
