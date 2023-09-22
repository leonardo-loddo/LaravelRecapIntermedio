<x-app>
    <!-- Header-->
    <header class="py-5">
        <div class="container px-lg-5">
            <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                <div class="m-4 m-lg-5">
                    <h1 class="display-5 fw-bold">Rotta Parametrica</h1>
                    <p class="fs-4">Queste card vengono generate dinamicamente</p>
                </div>
            </div>
        </div>
    </header>
    <section>
        <h3 class="text-center">Servizi Dentistici</h3>
        <div class="row justify-content-evenly">
            @foreach ($denti as $servizio)
                <div class="card col-12 col-md-3 my-2 " style="width: 18rem;">
                    <img src="{{$servizio['cover']}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$servizio['name']}}</h5>
                        <p class="card-text">{{$servizio['description']}}</p>
                        <a href="{{route('detail', ['uri' => $servizio['uri']])}}" class="btn btn-primary">Dettaglio</a>
                    </div>
                </div>
            @endforeach
        </div>
        <h3 class="text-center mt-5">Servizi Bellezza</h3>
        <div class="row justify-content-evenly">
            @foreach ($bellezza as $servizio)
                <div class="card col-12 col-md-3 my-2 " style="width: 18rem;">
                    <img src="{{$servizio['cover']}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$servizio['name']}}</h5>
                        <p class="card-text">{{$servizio['description']}}</p>
                        <a href="{{route('detail', ['uri' => $servizio['uri']])}}" class="btn btn-primary">Dettaglio</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-app>