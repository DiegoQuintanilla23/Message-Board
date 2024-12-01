<x-guest-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1 style="font-size: 90px" id="demotext">{{ config('app.name', 'Laravel') }}</h1>
                <a href="{{ route('login') }}" style="text-decoration: none;"><h4 class="vibrate-1" style="font-size: 50px" id="demotext-ex">Iniciar Sesión</h4></a>
                <a href="{{ route('register') }}" style="text-decoration: none;"><h4 class="vibrate-1" style="font-size: 50px" id="demotext-ex">Registrarse</h4></a>
            </div>
        </div>
    </div>
</x-guest-layout>
