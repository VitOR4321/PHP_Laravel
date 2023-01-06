<!DOCTYPE html>
<html lang="pl">
@include('partials.head')

<body>
    @include('partials.navi')
    <div id="zawartosc">
        <h2>Lista wydawnictw</h2>
        <table>
            <thead>
                <tr>
                    <th>ID wydawnictwa</th>
                    <th>Nazwa</th>
                    <th>Adres</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wydawnictwo as $wyd)
                    <tr>
                        <td>{{ $wyd->id }}</td>
                        <td>{{ $wyd->nazwa }}</td>
                        <td>{{ $wyd->adres }}</td>
                        <td><a href="{{ route('listaWydawnictw') }}"
                                onclick="event.preventDefault();
                        document.getElementById(
                          'delete-form-{{ $wyd->id }}').submit();">
                                Usuń
                            </a>
                        </td>
                        <form id="delete-form-{{ $wyd->id }}" + action="{{ route('wydawnictwa.usun', $wyd->id) }}"
                            method="post">
                            @csrf @method('DELETE')
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
