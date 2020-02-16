<h2>@yield('tableTitle','Section title')</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Tipo</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
        {{ $n = count($users) }}
        @for($i=0; $i<$n; $i++ )
            {{ $user = $users[$i] }}
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->type }}</td>
            <td>
                <a href="{{ asset('/admin/users/') }}" class="align-items-center">
                    <span class="">#</span>
                </a>
            </td>
        </tr>
        @endfor
        </tbody>
    </table>
</div>
