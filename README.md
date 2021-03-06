Up MVC
======

Beskrivning
-----------

Up MVC är ett mycket enkelt ramverk baserat på HMVC- principen (Hierarchical
Model View Controller) och med Front Controller. Riktat till den avancerade
nybörjaren som vill lära sig lite mer om OOP och (H)MVC. Funktionerna är
väldigt rudimentära, men det går ändå att göra mycket.

Tanken är att ni som velat lära er lite mer om ObjektOrientering och
MVC ska ha något litet att titta på (kanske innan ni ger er på de
större ramverken). Koden är gjord så att den ska vara förhållandevis
enkel att greppa, utan komplicerade relationer mellan olika objekt.

Ramverket använder sig av closures och namespaces, och kräver därför
PHP 5.3. Läs mer i PHP's manual om closures samt namespaces, och sök
på exempelvis wikipedia om mer information om MVC eller HMVC. Manualen
förklarar dock så klart vad du behöver veta om namespaces och MVC för att du
ska kunna använda alla funktioner av ramverket.

Dokumentation (manual) för Up MVC följer med installationen som
exempelsida. Du kan alltid nå den när du vill.


Senaste version
---------------

Du kan hämta den senaste versionen av Up MVC på github
https://github.com/saurid/UpMvc2


Installation och dokumentation
------------------------------

### Systemkrav

* Webbserver med stöd för URL-rewrite (tex Apache och rewrite_module)
* PHP >= 5.3.0
* PDO extension (om databas används)

### Installera i testmiljö (egen mapp på servern):

* Packa upp zip-filen i din webbservers webbrot
* Byt namn på mappen om du vill
* Surfa in på `http://localhost/[din mapps namn]/` för att läsa manualen

### Installera i produktionsmiljö (rekommenderas ej):

* Packa upp innehållet i zip-filen i din webbservers webbrot
* Surfa in på `http://localhost/` för att läsa manualen

### Konfigurera databasinställningar:

Öppna filen `App/config.php` och redigera variablerna med prefix `db_`
till dina egna uppgifter för värd, användarnamn, lösenord och data-
basnamn.


Några viktiga beståndsdelar
---------------------------

### Model

En model bygger du upp med enkla klasser och metoder som du
kan anropa ifrån controller-lagret och skicka vidare data (ofta som
arrays) till view för utskrift. Behöver du använda mySQL finns det en
enkel wrapper `Database.php` över PDO. Modeller lagras i mappen
`App/Model`.

### View

View består av en mycket enkel template-klass (view.php) där du
sätter variabler som du sedan skriver ut med php i dina HTML-mallar
som lagras i mappen `App/View`.

### Controller

Controllern utgörs av en routing `Route.php` och `RouteResolver.php`
som startas från index.php. Dessa laddar in och kör dina egna
controllers/actions i mappen `App/Controller`. Du har så klart möjlighet
att även skicka med variabler via URL också.

### Service Container (Dependency Injection Container)

En statisk (singleton) class `Container.php` du använder för att
ladda in, skapa och lagra objekt eller variabler i ramverket.
Containern används även internt av Up MVC.


Up MVC är utvecklad av (kontaktinformation)
-------------------------------------------

* https://github.com/saurid
* http://www.waljefors.se
