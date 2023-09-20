## Esercizio Recap

0 creare la repository su github
0.1 lancio git init nel progetto
0.2 git remote add origin git@github.com:leonardo-loddo/LaravelRecapIntermedio.git
0.3 git add .
0.4 git commit -m "Init"
0.5 git push --set-upstream origin master
1 installare NPM bootstrap
1.1 lancio npm i bootstrap
1.2 importo css e js in resources (@import "bootstrap"; nel app.css e import 'bootstrap';
import './bootstrap'; nel app.js)
1.3 lancio npm install && npm run dev
2 creo un layout php artisan make:component App (vado in app/View/Components e nella funzione render rinomino il return in 'template.app')
2.1 rinomino la cartella components dentro views in template e cancello welcome.blade.php
2.2 copio a ' view-source:https://startbootstrap.github.io/startbootstrap-heroic-features/ ' e lo incollo in app.blade.php
2.3 rimuovo le cdn dalla head e importo @vite(['resources/css/app.css','resources/js/app.js']) dentro il layout
2.4 inserisco lo {{$slot}} nel layout
2.5 creo la cartella components in views e dentro ci creo navbar e footer (tutti e due file blade.php)
2.6 richiamo la navbar con <x-navbar /> all'interno del template
3 routes
3.1 creo rotte homepage servizi e contatti in web.php
Route::get('/', function () {
return view('homepage');
})->name('home');

Route::get('/service', function () {
return view('service');
})->name('service');

Route::get('/contact', function () {
return view('contact');
})->name('contact');

4 views
4.1 creo le viste homepage, service e contact
4.2 racchiudo il contenuto delle mie pagine tra <x-app> </x-app>
4.3 rendo dinamiche le rotte nella navbar con href="{{route('homepage')}}"
4.4 rendo dinamica la classe active nei link con "@if(Route::currentRouteName() == 'homepage') active @endif" nelle classi
36
