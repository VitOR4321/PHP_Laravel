<!DOCTYPE html>
<html lang="pl">
@include('partials.head')

<body>
    @include('partials.navi')
    <div id="zawartosc">
        <h2>Lista książek</h2>
        <table>
            <thead>
                <tr>
                    <th>ID książki</th>
                    <th>Tytuł</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ksiazka as $ks)
                    <tr>
                        <td>{{ $ks->id }}</td>
                        <td>{{ $ks->tytul }}</td>
                        <td><a href="{{ route('listaKsiazek') }}"
                                onclick="event.preventDefault();
                        document.getElementById(
                          'delete-form-{{ $ks->id }}').submit();">
                                Usuń
                            </a>
                        </td>
                        <form id="delete-form-{{ $ks->id }}" + action="{{ route('ksiazki.usun', $ks->id) }}"
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
