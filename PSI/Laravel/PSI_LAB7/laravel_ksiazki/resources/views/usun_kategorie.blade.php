<!DOCTYPE html>
<html lang="pl">
@include('partials.head')

<body>
    @include('partials.navi')
    <div id="zawartosc">
        <h2>Lista kategorii</h2>
        <table>
            <thead>
                <tr>
                    <th>ID kategorii</th>
                    <th>Opis</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategoria as $kat)
                    <tr>
                        <td>{{ $kat->id }}</td>
                        <td>{{ $kat->opis }}</td>
                        <td><a href="{{ route('listaKategorii') }}"
                                onclick="event.preventDefault();
                        document.getElementById(
                          'delete-form-{{ $kat->id }}').submit();">
                                Usuń
                            </a>
                        </td>
                        <form id="delete-form-{{ $kat->id }}" + action="{{ route('kategorie.usun', $kat->id) }}"
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
