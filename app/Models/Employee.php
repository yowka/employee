<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{public $timestamps = false;
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
        'Телефон'
    ];
    protected $casts = [
        'Дата_рождения' => 'date',
        'Дата_приема' => 'date',
    ];
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($employee) {
            if ($employee->Дата_рождения) {
                $employee->Возраст = now()->diffInYears($employee->Дата_рождения);
            }

            if ($employee->Дата_приема) {
                $employee->Стаж_работы = now()->diffInYears($employee->Дата_приема);
            }
        });
    }
}
