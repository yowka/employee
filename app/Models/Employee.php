<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($employee) {
            // Рассчитываем возраст
            if ($employee->Дата_рождения) {
                $birthDate = Carbon::parse($employee->Дата_рождения);
                $employee->Возраст = $birthDate->age; // автоматически считает возраст
            }

            // Рассчитываем стаж работы
            if ($employee->Дата_приема) {
                $hireDate = Carbon::parse($employee->Дата_приема);
                $employee->Стаж_работы = $hireDate->diffInYears(Carbon::now());
            }
        });
    }
}
