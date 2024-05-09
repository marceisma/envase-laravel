<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigation-menu-2', ['active' => 'empresas'])
    </x-slot>

    <div class="shadow p-3 mb-5 bg-white rounded mx-2">
        <div>
            <h2 class="text-center mb-2">
                <u>{{ isset($viewData['empresa']) && $viewData['empresa']['razon_social'] ? $viewData['empresa']['razon_social'] : 'Empresa' }}</u>
            </h2>
            <form method="POST" action="{{ route('empresa.update-store') }}" enctype="multipart/form-data">
                @csrf
                <input hidden name="id" value="{{isset($viewData['empresa']) ? $viewData['empresa']['id'] : ''}}" />
                <div class="row no-gutters border p-2">
                    <div class="col-12">
                        <h4><u>Datos Principales</u></h4>
                    </div>
                    <div class="col-12">
                        @if (isset($viewData['empresa']) && $viewData['empresa']['logo'])
                            <img src="{{asset('storage/empresa/logo/'.$viewData['empresa']['logo']['path'])}}" style="max-width: 250px; max-height: 250px;" />
                            <br/>
                        @endif
                        
                        <button class="btn btn-success mt-2" type="button"
                            onclick="$('#inputFileLogo').click()">Actualizar Logo</button>
                        <input hidden type="file" name="logo" id="inputFileLogo" onchange="logoChange()" /><br/>
                        <small id="inputFileLogoDescription"></small>
                    </div>
                    <script type="text/javascript">
                        function logoChange() {
                            if (document.getElementById("inputFileLogo").files.length != 0) {
                                $('#inputFileLogoDescription').html(document.getElementById("inputFileLogo").files.length+' archivo cargado');
                            }
                        }
                    </script>
                    <div class="col-12 col-md-4 px-2 mt-2">
                        <label for="">CUIT</label>
                        <input required minlength="11" maxlength="11" class="form-control" name="cuit"
                            oninput="this.value = this.value.replace(/[^0-9,.]/g, '').replace(/([,.].*?)\..*/g, '$1');"
                            value="{{ isset($viewData['empresa']) ? $viewData['empresa']['cuit'] : '' }}" />
                    </div>
                    <div class="col-12 col-md-4 px-2 mt-2">
                        <label for="">Codigo IAE</label>
                        <input minlength="11" maxlength="11" class="form-control" name="codigo_iae"
                            oninput="this.value = this.value.replace(/[^0-9,.]/g, '').replace(/([,.].*?)\..*/g, '$1');"
                            value="{{ isset($viewData['empresa']) ? $viewData['empresa']['codigo_iae'] : '' }}" />
                    </div>
                    <div class="col-12 col-md-4 px-2 mt-2">
                        <label for="">Razon Social</label>
                        <input required class="form-control" name="razon_social"
                            value="{{ isset($viewData['empresa']) ? $viewData['empresa']['razon_social'] : '' }}" />
                    </div>
                    <div class="col-12 col-md-4 px-2 mt-2">
                        <label for="">Nombre Fantasia</label>
                        <input class="form-control" name="nombre_fantasia"
                            value="{{ isset($viewData['empresa']) ? $viewData['empresa']['nombre_fantasia'] : '' }}" />
                    </div>
                    <div class="col-12 col-md-4 px-2 mt-2">
                        <label for="">Pais</label>
                        <select name="id_pais" id="paises" class="form-control">
                            <option value="">Seleccionar</option>
                            @foreach ($viewData['paises'] as $item)
                                <option value="{{ $item['id'] }}" {{ $item['id'] == '11' ? 'selected=true' : '' }}
                                    {{ isset($viewData['empresa']) && $viewData['empresa']['id_pais'] == $item['id'] ? 'selected=true' : '' }}>
                                    {{ $item['nombre'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="divSelectProvincia" class="col-12 col-md-4 px-2 mt-2">
                        <label for="">Provincia</label>
                        <select name="id_provincia" id="provincias" class="form-control">
                            <option value="">Seleccionar</option>
                            @foreach ($viewData['provincias'] as $item)
                                <option value="{{ $item['id'] }}">{{ $item['descripcion'] }}
                                    {{ isset($viewData['empresa']) && $viewData['empresa']['id_provincia'] == $item['id'] ? 'selected=true' : '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div id="divSelectCiudad" class="col-12 col-md-4 px-2 mt-2">
                        <label for="">Ciudad</label>
                        <select id="ciudades" name="id_ciudad" class="form-control">
                            <option value="">Seleccionar</option>
                        </select>
                    </div>
                    <div id="divInputProvincia" class="col-12 col-md-4 px-2 mt-2 d-none">
                        <label for="">Provincia</label>
                        <input class="form-control" name="provincia" />
                    </div>
                    <div id="divInputCiudad" class="col-12 col-md-4 px-2 mt-2 d-none">
                        <label for="">Ciudad</label>
                        <input class="form-control" name="ciudad" />
                    </div>
                    <div class="col-12 col-md-4 px-2 mt-2">
                        <label for="">Codigo Postal</label>
                        <input class="form-control" name="codigo_postal"
                            oninput="this.value = this.value.replace(/[^0-9,.]/g, '').replace(/([,.].*?)\..*/g, '$1');"
                            value="{{ isset($viewData['empresa']) ? $viewData['empresa']['codigo_postal'] : '' }}" />
                    </div>
                    <div class="col-12 col-md-4 px-2 mt-2">
                        <label for="">Direccion</label>
                        <input class="form-control" name="direccion"
                            value="{{ isset($viewData['empresa']) ? $viewData['empresa']['direccion'] : '' }}" />
                    </div>
                    <div class="col-12 col-md-4 px-2 mt-2">
                        <label for="">Telefono</label>
                        <input class="form-control" name="telefono"
                            oninput="this.value = this.value.replace(/[^0-9,.]/g, '').replace(/([,.].*?)\..*/g, '$1');"
                            value="{{ isset($viewData['empresa']) ? $viewData['empresa']['telefono'] : '' }}" />
                    </div>
                    <div class="col-12 col-md-4 px-2 mt-2">
                        <label for="">Whatsapp</label>
                        <input class="form-control" name="whatsapp"
                            oninput="this.value = this.value.replace(/[^0-9,.]/g, '').replace(/([,.].*?)\..*/g, '$1');"
                            value="{{ isset($viewData['empresa']) ? $viewData['empresa']['whatsapp'] : '' }}" />
                    </div>
                    <div class="col-12 col-md-4 px-2 mt-2">
                        <label for="">Email</label>
                        <input class="form-control" name="email"
                            value="{{ isset($viewData['empresa']) ? $viewData['empresa']['email'] : '' }}" />
                    </div>
                    <div class="col-12 col-md-4 px-2 mt-2">
                        <label for="">Web</label>
                        <input class="form-control" name="web"
                            value="{{ isset($viewData['empresa']) ? $viewData['empresa']['web'] : '' }}" />
                    </div>
                    <div class="col-12 col-md-2 px-2 mt-2">
                        <label for="">Fecha Alta</label>
                        <input required type="date" class="form-control" name="fecha_alta"
                            value="{{ date('Y-m-d') }}"
                            value="{{ isset($viewData['empresa']) ? $viewData['empresa']['fecha_alta'] : '' }}" />
                    </div>
                    <div class="col-12 col-md-2 px-2 mt-2">
                        <label for="">Fecha Baja</label>
                        <input type="date" class="form-control" name="fecha_baja"
                            value="{{ isset($viewData['empresa']) ? $viewData['empresa']['fecha_baja'] : '' }}" />
                    </div>

                    <div class="col-12 col-md-4 px-2 mt-2">
                        <label for="">Descripcion</label>
                        <textarea class="form-control" name="descripcion" style="resize: none;">{{ isset($viewData['empresa']) ? $viewData['empresa']['descripcion'] : '' }}</textarea>
                    </div>
                    <div class="col-12 col-md-4 px-2 mt-2">
                        <label for="">¿ Redes Sociales ?</label>
                        <textarea disabled class="form-control" name="" style="resize: none;"></textarea>
                    </div>
                    <div class="col-12">
                        <div class="row no-gutters p-2 border my-2">
                            <div class="col-12 col-md-2 px-2 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        name="recibe_email" id="recibeEmail"
                                        {{ isset($viewData['empresa']) && $viewData['empresa']['recibe_email'] ? 'checked' : '' }}>
                                    <label class="form-check-label" for="recibeEmail">
                                        Recibe Email
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-2 px-2 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="importadorCheckbox"
                                        name="importador"
                                        {{ isset($viewData['empresa']) && $viewData['empresa']['importador'] ? 'checked' : '' }}>
                                    <label class="form-check-label" for="importadorCheckbox">
                                        Importador
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-2 px-2 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="exportadorCheckbox" name="exportador"
                                        {{ isset($viewData['empresa']) && $viewData['empresa']['exportador'] ? 'checked' : '' }}>
                                    <label class="form-check-label" for="exportadorCheckbox">
                                        Exportador
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-2 px-2 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="representanteCheckbox"
                                        name="representante"
                                        {{ isset($viewData['empresa']) && $viewData['empresa']['representante'] ? 'checked' : '' }}>
                                    <label class="form-check-label" for="representanteCheckbox">
                                        Representante
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-2 px-2 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="distribuidorChecked" name="distribuidor"
                                        {{ isset($viewData['empresa']) && $viewData['empresa']['distribuidor'] ? 'checked' : '' }}>
                                    <label class="form-check-label" for="distribuidorChecked">
                                        Distribuidor
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-2 px-2 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="fabricanteChecked"
                                        name="fabricante"
                                        {{ isset($viewData['empresa']) && $viewData['empresa']['fabricante'] ? 'checked' : '' }}>
                                    <label class="form-check-label" for="fabricanteChecked">
                                        Fabricante
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row no-gutters border p-2 mt-2">
                    <div class="col-12">
                        <h4><u>Rubros</u></h4>
                        <select class="form-control my-2" style="max-width: fit-content;">
                            <option value="">Agregar Rubro</option>
                            @foreach ($viewData['categorias'] as $categoria)
                                <option value="{{ $categoria['id'] }}">{{ $categoria['nombre'] }}</option>
                            @endforeach
                        </select>
                        <ul>
                            @if (isset($viewData['empresa']) && $viewData['empresa'])
                                @foreach ($viewData['empresa']['categorias'] as $categoria)
                                    <li id="liCategoria{{$categoria['id']}}">
                                        <input hidden id="categoria{{$categoria['id']}}" name="categoria{{$categoria['id']}}" value="0" />
                                        <button type="button" class="btn btn-danger my-1 mr-1" onclick="$('#liCategoria{{$categoria['id']}}').addClass('d-none'); $('#categoria{{$categoria['id']}}').val('1');">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                        <b>{{ $categoria['nombre'] }}</b>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div id="productosServicios" class="row no-gutters border p-2 mt-2">
                    <div class="col-12">
                        <div class="d-flex">
                            <h4><u>Productos y Servicios</u></h4>
                            <button class="btn btn-success ml-2" type="button" onclick="addProductosServicios()">+
                                Producto o Servicio</button>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters border p-2 mt-2">
                    <div class="col-12">
                        <div class="d-flex">
                            <h4 class="mt-1"><u>Empresas Representadas</u></h4>
                            <button type="button" class="btn btn-success ml-2"
                                onclick="agregarEmpresaRepresentada()">+ Empresa</button>
                        </div>
                        <div id="listEmpresasRepresentadas">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 align-self-end mt-2">
                    <button class="btn btn-success float-right" type="submit">Guardar</button>
                    <div style="clear: both;"></div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        let ciudades = @json($viewData['ciudades']);

        $('#provincias').on('change', function() {
            let idProvincia = this.value;

            let ciudadesFiltradas = ciudades.filter(function(objeto) {
                return objeto.id_provincia == idProvincia;
            });

            $('#ciudades').empty();
            $('#ciudades').append(`<option value="">Seleccionar</option>`);

            let appendCiudad = '';
            ciudadesFiltradas.forEach(ciudad => {
                appendCiudad = appendCiudad + `<option value="` + ciudad.id + `">` + ciudad.descripcion +
                    `</option>`;
            });
            $('#ciudades').append(appendCiudad);
        });

        $('#paises').on('change', function() {
            if (this.value == '11') {
                $('#divInputProvincia').addClass('d-none');
                $('#divInputCiudad').addClass('d-none');
                $('#divSelectProvincia').removeClass('d-none');
                $('#divSelectCiudad').removeClass('d-none');
            } else {
                $('#divInputProvincia').removeClass('d-none');
                $('#divInputCiudad').removeClass('d-none');
                $('#divSelectProvincia').addClass('d-none');
                $('#divSelectCiudad').addClass('d-none');
            }
        });

        let rowsEmpRep = 0;

        function agregarEmpresaRepresentada() {

            let divEmpresa = `
                <div class="row mt-2" id="divEmpresaRepresentada` + rowsEmpRep + `">
                    <input hidden id="idEmpresaRepresentada` + rowsEmpRep + `" name="idEmpresaRepresentada[]" value="" />
                    <input hidden id="empresaRepresentadaStatus` + rowsEmpRep + `" name="empresaRepresentadaStatus[]" value="ok" />
                    <div class="col-12 col-md-4">
                        <label>Razon Social</label>
                        <input class="form-control" name="empresaRepresentadaNombre[]" />
                    </div>
                    
                    <div class="col-12 col-md-4">
                        <label for="">Descripcion</label>
                        <textarea class="form-control" name="empresaRepresentadaDescripcion[]" style="resize: none;"></textarea>
                    </div>

                    <div class="col-12 col-md-4">
                        <button type="button" 
                            class="btn btn-success" 
                            onclick="$('#empresaRepresentadaFile` + rowsEmpRep + `').click()">
                            Cargar Logo
                        </button>
                        <input hidden type="file" 
                            id="empresaRepresentadaFile` + rowsEmpRep + `" 
                            name="empresaRepresentadaFile[]" 
                            onchange="onChangeEmpresaRepresentadaFile(` + rowsEmpRep + `)"/>
                        <small id="empresaRepresentadaFileLogo` + rowsEmpRep +
                `" class="d-none">1 archivo a enviar</small>
                        <br/>
                        <button type="button" class="btn btn-danger mt-1" onclick="if (confirm('Esta a punto de eliminar esta empresa')) {$('#empresaRepresentadaStatus` +
                rowsEmpRep +
                `').val('deleted'); $('#divEmpresaRepresentada` + rowsEmpRep + `').addClass('d-none');}">Eliminar</button>
                    </div>
                </div>
            `;

            $('#listEmpresasRepresentadas').append(divEmpresa);
            rowsEmpRep += 1;
        }

        function onChangeEmpresaRepresentadaFile(row) {
            if ($('#empresaRepresentadaFile' + row).get(0).files.length === 0) {
                $('#empresaRepresentadaFileLogo' + row).addClass('d-none');
            } else {
                $('#empresaRepresentadaFileLogo' + row).removeClass('d-none');
            }
        }


        let rowProdServ = 0;

        function addProductosServicios() {
            let div = $('#productosServicios');

            let prodServ = `
                <div id="rowProdServ` + rowProdServ + `" class="col-12">
                    <div class="row no-gutters">
                        <input hidden id="productoServicioStatus` + rowProdServ +
                `" name="productoServicioStatus[]" />
                        <div class="col-12 col-md-4 px-2">
                            <label>Nombre Producto o Servicio</label>
                            <input class="form-control" name="producto_servicio_nombre[]" />
                        </div>
                        <div class="col-12 col-md-4 px-2">
                            <label>Descripcion</label>
                            <textarea class="form-control" style="resize: none;" name="producto_servicio_descripcion"></textarea>
                        </div>
                        <div class="col-12 col-md-4 px-2">
                            <button class="btn btn-success" type="button">Cargar Imagen</button><br/>
                            <button class="btn btn-danger mt-1" type="button" onclick="if (confirm('Esta a punto de eliminar este producto')) {$('#productoServicioStatus` +
                rowProdServ + `').val('deleted'); 
                            $('#rowProdServ` + rowProdServ + `').addClass('d-none');}">Eliminar</button>
                        </div>
                    </div>
                </div>
            `;

            div.append(prodServ);
            rowProdServ += 1;
        }
    </script>
    </script>
</x-app-layout>
