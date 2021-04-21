<p align="center"><a href="https://additive.eu" target="_blank"><img src="https://raw.githubusercontent.com/additive-apps/trial-day/master/logo.png" width="400"></a></p>


# 04 Research


At ADDITIVE we need the possibility for our content creators to update the texts used in our ADDITIVE+APPS in all supported languages. The elaborated solution should neither require our content creators to have access to the codebase hosted on GitHub nor require a redeploy of an app after a text change. All apps are already multilingual and use keys to get a text in a specific language.

Your goal is to find and discuss at least two solutions inside this document that can be implemented in our Frontend (JS) and Backend (PHP) with it's pros and cons. Create a pull request at the end to complete your work. 

Currently this languages should be supported 

- en
- de
- it
- fr
- nl
- pl

### Example

![newsletter.png](assets/newsletter.png)

In the example above you can see 4 text elements taken from ADDITIVE+NEWSLETTER that should be adjustable and translatable.

- Übersicht (key = `newsletter.overview.title`)
- Hier sehen Sie einen Überblick über Kampagnen, Empfänger und Interaktionen der Empfänger mit Ihren Kampagnen. (key = `newsletter.overview.intro`)
- Sie haben noch keine Verbindung zu Google Analytics hergestellt. Sie können sich hier mit einem Google Analytics Konto verbinden. (key = `newsletter.notification.google_analytics.missing.text`)
- Google Analytics verbinden (key = `newsletter.notification.google_analytics.missing.action`)


Lösungsvorschlag 1 (selber programmieren):

- datenbanktabelle schluessel erstellen
    id:int
    key:string
  
- datenbanktabelle uebersetzungen erstellen
    id:int
    key_id:int
    language_code:string
    language_string:string
  
eine Seite erstellen, bei welcher der Benutzer über ein Suchfeld Schlüsselwörter suchen kann (z.B. newsletter, overview);
anschließend wird in der tabelle schluessel nach übereinpassenden keys gesucht, falls vorhanden dann wird dem Benutzer die
passenden keys ausgegeben

Nun könnte der Benutzer auf einen Key klicken, welcher anschließend ein Formular mit den Vorhandenen Sprachen und Übersetzungen öffnet,
worin er die Strings aktualisieren kann.

PRO/CONTRA: unabhängig von anderen systemen/evtl. mehr zeitaufwand da man es selber erst programmieren muss?


Lösungsvorschlag 2:

Anbieter finden welcher das alles übernimmt, leider keinen gefunden?!






