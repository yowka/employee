@include('includes.header')

<h2>Добавить сотрудника</h2>

<form method="POST" action="{{ route('employees.store') }}">
    @csrf
    <div>
        <label>Фамилия:
            <input type="text" name="last_name" required>
        </label>
    </div>
    <div>
        <label>Имя:
            <input type="text" name="first_name" required>
        </label>
    </div>
    <div>
        <label>Отчество:
            <input type="text" name="middle_name">
        </label>
    </div>
    <div>
        <label>Должность:
            <input type="text" name="position" required>
        </label>
    </div>
    <div>
        <label>Дата рождения:
            <input type="date" name="birth_date" required>
        </label>
    </div>
    <div>
        <label>Место рождения:
            <input type="text" name="birth_place" required>
        </label>
    </div>
    <div>
        <label>Возраст:
            <input type="number" name="age" required>
        </label>
    </div>
    <div>
        <label>Дата найма:
            <input type="date" name="hire_date" required>
        </label>
    </div>
    <div>
        <label>Стаж:
            <input type="number" name="experience" required>
        </label>
    </div>
    <div>
        <label>Образование:
            <input type="text" name="education" required>
        </label>
    </div>
    <div>
        <label>Серия паспорта:
            <input type="number" name="passport_series" required>
        </label>
    </div>
    <div>
        <label>Номер паспорта:
            <input type="number" name="passport_number" required>
        </label>
    </div>
    <div>
        <label>Адрес:
            <input type="text" name="address" required>
        </label>
    </div>
    <div>
        <label>ИНН:
            <input type="text" name="inn" required>
        </label>
    </div>
    <div>
        <label>СНИЛС:
            <input type="text" name="snils" required>
        </label>
    </div>
    <div>
        <label>Телефон:
            <input type="text" name="phone" required>
        </label>
    </div>
    <button type="submit" class="btn">Сохранить</button>
</form>

@include('includes.footer')
