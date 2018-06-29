------------------------------------------------------------
0-1 Knapsack Problem
------------------------------------------------------------
############################################################
------------------------------------------------------------
Instrukcja uruchomienia programu dla środowiska Windows 10
------------------------------------------------------------

- Aby uruchomić program proszę upewnij się że:
- Posiadasz w zmiennych systemowych dodaną ścieżkę do interpretera PHP np:

'C:\xampp\php'

- Następnie w wierszu poleceń proszę nawiguj do folderu,
w którym znajduję się niniejszy program, np:

'C:\users\[user_name]\Desktop\knapsack_problem'

- Następnie w wierszu poleceń proszę wprowadź komendę:

php -f run.php

Voila! Uruchomiłeś/aś program!

------------------------------------------------------------
Instrukcja implementacji nowego algorytmu
------------------------------------------------------------

- Upewnij się, że Twój algorytm dziedziczy z klasy 'Algorithm'

- Upewnij się, że Twoje zmienne zwracają i przyjmują dane w takim
samym formacie jak klasa 'Algorithm'

- Zainstaluj plik z algorytmem w folderze \library\algorithm\

- W pliku config.php, który znajduje się w głównym katalogu dodaj
  nowy element do tablicy w lini 18:

  'NazwaKlasy' => 'Tytuł algorytmu, który zostanie wyświetlony'

Twój algorytm może już zostać użyty w programie!
