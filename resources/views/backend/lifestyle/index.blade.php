@extends('backend.layouts.backend') 

@section('content')

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Crea un Lifestyle</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Dash</a></li>
                        <li>Crea una Lifestyle</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            @include('backend.layouts.partials.alerts.status')

            @include('backend.layouts.partials.alerts.errors')

            <div id="add-listing">

                <!-- Section -->
                <div class="add-listing-section">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-doc"></i> Crea un Lifestyle</h3>
                    </div>
                    <form action="{{ route('lifestyle.store') }}" method="post">
                        {{ csrf_field() }}
                        <!-- Title -->
                        <div class="row with-forms">
                            <div class="col-md-6">
                                <h5>Nombre del lifestyle <i class="tip" data-tip-content="Ejemplo: Restaurante, Parrillas, Hospedajes..."></i></h5>
                                <input class="search-field" type="text" name="name" placeholder="Nombre del lifestyle" required />
                            </div>
                        </div>

                        <button class="button preview">Crear y Guardar <i class="fa fa-arrow-circle-right"></i></button>
                        <!-- Cuando crea y guarda, la pagina debe volver a la donde esta. Es decir, que si crea una categoria, sigue estando en la misma pagina. En lo posible, hacer que no cargue nuevamente la pagina, sino que sea un proceso. -->
                    </form>

                </div>
                <!-- Section / End -->

                
            </div>

            
        </div>

        <!-- Recent Activity -->
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box with-icons margin-top-20">
                <h4>Categorias Creadas</h4>
                <ul>
                    @foreach($cLifestyle as $i => $lifestyle)
                        <li>
                            <i class="list-box-icon sl sl-icon-layers"></i> {{ $lifestyle['name'] }}
                            <div class="buttons-to-right" style="display: flex">

                                {{-- <a href="{{ route('lifestyle.destroy', $lifestyle['life_id']) }}" class="button gray">Borrar</a> --}}
                                <form class="frm-delete-lifestyle" action="{{ route('lifestyle.destroy', $lifestyle['life_id']) }}" method="post">
                                    <input class="button gray" name="_method" type="hidden" value="DELETE">
                                    <button class="button gray">Borrar</button>
                                    {{ csrf_field() }}
                                </form>
                                <a href="{{ route('lifestyle.edit', $lifestyle['life_id']) }}" class="button gray">Editar</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Copyrights -->
        <div class="col-md-12">
            <div class="copyrights">© 2018 Escapar.me. </div>
        </div>

    </div>

@endsection

@section('js')
    <script>
        $('.frm-delete-lifestyle').on('submit', function (e) {
            e.preventDefault();
            let $this = $(this);

            if(confirm("¿Estas seguro de eliminar el lifestyle?"))
            {
                $this.unbind('submit').submit();
            }   
        });
    </script>
@endsection