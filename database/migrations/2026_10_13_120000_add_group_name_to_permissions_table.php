<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table(config('permission.table_names.permissions'), function (Blueprint $table) {
            if (! Schema::hasColumn(config('permission.table_names.permissions'), 'group_name')) {
                $table->string('group_name')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(config('permission.table_names.permissions'), function (Blueprint $table) {
            if (Schema::hasColumn(config('permission.table_names.permissions'), 'group_name')) {
                $table->dropColumn('group_name');
            }
        });
    }
};
