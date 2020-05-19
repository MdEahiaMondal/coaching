<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_registers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student_name');
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('class_id');
            $table->string('father_name');
            $table->string('father_mobile');
            $table->string('father_profession');
            $table->string('mother_name');
            $table->string('mother_mobile');
            $table->string('mother_profession');
            $table->string('email_address')->nullable();
            $table->string('sms_mobile');
            $table->date('date_of_admission');
            $table->string('student_photo')->nullable();
            $table->text('address');
            $table->tinyInteger('student_register_status');
            $table->string('password');
            $table->string('encrypt_password');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
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
        Schema::dropIfExists('student_registers');
    }
}
