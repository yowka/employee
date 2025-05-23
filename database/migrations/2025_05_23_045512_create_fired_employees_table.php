<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiredEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fired_employees', function (Blueprint $table) {
            $table->id();
            $table->string('Фамилия');
            $table->string('Имя');
            $table->string('Отчество')->nullable();
            $table->string('Должность');
            $table->date('Дата_рождения');
            $table->string('Место_рождения');
            $table->integer('Возраст')->nullable();
            $table->date('Дата_приема');
            $table->integer('Стаж_работы')->nullable();
            $table->string('Образование');
            $table->integer('Серия_паспорта');
            $table->integer('Номер_паспорта');
            $table->string('Адрес_проживания');
            $table->string('ИНН');
            $table->string('Снилс');
            $table->string('Телефон');
            $table->timestamp('Дата_увольнения')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fired_employees');
    }
}
