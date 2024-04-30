<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigation-menu-2', ['active' => 'empresas'])
    </x-slot>

    <div class="shadow p-3 mb-5 bg-white rounded mt-3">
        <div class="container">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <u>Nueva Empresa</u>
            </h2>
            <form method="POST" action="{{ route('empresa.update-store') }}">
                <div class="row no-gutters">
                    <div class="col-12 col-md-4 px-2">
                        <label for="">CUIT</label>
                        <input class="form-control" name="" />
                    </div>
                    <div class="col-12 col-md-4 px-2">
                        <label for="">Razon Social</label>
                        <input class="form-control" name="" />
                    </div>
                    <div class="col-12 col-md-4 px-2">
                        <label for="">Nombre Fantasia</label>
                        <input class="form-control" name="" />
                    </div>
                    <div class="col-12 col-md-4 px-2">
                        <label for="">Provincia</label>
                        <input class="form-control" name="" />
                    </div>
                    <div class="col-12 col-md-4 px-2">
                        <label for="">Codigo Postal</label>
                        <input class="form-control" name="" />
                    </div>
                    <div class="col-12 col-md-4 px-2">
                        <label for="">Direccion</label>
                        <input class="form-control" name="" />
                    </div>
                    <div class="col-12 col-md-4 px-2">
                        <label for="">Telefono</label>
                        <input class="form-control" name="" />
                    </div>
                    <div class="col-12 col-md-4 px-2">
                        <label for="">Email</label>
                        <input class="form-control" name="" />
                    </div>
                    <div class="col-12 col-md-4 px-2">
                        <label for="">Web</label>
                        <input class="form-control" name="" />
                    </div>
                    <div class="col-12 col-md-4 px-2">
                        <label for="">Fecha Alta</label>
                        <input type="date" class="form-control" name="" />
                    </div>
                    <div class="col-12 col-md-4 px-2">
                        <label for="">Fecha Baja</label>
                        <input type="date" class="form-control" name="" />
                    </div>
                    <div class="col-12 col-md-4 px-2">
                        <div class="form-check" style="margin-top: 27px;">
                            <input class="form-check-input" type="checkbox" value="" id="recibeEmail">
                            <label class="form-check-label" for="recibeEmail">
                                Recibe Email
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 px-2">
                        <label for="">Descripcion</label>
                        <textarea class="form-control" name="" style="resize: none;"></textarea>
                    </div>

                </div>
            </form>
        </div>
    </div>
</x-app-layout>
