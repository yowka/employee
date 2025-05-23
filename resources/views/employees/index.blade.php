@include('includes.header')

<h2>Список сотрудников</h2>

<a href="{{ route('employees.create') }}" class="btn">Добавить нового сотрудника</a>

<div class="table-responsive">
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>ФИО</th>
            <th>Должность</th>
            <th>Дата рождения</th>
            <th>Возраст</th>
            <th>Дата приема</th>
            <th>Стаж</th>
            <th>Телефон</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @forelse($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->Фамилия }} {{ $employee->Имя }} {{ $employee->Отчество ?? '' }}</td>
                <td>{{ $employee->Должность }}</td>
                <td>{{ $employee->Дата_рождения}}</td>
                <td>{{ $employee->Возраст }}</td>
                <td>{{ $employee->Дата_приема}}</td>
                <td>{{ $employee->Стаж_работы }}</td>
                <td>{{ $employee->Телефон }}</td>
                <td>
                    <a href="{{ route('employees.show', $employee) }}" class="btn">Просмотр</a>
                    <a href="{{ route('employees.edit', $employee) }}" class="btn btn-blue">Редактировать</a>
                    <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Удалить?')">Удалить</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">Нет данных о сотрудниках</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

<div class="pagination">
    @if ($employees->lastPage() > 1)
        @for ($i = 1; $i <= $employees->lastPage(); $i++)
            <a href="{{ $employees->url($i) }}" style="margin: 0 5px; text-decoration: none;">
                {{ $i }}
            </a>
        @endfor
    @endif
</div>
@include('includes.footer')
