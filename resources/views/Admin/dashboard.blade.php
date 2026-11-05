<x-c-layout>
    <div class="container my-5">

        <h1 class="page-heading">Bentornato, Amministratore {{ Auth::user()->name }}</h1>

        @if (session('message'))
            <div class="alert alert-success text-center">
                {{ session('message') }}
            </div>
        @endif

        <div class="row g-5">
            <div class="col-12">
                <h2 class="section-title mb-3">Richieste per il ruolo di amministratore</h2>
                <x-c-requests-table :requests="$adminRequests" role="amministratore" />
            </div>

            <div class="col-12">
                <h2 class="section-title mb-3">Richieste per il ruolo di revisore</h2>
                <x-c-requests-table :requests="$revisorRequests" role="revisore" />
            </div>

            <div class="col-12">
                <h2 class="section-title mb-3">Richieste per il ruolo di redattore</h2>
                <x-c-requests-table :requests="$writerRequests" role="redattore" />
            </div>
        </div>

    </div>
</x-c-layout>