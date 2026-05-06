<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('skema_sertifikasi', function (Blueprint $table) {
            if (!Schema::hasColumn('skema_sertifikasi', 'biaya')) {
                $table->decimal('biaya', 15, 2)->default(0)->after('deskripsi');
            }
            if (!Schema::hasColumn('skema_sertifikasi', 'durasi')) {
                $table->string('durasi')->nullable()->after('biaya');
            }
        });
    }

    public function down(): void
    {
        Schema::table('skema_sertifikasi', function (Blueprint $table) {
            $table->dropColumn(['biaya', 'durasi']);
        });
    }
};
