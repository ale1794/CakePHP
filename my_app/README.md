# CakePHP Application Skeleton



A skeleton for creating applications with [CakePHP](https://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run

```bash
composer create-project --prefer-dist "cakephp/app:^3.8"
```

In case you want to use a custom app dir name (e.g. `/myapp/`):

```bash
composer create-project --prefer-dist "cakephp/app:^3.8" my_app
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Struttura
Per vedere ciò che di concreto ho provato a fare bisogna visitare http://localhost:8765/users. Viene visualizzata una pagina che permette l'accesso a chi è già registrato o la possibilità di registrazione con conseguente invio di richiesta di adesione come socio o guest, l'admin non ha un format per la registrazione poiché ne viene inserito uno quando viene chiamato il controller Users.
Una volta effettuato l'accesso ognu utente ha una view specifica dove effettua le azioni consentite. 

## Database
Per il database ho pensato a 3 tabelle, users per gli utenti, adhesions per le adesioni e courses per i corsi. Utenti e adesioni hanno una relazione 1 a 1, quindi ogni utente puo effettuare una richiesta di adesione. Ho provato a fare questa associazione in cakephp cosi da eliminare un utente dalla tabella se la sua richiesta fosse stata rifiutata.
La tabella corsi non ha relazioni con le altre 2 tabelle in quanto non hanno legami tali da creare associazioni

## Considerazioni
Non so quanto possa aver sfruttato i vantaggi offerti dal framework, essendo parecchie cose. Ho scritto e cercato di far funzionare l'applicazione secondo quanto gia sapevo.

