@include('includes.header')

<h2>Редактировать сотрудника</h2>

<form method="POST" action="{{ route('employees.update', $employee) }}">
    @csrf
    @method('PUT')
    <div>
        <label>Фамилия:
            <input type="text" name="Фамилия" value="{{ $employee->Фамилия }}" required>
        </label>
    </div>
    <div>
        <label>Имя:
            <input type="text" name="Имя" value="{{ $employee->Имя }}" required>
        </label>
    </div>
    <div>
        <label>Отчество:
            <input type="text" name="Отчество" value="{{ $employee->Отчество }}">
        </label>
    </div>
    <div>
        <label>Должность:
            <input type="text" name="Должность" value="{{ $employee->Должность }}" required>
        </label>
    </div>
    <div>
        <label>Дата рождения:
            <input type="date" name="Дата_рождения" value="{{ $employee->Дата_рождения?->format('Y-m-d') }}" required>
        </label>
    </div>
    <div>
        <label>Место рождения:
            <input type="text" name="Место_рождения" value="{{ $employee->Место_рождения }}" required>
        </label>
    </div>
    <div>
        <label>Возраст:
            <input type="number" name="Возраст" value="{{ $employee->Возраст }}" readonly>
        </label>
    </div>
    <div>
        <label>Дата найма:
            <input type="date" name="Дата_приема" value="{{ $employee->Дата_приема?->format('Y-m-d') }}" required>        </label>
    </div>
    <div>
        <label>Стаж работы:
            <input type="number" name="Стаж_работы" value="{{ $employee->Стаж_работы }}" readonly>
        </label>
    </div>
    <div>
        <label>Образование:
            <input type="text" name="Образование" value="{{ $employee->Образование }}" required>
        </label>
    </div>
    <div>
        <label>Серия паспорта:
            <input type="number" name="Серия_паспорта" value="{{ $employee->Серия_паспорта }}" required>
        </label>
    </div>
    <div>
        <label>Номер паспорта:
            <input type="number" name="Номер_паспорта" value="{{ $employee->Номер_паспорта }}" required>
        </label>
    </div>
    <div>
        <label>Адрес проживания:
            <input type="text" name="Адрес_проживания" value="{{ $employee->Адрес_проживания }}" required>
        </label>
    </div>
    <div>
        <label>ИНН:
            <input type="text" name="ИНН" value="{{ $employee->ИНН }}" required>
        </label>
    </div>
    <div>
        <label>СНИЛС:
            <input type="text" name="Снилс" value="{{ $employee->Снилс }}" required>
        </label>
    </div>
    <div>
        <label>Телефон:
            <input type="text" name="Телефон" value="{{ $employee->Телефон }}" required>
        </label>
    </div>
    <button type="submit" class="btn">Обновить</button>
</form>

@include('includes.footer')
