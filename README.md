![Laravel](https://github.com/appoint-er/htwg-web-tech-dynamic/workflows/Laravel/badge.svg?branch=master)

# appoint.er
> ⚠️ Do **not** edit on GitLab. Changes will be overwritten on the next push to GitHub.

## Zusammenfassung der Beschreibung der Funktionalität

* Accounts erstellen.
* Log-in.
* Orte erstellen.
* Termine buchen.
* Gebuchte Termine einsehen.
* Orte durchsuchen.
* Kategorien anzeigen.
* Admin kann alle Nutzer sehen.
* Termine für den eigenen Ort einsehen.




## Wow-Faktor der Applikation

Appoint.er hat zwei Suchen, eine im Header der Seite, die die direkte Suche von Orten ermöglicht.
Zusätzlich ist eine zweite Suche im unteren Teil der Homepage vorhanden, die bei keiner Eingabe einen Ausschnitt der vorhandenen Orte zeigt
und bei einer Eingabe oder Kategorieauswahl die angezeigten Orte in Echtzeit anpasst.
Falls die Kategorie nicht ausgewählt wird, zeigt es die entsprechenden Orte aller Kategorien an.

## Technische Implementierung
Eine exakte Beschreibung unserer Implementierung aufgeteilt nach:

### Views
Unsere Views haben wir in folgender Ordnerstruktur eingeteilt: 
* Auth: Hier befinden sich die Views zur Authentisierung wie die Login-View und die Registierungs-View.
    * Passwords: In diesem Unterorder befindet sich die View zum Zurücksetzen des Passworts.
* Booking: Dieser Ordner beinhaltet die View zum Buchen von Terminen.
* Category: Hier sind die Views zum Erstellen von Kategorien, Bearbeiten von Kateogorien sowie die Übersicht aller Kategorien und die
View der einzelnen Kategorien.
* Layouts: Hier ist das Layout der Webapplikation. Alle anderen Views werden in als Content in diese View geladen.
* Location: Die Views zum Erzeugen von Orten sowie die View zum Bearbeiten, die View für die Übersicht aller Orte und die View zum Anzeigen
der einzelnen Orte.
* Pagination: ???
* Partials: Hier befinden sich weitere Teile die öfters Vorkommen wie der Header, Footer, Cookie-Meldung und die einzelnen Karten

### Mix
JavaScript und CSS wird mittels Laravel Mix aus den dateien in `resources/js` und `resources/scss` kompiliert. 

#### JavaScript
Unser JavaScript Code ist auf mehrere Dateien aufgeteilt.
Da diese mittels Laravel Mix kompiliert und minimiert werden inkludieren wir, für bessere Debugability, Source Maps.

Die `app.css` aktiviert alle Toasts (durch Bootstrap definiert) und definiert eine `confirmable` CSS Klasse, die das einfache Einbinden von Bestätigungsdialogen erlaubt.
Um eine Element zu schützen reicht es ihm diese Klasse zuzuweisen und mittels des `data-confirm` Attributs eine Meldung zu wählen.
```html
<a href="#" class="confirmable" data-confirm="Are you sure?"/>
```    

Die `search.js` implementiert unsere AJAX-Suche und wird ausschließlich auf der Startseite eingebunden, da die Suche nur hier existiert.
Sie liest ihre Ergebnisse als JSON vom `/api/locations/search` Endpoint und generiert das fertige HTML.

Weiterhin existiert eine `cookie.js` die dafür sorgt, dass beim ersten Besuch der Seite eine Cookie-Warnung eingeblendet wird.  

#### Sass
Wir verwenden für unser Layout eine mittels SASS modifizierte Version von Bootstrap.
Weiterhin sind einige spezifische Klassen in der `style.css` definiert.
Für erhöhte effizient werden nicht verwendete Klassen mittels [PurgeCSS](https://purgecss.com) aus den Dateien entfernt.

### Models
Es existiert ein Model für alle für uns relevanten Tabellen in der Datenbank.
Wir verwenden grundsätzlich Models zum Datenbankzugriff, um flexibel bezüglich des dahinter-stehenden Datenbanksystems zu sein.

Jedes Model definiert seine `$fillable` und stellt Methoden für mögliche Relationen bereit.
Weiterhin definieren einige Models eigene Accessors und Mutators mittels der magischen `set...Attribute` und `get...Attribute` Methoden. 

### Controller
Wir verwenden, wann immer möglich ResourceController.
Wo dies nicht möglich ist, folgen die Controller trotzdem den zugrunde liegenden Models.
Die Ausnahme bilden hier der `SitemapController` und `IndexController`, denen kein spezifisches Model zugrunde liegt.

Die Eingabe-Validierung von Formulardaten ist nicht in den Controllern selber, sondern mittels eigener Request-Klassen realisiert die vom Laravel Service-Container anhand der Parameter-Typisierung injiziert werden.  

### Datenbank
> ℹ️ Bei jedem Deploy wird die Datenbank geleert und mittels Migrationen und Seedern neu asufgesetzt. 

Die gesamte Datenbank wird mittels Migrationen erstellt.
Es existieren Seeder und Factories, mittels derer die Datenbank zu Test- und Vorführzwecken mit Beispieldaten bespielt werden kann.

### Authentifizierung
Wir verwenden die bereits von Laravel zur Verfügung gestellte Authentifizierung.
Diese haben wir um die Möglichkeit Rollen hinzuzufügen erweitert.
Mögliche Rollen sind `basic` und `admin`.
Implizit existiert weiterhin eine dritte Gruppe `guest` für nicht registrierte Besucher der Website.

### Authorization
> ✅ Korrektheit der Authorization ist mittels Tests sichergestellt.

Die Autorisierung von Ressourcen ist mittels Policies implementiert.
Die `LocationPolicy` verwendet weiterhin eine `before()`-Methode die den Nutzern mit der `admin`-Rolle alles erlaubt.  
Basierend auf dem Typen der `$user` Parameters der Methoden werden nicht-eingeloggte Nutzer akzeptiert (`?User`) oder abgelehnt (`User`). 

Diese Policies sind auf Basis unserer ResourceController generiert und sind daher automatisch auf deren Standardmethoden gemapped.

### Lokale Testläufe
Unser Code ist auf GitHub gehosted und wird bei jedem Push oder Pull Request mittels GitHub Actions getestet.
Weiterhin ist der Code mit Typ-Annotationen versehen und mittels [Larastan](https://github.com/nunomaduro/larastan) auf Korrektheit prüfbar.

### Deployment
Deploys auf unserer [unstable environment](https://appoint-er-unstable.herokuapp.com) laufen automatisch bei jedem GitHub push.
Der deploy auf die [production environment](https://appoint-er.herokuapp.com) müssen manuell aus dem Heroku Dashboard ausgelöst werden.

<div align="center">
    <img src=".github/resources/deployment.svg" width="80%" alt="Deployment pipeline">
</div>

#### Datenbank
Als Datenbank verwenden wir eine auf Heroku gehostete Postgres-Instanz.
Aller Code ist jedoch unabhängig von der Datenbank geschrieben und läuft auch auf einer MySQL Datenbank.
Bei jedem Release wird, sowohl auf `unstable` als auch auf `production` wird die Datenbank gelöscht und mit neuen Seed-Daten befüllt (Siehe [hier](Procfile)).

## SEO Maßnahmen
