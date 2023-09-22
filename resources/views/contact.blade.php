<x-app>
    <!-- Header-->
    <header class="py-5">
        <div class="container px-lg-5">
            <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                <div class="m-4 m-lg-5">
                    <h1 class="display-5 fw-bold">A warm welcome!</h1>
                    <p class="fs-4">Bootstrap utility classes are used to create this jumbotron since the old component has been removed from the framework. Why create custom CSS when you can use utilities?</p>
                    <a class="btn btn-primary btn-lg" href="#!">Call to action</a>
                </div>
            </div>
        </div>
    </header>
    <section>
        <form action="{{route('send')}}" method="POST">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" value="{{old('email')}}" class="form-control" name="email" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" value="{{old('name')}}" name="name">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
</x-app>