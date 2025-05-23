<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\FiredEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Фамилия' => 'required|string|max:64',
            'Имя' => 'required|string|max:64',
            'Отчество' => 'nullable|string|max:255',
            'Должность' => 'required|string|max:255',
            'Дата_рождения' => 'required|date|before:today',
            'Место_рождения' => 'required|string',
            'Дата_приема' => 'required|date|before_or_equal:today',
            'Образование' => 'required|string',
            'Серия_паспорта' => 'required|integer',
            'Номер_паспорта' => 'required|integer',
            'Адрес_проживания' => 'required|string',
            'ИНН' => 'required|string',
            'Снилс' => 'required|string',
            'Телефон' => 'required|string',
        ]);

        $employee = new Employee();
        $employee->fill($validated);

        // Рассчитываем возраст и стаж
        if ($employee->Дата_рождения) {
            $birthDate = \Carbon\Carbon::parse($employee->Дата_рождения);
            $employee->Возраст = now()->diffInYears($birthDate);
        }

        if ($employee->Дата_приема) {
            $hireDate = \Carbon\Carbon::parse($employee->Дата_приема);
            $employee->Стаж_работы = now()->diffInYears($hireDate);
        }

        $employee->save();

        \Log::info('Сотрудник успешно создан');

        return redirect()->route('employees.index')
            ->with('success', 'Сотрудник успешно создан');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'Фамилия' => 'required|string|max:255',
            'Имя' => 'required|string|max:255',
            'Отчество' => 'nullable|string|max:255',
            'Должность' => 'required|string|max:255',
            'Дата_рождения' => 'required|date|before:today',
            'Место_рождения' => 'required|string',
            'Дата_приема' => 'required|date|before_or_equal:today',
            'Образование' => 'required|string',
            'Серия_паспорта' => 'required|integer',
            'Номер_паспорта' => 'required|integer',
            'Адрес_проживания' => 'required|string',
            'ИНН' => 'required|string',
            'Снилс' => 'required|string',
            'Телефон' => 'required|string',
        ]);

        // Обновляем модель
        $employee->fill($validated);

        // Сохраняем модель (автоматически вызовется событие saving)
        $employee->save();

        return redirect()->route('employees.show', $employee)->with('success', 'Сотрудник успешно обновлен');
    }

    public function destroy(Employee $employee)
    {
        FiredEmployee::create([
            'Фамилия' => $employee->Фамилия,
            'Имя' => $employee->Имя,
            'Отчество' => $employee->Отчество,
            'Должность' => $employee->Должность,
            'Дата_рождения' => $employee->Дата_рождения,
            'Место_рождения' => $employee->Место_рождения,
            'Возраст' => $employee->Возраст,
            'Дата_приема' => $employee->Дата_приема,
            'Стаж_работы' => $employee->Стаж_работы,
            'Образование' => $employee->Образование,
            'Серия_паспорта' => $employee->Серия_паспорта,
            'Номер_паспорта' => $employee->Номер_паспорта,
            'Адрес_проживания' => $employee->Адрес_проживания,
            'ИНН' => $employee->ИНН,
            'Снилс' => $employee->Снилс,
            'Телефон' => $employee->Телефон,
            'Дата_увольнения' => Carbon::now('Asia/Tomsk')->format('Y-m-d')
        ]);

        // Удаляем сотрудника
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Сотрудник успешно удален и переведен в архив');
    }
}
