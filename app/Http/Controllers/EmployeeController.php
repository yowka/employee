<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

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
        $request->validate([
            'last_name' => 'required|string|max:64',
            'first_name' => 'required|string|max:64',
            'middle_name' => 'nullable|string|max:64',
            'position' => 'required|string|max:64',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string|max:64',
            'age' => 'required|integer',
            'hire_date' => 'required|date',
            'experience' => 'required|integer',
            'education' => 'required|string|max:64',
            'passport_series' => 'required|integer',
            'passport_number' => 'required|integer',
            'address' => 'required|string|max:64',
            'inn' => 'required|string|max:12',
            'snils' => 'required|string|max:14',
            'phone' => 'required|string|max:12',
        ]);

        Employee::create($request->all());

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
            'Дата_рождения' => 'required|date',
            'Место_рождения' => 'required|string',
            'Дата_приема' => 'required|date',
            'Образование' => 'required|string',
            'Серия_паспорта' => 'required|integer',
            'Номер_паспорта' => 'required|integer',
            'Адрес_проживания' => 'required|string',
            'ИНН' => 'required|string',
            'Снилс' => 'required|string',
            'Телефон' => 'required|string',
        ]);

        // Преобразуем даты в нужный формат, если Laravel не сделал этого автоматически
        $employee->fill($validated);

        // Явно задаем даты, если нужно
        $employee->Дата_рождения = \Carbon\Carbon::createFromFormat('Y-m-d', $request->input('Дата_рождения'));
        $employee->Дата_приема = \Carbon\Carbon::createFromFormat('Y-m-d', $request->input('Дата_приема'));

        $employee->save(); // автоматически вызовется boot(), где рассчитывается возраст и стаж

        return redirect()->route('employees.show', $employee)->with('success', 'Сотрудник успешно обновлён');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Сотрудник успешно удален');
    }
}
