@extends('backend.layouts.backend')

@section('content')

    <!-- Titlebar -->
		<div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2>Crea un Lugar</h2>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li>Add a Place</li>
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

                    <form action="{{ route('lugar.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <!-- Section -->
                        <div class="add-listing-section">

                                <!-- Headline -->
                                <div class="add-listing-headline">
                                    <h3><i class="sl sl-icon-doc"></i> Lugar</h3>
                                </div>

                                <!-- Title -->
                                <div class="row with-forms">
                                    <div class="col-md-12">
                                        <h5>Nombre del Lugar <i class="tip" data-tip-content="Dale un nombre al lugar. Aparecera así en la review."></i></h5>
                                        <input class="search-field" type="text" name="name" required/>
                                    </div>
                                </div>

                                <!-- Row -->
                                <div class="row with-forms">

                                    <!-- Status -->
                                    <div class="col-md-4">
                                        <h5>País</h5>
                                        <select class="chosen-select-no-single" name="country" required>
                                            <option label="blank">Elige un País</option>
                                            @foreach(App\Place::$country as $i => $place)
                                                <option value="{{ $i }}">{{ $place }}</option>
                                            @endforeach
                                            <!-- para agregar paises, por el momento no necesito un abm o scrud, simplemente con copiar la etiqueta option el value, agregaremos los paises que necesitemos. -->
                                        </select>
                                    </div>

                                    <!-- Type -->
                                    <div class="col-md-4">
                                        <h5>Provincia <i class="tip" data-tip-content="A que provincia corresponde el lugar."></i></h5>
                                        <input type="text" placeholder="Ej: Cordoba, Buenos Aires" name="province" required>
                                    </div>

                                    <!-- Type -->
                                    <div class="col-md-4">
                                        <h5>Ciudad<i class="tip" data-tip-content="Ciudad a la que hace referencia el lugar"></i></h5>
                                        <input type="text" placeholder="Ej: San Isidro, San Fernando," name="city" required>
                                    </div>

                                    <!--IMPORTANTE -- Las opciones de provincia y ciudad, no son select, se iran cargando a medida que se vayan creando lo lugares -->
                                </div>
                                <!-- Row / End -->

                        </div>
                        <!-- Section / End -->

                        <!-- Section -->
                        <div class="add-listing-section margin-top-45">

                            <!-- Headline -->
                            <div class="add-listing-headline">
                                <h3><i class="sl sl-icon-location"></i> Google Maps</h3>
                            </div>

                            <div class="submit-section">

                                <!-- Row -->
                                <div class="row with-forms">


                                    <!-- City -->
                                    <div class="col-md-6">
                                        <h5>Latitud</h5>
                                        <input type="text" name="latitud" placeholder="Latitud" required>
                                    </div>

                                    <!-- Zip-Code -->
                                    <div class="col-md-6">
                                        <h5>Longitud</h5>
                                        <input type="text" name="longitud" placeholder="Longitud" required>
                                    </div>

                                </div>
                                <!-- Row / End -->
                                <p>Se debera proporcionar los numeros de latitud y longitud para que el lugar se ubique en el mapa.</p>

                            </div>
                        </div>
                        <!-- Section / End -->

                        <!-- Section -->
                        <div class="add-listing-section margin-top-45">

                            <!-- Headline -->
                            <div class="add-listing-headline">
                                <h3><i class="sl sl-icon-location"></i> Lifestyles</h3>
                            </div>

                            <div class="submit-section">

                                <!-- Row -->
                                <div class="row with-forms">


                                    <div class="col-md-12">



                                        <!-- Checkboxes -->
                                        <h5 class=" margin-bottom-10">LifeStyles</h5>
                                        <div class="checkboxes in-row margin-bottom-20">

                                            @foreach($cLifestyle as $i => $lifestyle)

                                                <input id="check-{{ strtolower($i) }}" type="checkbox" name="lifestyle[]" value="{{ $lifestyle['life_id'] }}">
                                                <label for="check-{{ strtolower($i) }}">{{ $lifestyle['name'] }}</label>
                                            @endforeach

                                        </div>
                                        <!-- Checkboxes / End -->
                                        <!-- Traer en este select, los lifestyles creados en el abm o scrud de add-lifestyles.html -->
                                    </div>

                                    <!-- Zip-Code -->
                                    <div class="col-md-12">
                                        <h5>Para que Sirve?</h5>
                                        <small>Los lifestyles son los estilos de vida que vincularemos con los lugares geograficos que iremos creando. De esta manera, los lifestyles seran los que apareceran en el buscador del Home.</small>
                                    </div>

                                </div>
                                <!-- Row / End -->


                            </div>
                        </div>
                        <!-- Section / End -->


                        <!-- Section -->
                        <div class="add-listing-section margin-top-45">

                            <!-- Headline -->
                            <div class="add-listing-headline" style="display: flex">
                                <h3><i class="sl sl-icon-picture"></i> Galeria de Fotos</h3>
                                <!--<button type="button" style="margin-left: 5px" class="button btn-add-image">Agregar</button>-->
                            </div>
                            <small>Max: 900px x 600px</small>
														<div class="  pricing-list-item pattern  ui-sortable-handle">
															<div class="">
																<table id="pricing-list-container">
																	<tbody class="ui-sortable  submit-section-image">
																		<tr class=" pattern col-md-12 ui-sortable-handle container-image">
																			<td>
																				<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
																				<div class="fm-input pricing-name photoUpload">
																					<div class="browse-wrap"></div>
																					<input type="file" class="image upload" name="image[]">
																					<span class="upload-path">
																						<i class="fa fa-upload"></i> Seleccionar una Foto
																					</span>
																				</div>
																			<div class="fm-close"><a class="delete btn-delete-image" href="#"><i class="fa fa-remove"></i></a></div>
																			</td>
																		</tr>
																	</tbody>
																</table>
																<a href="#" class="button add-pricing-list-item  btn-add-image">Agregar Foto</a>
															</div>
														</div>
                            <!--<div class="submit-section-image">
                                {{-- <form action="/file-upload" class="dropzone" ></form> --}}
                                <div class="container-image" style="display: flex; justify-content: center; align-items: center; margin-bottom: 20px;">
                                    <input type="file" style="width: auto; margin: 0;" class="image" name="image[]">
                                    <button type="button" class="button gray btn-delete-image" style="margin-left: 10px;">Borrar</button>
                                </div>
                            </div>-->



                        </div>
                        <!-- Section / End -->


                        <!-- Section -->
                        <div class="add-listing-section margin-top-45">

                            <!-- Headline -->
                            <div class="add-listing-headline">
                                <h3><i class="sl sl-icon-docs"></i> Descripcion del Lugar</h3>
                                <small>Debe contener el switch para editar en HTML.</small>
                            </div>

                            <!-- Description -->
                            <div class="form">
                                <h5>Describe el lugar.</h5>
                                <textarea class="WYSIWYG" id="summary-ckeditor" name="description" cols="40" rows="3" id="summary" spellcheck="true"></textarea>
                            </div>

                            <!-- Row -->
                            <div class="row with-forms">
                                <div class="col-md-6">
                                    <h5>Valoracion</span></h5>
                                    <input type="number" name="valoration" step="0.1" placeholder="Valoración, ingresa entre 1 y 5">
                                    {{-- <select class="chosen-select-no-single" name="valoration" required >
                                        <option label="blank">Valor del Lugar</option>
                                        @foreach(App\Place::$validation as $i => $validation):
                                            <option value="{{ ++$i }}">{{ $validation }}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                                <div class="col-md-6">
                                    <h5>Calificacion en una Palabra</span></h5>
                                    <input type="text" name="calification" placeholder="Calificación" required>
                                </div>
                            </div>
                        </div>
                        <button class="button preview">Guardar y Publicar <i class="fa fa-arrow-circle-right"></i></button>

                    </form>

                </div>
            </div>

            <!-- Copyrights -->
            <div class="col-md-12">
                <div class="copyrights">© 2018 Escapar.me. </div>
            </div>

        </div>

@endsection

@section('js')

    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
        $('.container-image:first-child').find('button').css('visibility', 'hidden');
        $('.btn-add-image').on('click', function () {

            var $submit_section = $('.submit-section-image');
            var $container_image = $submit_section.find('.container-image');
            var $first = $submit_section.find('.container-image:first-child');

            $first
                .clone(true)
                .appendTo($submit_section)
                .find('.image')
                .val("")
                .attr("name", "image_new[]")
                .siblings()
                .css('visibility', 'visible');
						console.log($first);
        })

        $(".submit-section-image").on('click', ".container-image .btn-delete-image", function(){
            var $this = $(this);

            if(confirm("¿Quieres eliminar la imagen?"))
            {
                $this.parent('.container-image').remove();
            }
        })
    </script>
		<script type="text/javascript">
				$('input[type="file"]').change(function(){
					$(this).next('.upload-path').html('<i class="fa fa-upload"></i>   '+   this.files[0].name+'');
				});
		</script>
@endsection