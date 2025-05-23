<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FiredEmployee extends Model
{
    protected $table = 'fired_employees'; // важно!

    public $timestamps = false;
    protected $fillable = [
        'Фамилия',
        'Имя',
        'Отчество',
        'Должность',
        'Дата_рождения',
        'Место_рождения',
        'Возраст',
        'Дата_приема',
        'Стаж_работы',
        'Образование',
        'Серия_паспорта',
        'Номер_паспорта',
        'Адрес_проживания',
        'ИНН',
        'Снилс',
        'Телефон',
        'Дата_увольнения'
    ];
}
