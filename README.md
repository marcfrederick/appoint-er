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
### Authentication & Authorization

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
