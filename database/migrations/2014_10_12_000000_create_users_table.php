<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('role_id')->default(1);
            $table->string('ref_number');
            $table->date('dob');
            $table->foreignId('gender_id');
            $table->foreignId('marital_status_id');
            $table->string('phone_number');
            $table->string('location');
            $table->string('sub_location')->nullable();
            $table->string('identification_number');
            $table->foreignId('education_level_id');
            $table->foreignId('course_id');
            $table->foreignId('preferred_time_of_class_id');
            $table->foreignId('how_you_learnt_about_us_id');
            $table->string('student_photo');
            $table->string('birth_certificate_url');
            $table->string('school_certificate_url');
            $table->string('identification_document_url');
            $table->integer('paid')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
