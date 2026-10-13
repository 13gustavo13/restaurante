<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (DB::getDriverName() !== 'mysql' || ! Schema::hasColumn('usuarios', 'id_usuario')) {
            return;
        }

        $column = DB::selectOne(
            "SELECT COLUMN_KEY, EXTRA
             FROM INFORMATION_SCHEMA.COLUMNS
             WHERE TABLE_SCHEMA = DATABASE()
               AND TABLE_NAME = 'usuarios'
               AND COLUMN_NAME = 'id_usuario'"
        );

        if (! $column) {
            return;
        }

        if ($column->COLUMN_KEY !== 'PRI') {
            DB::statement('ALTER TABLE `usuarios` ADD PRIMARY KEY (`id_usuario`)');
        }

        if (! str_contains(strtolower($column->EXTRA), 'auto_increment')) {
            DB::statement(
                'ALTER TABLE `usuarios` MODIFY `id_usuario` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT'
            );
        }
    }

    public function down(): void
    {
        // The primary key must remain auto-incrementing for user registration.
    }
};
