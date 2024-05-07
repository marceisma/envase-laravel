<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigation-menu-2', ['active' => 'empresas'])
        <!-- 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        -->
    </x-slot>

    <div class="shadow p-3 mb-5 bg-white rounded">
        <div class="container">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">
                <u>Panel Empresas</u>
            </h2>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <th>Cuit</th>
                        <th>Razon Social</th>
                        <th>Telefono</th>
                        <th>Email</th>
                    </thead>
                    <tbody>
                        @foreach ($viewData['empresas'] as $item)
                            <tr style="white-space: nowrap;">
                                <td class="p-0">{{$item['cuit']}}</td>
                                <td class="p-0"><b><a href="">{{$item['razon_social']}}</a></b></td>
                                <td class="p-0">{{$item['telefono']}}</td>
                                <td class="p-0">{{$item['email']}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $viewData['empresas']->links() }}
            </div>
        </div>
    </div>
    <style>
        a {
            color: blue;
        }
    </style>
</x-app-layout>
