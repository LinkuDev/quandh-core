<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Xóa bảng departments (không còn cần thiết — thay bằng schedule_type enum trên schedules).
 * Bỏ department_id khỏi users, schedules, log_activities.
 * Thêm schedule_type vào schedules.
 */
return new class extends Migration
{
    public function up(): void
    {
        // 1. Thêm schedule_type vào schedules trước khi xóa department_id
        Schema::table('schedules', function (Blueprint $table) {
            $table->string('schedule_type', 30)->default('thuong_truc')->after('department_id');
            $table->index('schedule_type');
        });

        // 2. Migrate data: department slug → schedule_type
        if (Schema::hasTable('departments')) {
            DB::statement("
                UPDATE schedules s
                LEFT JOIN departments d ON s.department_id = d.id
                SET s.schedule_type = CASE
                    WHEN d.slug = 'van-phong-thanh-uy' THEN 'van_phong'
                    ELSE 'thuong_truc'
                END
            ");
        }

        // 3. Drop department_id FK + column từ schedules
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropForeign(['department_id']);
            $table->dropIndex(['event_date', 'department_id']);
            $table->dropIndex(['event_date', 'session', 'department_id']);
            $table->dropColumn('department_id');

            // Index mới theo schedule_type
            $table->index(['event_date', 'schedule_type']);
            $table->index(['event_date', 'session', 'schedule_type']);
        });

        // 4. Drop department_id FK từ users
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['department_id']);
            $table->dropColumn('department_id');
        });

        // 5. Drop department_id từ log_activities (nếu có)
        if (Schema::hasColumn('log_activities', 'department_id')) {
            Schema::table('log_activities', function (Blueprint $table) {
                $table->dropIndex(['department_id', 'created_at']);
                $table->dropColumn('department_id');
            });
        }

        // 6. Drop departments table
        Schema::dropIfExists('departments');
    }

    public function down(): void
    {
        // Tạo lại departments
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->nullable()->constrained('organizations')->nullOnDelete();
            $table->string('name');
            $table->string('slug')->nullable()->unique();
            $table->text('description')->nullable();
            $table->string('status')->default('active');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('departments')->nullOnDelete();
        });

        // Thêm lại department_id vào users
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('department_id')->nullable()->after('zalo_id');
            $table->foreign('department_id')->references('id')->on('departments')->nullOnDelete();
        });

        // Thêm lại department_id vào log_activities
        Schema::table('log_activities', function (Blueprint $table) {
            $table->unsignedBigInteger('department_id')->nullable();
            $table->index(['department_id', 'created_at']);
        });

        // Thêm lại department_id vào schedules, bỏ schedule_type
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropIndex(['event_date', 'schedule_type']);
            $table->dropIndex(['event_date', 'session', 'schedule_type']);
            $table->dropColumn('schedule_type');

            $table->foreignId('department_id')->nullable()->constrained('departments')->nullOnDelete();
            $table->index(['event_date', 'department_id']);
            $table->index(['event_date', 'session', 'department_id']);
        });
    }
};
