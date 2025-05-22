<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('Фамилия', 64);
            $table->string('Имя', 64);
            $table->string('Отчество', 64)->nullable();
            $table->string('Должность', 64);
            $table->date('Дата_рождения');
            $table->string('Место_рождения', 64);
            $table->integer('Возраст');
            $table->date('Дата_приема');
            $table->integer('Стаж_работы');
            $table->string('Образование', 64);
            $table->integer('Серия_паспота');
            $table->integer('Номер_паспорта');
            $table->string('Адрес_проживания', 64);
            $table->string('ИНН', 12);
            $table->string('Снилс', 14);
            $table->string('Телефон', 12);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
