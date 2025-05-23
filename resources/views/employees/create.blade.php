@include('includes.header')

<h2>Добавить сотрудника</h2>

<form method="POST" action="{{ route('employees.store') }}">
    @csrf
    <form method="POST" action="{{ route('employees.store') }}">
        @csrf

        <div>
            <label>Фамилия:
                <input type="text" name="Фамилия" value="{{ old('Фамилия') }}" required>
            </label>
        </div>

        <div>
            <label>Имя:
                <input type="text" name="Имя" value="{{ old('Имя') }}" required>
            </label>
        </div>

        <div>
            <label>Отчество:
                <input type="text" name="Отчество" value="{{ old('Отчество') }}">
            </label>
        </div>

        <div>
            <label>Должность:
                <input type="text" name="Должность" value="{{ old('Должность') }}" required>
            </label>
        </div>

        <div>
            <label>Дата рождения:
                <input type="date" name="Дата_рождения" value="{{ old('Дата_рождения') }}" required>
            </label>
        </div>

        <div>
            <label>Место рождения:
                <input type="text" name="Место_рождения" value="{{ old('Место_рождения') }}" required>
            </label>
        </div>

        <div>
            <label>Дата найма:
                <input type="date" name="Дата_приема" value="{{ old('Дата_приема') }}" required>
            </label>
        </div>

        <div>
            <label>Образование:
                <input type="text" name="Образование" value="{{ old('Образование') }}" required>
            </label>
        </div>

        <div>
            <label>Серия паспорта:
                <input type="number" name="Серия_паспорта" value="{{ old('Серия_паспорта') }}" required>
            </label>
        </div>

        <div>
            <label>Номер паспорта:
                <input type="number" name="Номер_паспорта" value="{{ old('Номер_паспорта') }}" required>
            </label>
        </div>

        <div>
            <label>Адрес:
                <input type="text" name="Адрес_проживания" value="{{ old('Адрес_проживания') }}" required>
            </label>
        </div>

        <div>
            <label>ИНН:
                <input type="text" name="ИНН" value="{{ old('ИНН') }}" required>
            </label>
        </div>

        <div>
            <label>СНИЛС:
                <input type="text" name="Снилс" value="{{ old('Снилс') }}" required>
            </label>
        </div>

        <div>
            <label>Телефон:
                <input type="text" name="Телефон" value="{{ old('Телефон') }}" required>
            </label>
        </div>

        <button type="submit">Сохранить</button>
    </form>
</form>

@include('includes.footer')
