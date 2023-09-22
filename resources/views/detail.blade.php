<x-app>
    <!-- Header-->
    <header class="py-5">
        <div class=" px-lg-5">
            <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                <div class="m-4 m-lg-5">
                    <h1 class="display-5 fw-bold">{{$array['name']}}</h1>
                    <p class="fs-4">Questa é la pagina di dettaglio del servizio {{$array['name']}}</p>
                </div>
            </div>
        </div>
    </header>
    <section class="d-flex justify-content-center pb-5">
        <div class="card" style="width: 18rem;">
            <img src="{{$array['cover']}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$array['name']}}</h5>
                <p class="card-text">{{$array['description']}}</p>
                <a href="#" class="btn btn-primary">Prenota ora</a>
            </div>
        </div>
    </section>

</x-app>