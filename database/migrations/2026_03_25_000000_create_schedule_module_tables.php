<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->date('event_date');
            $table->string('session', 20);
            $table->time('start_time')->nullable();
            $table->text('content');
            $table->foreignId('chairperson_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('location')->nullable();
            $table->string('prep_unit')->nullable();
            $table->string('driver_info')->nullable();
            $table->string('meeting_type', 50)->nullable();
            $table->string('nature', 50)->nullable();
            $table->string('color_code', 20)->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->foreignId('department_id')->nullable()->constrained('departments')->nullOnDelete();
            $table->string('status')->default('active');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('updated_by')->references('id')->on('users')->nullOnDelete();

            $table->index(['event_date', 'department_id']);
            $table->index(['event_date', 'session', 'department_id']);
            $table->fullText('content');
        });

        Schema::create('schedule_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')->constrained('schedules')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->string('external_name')->nullable();
            $table->timestamps();

            $table->index('schedule_id');
            $table->index('user_id');
        });

        Schema::create('schedule_notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')->constrained('schedules')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('channel', 20);
            $table->dateTime('remind_at');
            $table->string('status', 20)->default('pending');
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            $table->index(['status', 'remind_at']);
            $table->index('schedule_id');
            $table->index(['user_id', 'read_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedule_notifications');
        Schema::dropIfExists('schedule_participants');
        Schema::dropIfExists('schedules');
    }
};
