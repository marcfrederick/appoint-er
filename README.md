![Laravel](https://github.com/appoint-er/htwg-web-tech-dynamic/workflows/Laravel/badge.svg?branch=master)

# appoint.er
> ⚠️ Do **not** edit on GitLab. Changes will be overwritten on the next push to GitHub.

## Zusammenfassung der Beschreibung der Funktionalität

* Accounts erstellen.
* Log-in.
* Orte erstellen.
* Termine buchen.
* Reservierte Termine einsehen.
* Orte durchsuchen.
* Kategorien anzeigen.
* Admin kann alle Nutzer sehen.




## Wow-Faktor der Applikation

Appoint.er hat zwei Suchen, eine im Header der Seite, die die direkte Suche von Orten ermöglicht.
Zusätzlich ist eine zweite Suche im unteren Teil der Homepage vorhanden, die bei keiner Eingabe einen Ausschnitt der vorhandenen Orte zeigt
und bei einer Eingabe oder Kategorieauswahl die angezeigten Orte in Echtzeit anpasst.

## Technische Implementierung
### Views
### JavaScripts
### Sass
### Models
### Controller

### Datenbank
> ℹ️ Bei jedem Deploy wird die Datenbank geleert und mittels Migrationen und Seedern neu asufgesetzt. 

Die gesamte Datenbank wird mittels Migrationen erstellt.
Es existieren Seeder und Factories, mittels derer die Datenbank zu Test- und Vorführzwecken mit Beispieldaten bespielt werden kann.

### Nutzer Eingaben
Nutzereingaben werden mittels in eigenen Requests definierten Regeln validiert.
Bei fehlerhaften Eingaben wird der Nutzer mittels Fehlermeldungen auf diese hingewiesen. 

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
