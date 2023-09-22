<!-- ## Esercizio Recap 

0 creare la repository su github
- 0.1 lancio git init nel progetto
- 0.2 git remote add origin git@github.com:leonardo-loddo/LaravelRecapIntermedio.git
- 0.3 git add .
- 0.4 git commit -m "Init"
- 0.5 git push --set-upstream origin main

1 installare NPM bootstrap
- 1.1 lancio npm i bootstrap
- 1.2 importo css e js in resources (@import "bootstrap"; nel app.css e import 'bootstrap';
import './bootstrap'; nel app.js)
- 1.3 lancio npm install && npm run dev

2 creo un layout php artisan make:component App (vado in app/View/Components e nella funzione render rinomino il return in 'template.app')
- 2.1 rinomino la cartella components dentro views in template e cancello welcome.blade.php
- 2.2 copio a ' view-source:https://startbootstrap.github.io/startbootstrap-heroic-features/ ' e lo incollo in app.blade.php
- 2.3 rimuovo le cdn dalla head e importo @vite(['resources/css/app.css','resources/js/app.js']) dentro il layout
- 2.4 inserisco lo {{$slot}} nel layout
- 2.5 creo la cartella components in views e dentro ci creo navbar e footer (tutti e due file blade.php)
- 2.6 richiamo la navbar con <x-navbar /> all'interno del template

3 routes
- 3.1 creo rotte homepage servizi e contatti in web.php
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
- 4.1 creo le viste homepage, service e contact
- 4.2 racchiudo il contenuto delle mie pagine tra <x-app> </x-app>
- 4.3 rendo dinamiche le rotte nella navbar con href="{{route('homepage')}}"
- 4.4 rendo dinamica la classe active nei link con "@if(Route::currentRouteName() == 'homepage') active @endif" nelle classi

5 creo un controller lanciando php artisan make:controller PageController
- 5.1 estraggo la funzione da web.php e la incapsulo nel controller
    public function homepage() {
    return view('homepage');
    }
- 5.2 richiamo la funzione in web.php
    Route::get('/', [PageController::class, 'homepage'])->name('homepage');

6 Rotta parametrica
- 6.1 creo serviceController
- 6.2 creo l'attributo statico database con public static $database = [// qua dentro ci saranno due array conteneti piu array];
- 6.3 creo la mia rotta parametrica in web.php per le pagine dettaglio
- 6.4 definisco la funzione detail nella quale vado a fare un conrollo per trovare il servizio giusto dinamicamente
    public function detail($uri){
        foreach (self::$database as $arrays){
            foreach ($arrays as $array){
                if ($array['uri'] == $uri){
                    return view('detail', compact('array'));
                }
            }
        }
        abort(404); 
    }
- 6.5 creo la vista detail in cui vado a richiamare in una card tutti i dati del servizio con questa sintassi {{$array['name']}}
- 6.6 sposto la funzione service da pageController a ServiceController
- 6.7 modifico la funzione in modo da passare i due array contenuti in database
    public function service() {
        return view('service', [
            'denti' => self::$database['denti'],
            'bellezza' => self::$database['bellezza'],
        ]);
    }
- 6.8 creo due forech nella view service in modo da generare dinamicamente le card con i servizi dentali e di bellezza con i relativvi dati e bottoni che portano al dettaglio <a href="{{route('detail', ['uri' => $servizio['uri']])}}"

7 Invio Mail
- Nella view contact creo un form con action {{route('email')}} e method POST
- Definisco la rotta Route::get('/invia-email', [PageController::class, 'send'])->name('send');
- definisco la funzione nel controller
    public function send(Request $emailRequest){
        $emailRequest->all();
    }
- aggiungo il @csrf token e gli input ricordandomi di dare un name ad essi, ddo come type al bottone "submit"
- aggiungo la logica di validazione alla funzione send
    public function send(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
    }
- aggiungo lo snippet per gli errori nel mio form
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
- aggiungop il value="{{old('email')}}" ai campi input in modo in caso di errore di non dover far reimettere tutti i dati al mio utente
- aquisisco i dati all'interno della funzione send e li inserisco in $data
    $data = [
        'name' => $request->name,
        'email' => $request->email,
    ];
- lancio il comando per creare la mia mail `php artisan make:mail InfoMail`
- vado ad aggiunger public $content; nel file InfoMail.php e lo richiamo come parametro nella __construct
- all'interno della construct:
    public function __construct($content)
        {
            $this->content = $content;
        }
- creo la vista info.send
- aggiorno il metodo content in InfoMail.php
    public function content(): Content
    {
        return new Content(
            view: 'info.send',
        );
    }
- aggiungo il comando per l'invio mail nel metodo send
    Mail::to($request->email)->send(new InfoMail($data));
- aggiorno il mio .env con i dati di mailtrap