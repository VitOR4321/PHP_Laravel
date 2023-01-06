<nav>
    <div>
        <div>
            <a href="./">Strona domowa<span>(current)</span></a>
            <a href="./ksiazki">Książki</a>
            <a href="./kategorie">Kategorie</a>
            <a href="./wydawnictwa">Wydawnictwa</a>
            <a href="./dodaj_ksiazke">Dodaj książkę</a>
            <a href="./dodaj_kategorie">Dodaj kategorię</a>
            <a href="./dodaj_wydawnictwo">Dodaj wydawnictwo</a>
            <a href="./usun_ksiazke">Usuń książkę</a>
            <a href="./usun_kategorie">Usuń kategorię</a>
            <a href="./usun_wydawnictwo">Usuń wydawnictwo</a>
            @if(Auth::check())
            <a href="./wyloguj">Wyloguj</a>
            @else
            <a href="./loguj">Zaloguj</a>
            @endif
        </div>
    </div>
</nav>