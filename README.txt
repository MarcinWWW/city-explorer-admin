PANEL ADMINISTRATORA - wersja MySQL

v. 1.0.  
v. 2.0. - wersja z pierwszej obrony
v. 2.1. - odnożniki w stopce, rejestracja administratora przez administratora
v. 2.2. - kompatybilność z Chrome, rejestracja rozwijana dropdown
v. 2.3. - komunikaty dot. błędnej lub udanej rejestracji / logowania
v. 2.4. - wybór grupy beacona przy dodawaniu, poprawione komunikaty rejestracji
v. 2.5. - walidacja i REGEX na user i beacon 
v. 2.6. - wersja MySQL

technologie:
PHP
cURL
HTML
CSS
JavaScript

przygotował:
Marcin Jadwiszczak


TESTY AUTOMATYCZNE
v. 1.0. - testowy commit, utworzenie folderu PageObjects oraz klasy FrontPage
v. 2.0. - uzupełnienie FrontPage o potrzebne WebElementy oraz funkcje, zautomatyzowane przypadki testowe:
       - 1) validLoginCase
       - 2) invalidLoginCase
       - 3) validRegistrationUserCase
       - 4) validRegistrationUserCase2
       - 5) validRegistrationUserCase3
v. 3.0. - poprawki FrontPage, zautomatyzowane przypadki testowe:
       - 6) addNewBeaconUploadFileAfterFillingDataCase
       - 7) addNewBeaconUploadFileBeforeFillingDataCase
       - 8) addNewBeaconWithSameIDsCase
       - 9) addThenDeleteBeaconCase
technologie/narzędzia:
Java
Selenium WebDriver
TestNG
Maven
Jenkins

przygotował:
Daniel Gruchociak

