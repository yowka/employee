@include('includes.header')

<h2>Информация о сотруднике</h2>

<p><strong>Фамилия:</strong> {{ $employee->Фамилия }}</p>
<p><strong>Имя:</strong> {{ $employee->Имя }}</p>
<p><strong>Отчество:</strong> {{ $employee->Отчество ?? '—' }}</p>
<p><strong>Должность:</strong> {{ $employee->Должность }}</p>
<p><strong>Дата рождения:</strong> {{ $employee->Дата_рождения}}</p>
<p><strong>Место рождения:</strong> {{ $employee->Место_рождения }}</p>
<p><strong>Возраст:</strong> {{ $employee->Возраст }}</p>
<p><strong>Дата найма:</strong> {{ $employee->Дата_приема}}</p>
<p><strong>Стаж работы:</strong> {{ $employee->Стаж_работы}}</p>
<p><strong>Образование:</strong> {{ $employee->Образование }}</p>
<p><strong>Серия паспорта:</strong> {{ $employee->Серия_паспорта }}</p>
<p><strong>Номер паспорта:</strong> {{ $employee->Номер_паспорта }}</p>
<p><strong>Адрес проживания:</strong> {{ $employee->Адрес_проживания }}</p>
<p><strong>ИНН:</strong> {{ $employee->ИНН }}</p>
<p><strong>СНИЛС:</strong> {{ $employee->Снилс }}</p>
<p><strong>Телефон:</strong> {{ $employee->Телефон }}</p>

<a href="{{ route('employees.index') }}" class="btn">Назад к списку</a>

@include('includes.footer')
