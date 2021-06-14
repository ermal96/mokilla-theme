Mokilla Theme
===

0. Utilizzo dello starter
1. Setup dell'ambiente di sviluppo
2. Plugin necessari
3. Configurazioni di Wordpress di base e dei plugin
4. Per lo sviluppo
5. Per il rilascio 
6. Setup macchina produzione


## 0. Utilizzo dello starter
Ciao! Segui questi passi per eseguire la prima configurazione di questo tema, e poi cancella questo punto.
* Rimuovi il file readme.txt se non intendi pubblicare questo tema nella directory di WordPress
* Utilizza questo file per spiegare come riprodurre l'ambiente di sviluppo e di produzione: trovi già una struttura generale e delle metodologie applicate su altri progetti che potresti riprodurre...riempi con le tue informazioni.


## 1. Setup dell'ambiente di sviluppo
* installare Wordpress
* installare i plugin nominati al prossimo paragrafo
* installare ed attivare il tema 
* tramite terminale, dentro la cartella del tema, lanciare `npm install`
* tramite terminale, dentro la cartella del tema, lanciare `npm run build`
* tramite terminale, dentro la cartella del tema, lanciare `composer install`


## 2. Plugin necessari
* 
* 

## 3. Configurazioni di Wordpress di base e dei plugin
Queste azioni sono da eseguire sia al primo rilascio in produzione che ad ogni ambiente di sviluppo da creare.
* Impostazioni -> Generali, cambiare titolo e motto
* 

## 4. Per lo sviluppo

Nel file package.json sono elencati gli script npm configurati per creare i bundle javascript e css. Per lo sviluppo, lanciare `npm run dev` che a sua volta eseguirà a cascata gli script per i watch.
Per lo sviluppo PHP è presente Composer. È presente il namespace Crispybacon\mokilla per le classi da sviluppare, che devono essere inserite nella cartella "src".
Lanciare
`composer install`
alla prima installazione del tema, e
`composer dump-autoload -o`
per ricreare lo script di autoload ad ogni classe aggiunta.

## 5. Per il rilascio
Lanciare `npm run build` per creare i bundle minificati dei file javascript e css.
NOTA PER TRADUZIONI: se si sta usando una macchina Kusanagi, di default le traduzioni vengono disabilitate, entrare nel pannello di amministrazione del plugin per riattivarle.
NOTA PER LIMITE UPLOAD: per modificare il limite di upload di wordpress, è necessario modificare il php.ini.
Se si sta utilizzando una macchina Kusanagi:
* Verificare da quale php ini sta prendendo le configurazioni, facendosi stampare il phpinfo() (php -i da linea di comando)
* Modificare upload_max_filesize e post_max_size
* Riavviare i servizi di apache e php:
    * /sbin/service httpd restart
    * service php7-fpm restart

## 6. Setup macchina produzione
Attualmente il progetto è deployato su una macchina Kusanagi (https://en.kusanagi.tokyo/document/kusanagi-init/).
Nella fase di provisioning è stata creata la cartella "html" dentro l'utente kusanagi, all'interno della quale è situato WordPress.
Tema e plugin sono stati clonati dal repo Pansetta, quindi per deployare è necessario connettersi in ssh e pullare. Non è necessario specificare branch, in quanto è stato clonato un solo branch di produzione.
# mokilla-theme
