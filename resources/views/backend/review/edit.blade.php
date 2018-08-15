@extends('backend.layouts.backend')
@section('content')
	 <div id="titlebar">
	    <div class="row">
	        <div class="col-md-12">
	            <h2>Editar una Review</h2>
	            <nav id="breadcrumbs">
	                <ul>
	                    <li><a href="#">Home</a></li>
	                    <li><a href="#">Dashboard</a></li>
	                    <li>Editar una Review</li>
	                </ul>
	            </nav>
	        </div>
	    </div>
	</div>
	<div class="row">
	    <div class="col-lg-12">
	        @include('backend.layouts.partials.alerts.status')
	        <div id="add-listing">
	            <form action="{{ route('review.update', $oReview['revi_id']) }}" method="POST" enctype="multipart/form-data">
	                {{ csrf_field() }}
	                {{ method_field('PUT') }}
	                <div class="add-listing-section">
	                    <div class="add-listing-headline">
	                        <h3><i class="sl sl-icon-doc"></i> Lugar</h3>
	                    </div>
	                    <div class="row with-forms">
	                        <div class="col-md-12">
	                            <h5>A que lugar Pertenece la Review <i class="tip" data-tip-content="Dale un nombre al lugar. Aparecera así en la review."></i></h5>
	                            <select class="chosen-select" name="plac_id" required>
	                                <option label="blank">Elige un lugar</option>
	                                @foreach($cPlaces as $place):
	                                    <option value={{ $place['plac_id'] }} @if($oReview['plac_id'] == $place['plac_id']): selected @endif>{{ $place['name'] }}</option>
	                                @endforeach
	                            </select>
	                        </div>
	                    </div>
	                    <div class="row with-forms">
	                        <div class="col-md-12">
	                            <h5>Nombre de la Review o Lugar <i class="tip" data-tip-content="Es el nombre del lugar al que se visito."></i></h5>
	                            <input type="text" placeholder="Nombre del Restaurante, Plaza, Museo... " name="name" value="{{ $oReview['name'] }}" required>
	                        </div>
	                    </div>
	                    <div class="row with-forms">
	                        <div class="col-md-4">
	                            <h5>Categoria</h5>
	                            <select class="chosen-select" name="cate_id" required>
	                                <option label="blank">Que tipo de Lugar es?</option>
	                                @foreach($cCategories as $category):
	                                    <option value="{{ $category['cate_id'] }}" @if($oReview['cate_id'] == $category['cate_id']): selected @endif>{{ $category['name'] }}</option>
	                                @endforeach
	                            </select>
	                        </div>
	                        <div class="col-md-4">
	                            <h5>Valoracion <i class="tip" data-tip-content="Que te parecio el lugar, de 1 a 5"></i></h5>
	                            <input type="number" name="valoration" step="0.1" placeholder="Valoración, ingresa entre 1 y 5" value="{{ $oReview['valoration'] }}">
	                        </div>
	                        <div class="col-md-4">
	                            <h5>Calificacion en una Palabra<i class="tip" data-tip-content="Describe en dos palabras, que te parecio el lugar."></i></h5>
	                            <input type="text" placeholder="Ej: Excelente, Volveria de nuevo..." name="calification" value="{{ $oReview['calification'] }}">
	                        </div>
	                    </div>
	                </div>
	                <div class="add-listing-section margin-top-45">
	                    <div class="add-listing-headline">
	                        <h3><i class="sl sl-icon-location"></i> Google Maps</h3>
	                    </div>
	                    <div class="submit-section">
	                        <div class="row with-forms">
	                            <div class="col-md-6">
	                                <h5>Latitud</h5>
	                                <input type="text" name="latitud" placeholder="Latitud" value="{{ $oReview['latitud'] }}">
	                            </div>
	                            <div class="col-md-6">
	                                <h5>Longitud</h5>
	                                <input type="text" name="longitud" placeholder="Longitud" value="{{ $oReview['longitud'] }}">
	                            </div>
	                        </div>
	                        <p>Se debera proporcionar los numeros de latitud y longitud para que el lugar se ubique en el mapa.</p>
	                    </div>
	                </div>
	                <div class="add-listing-section margin-top-45">
	                    <div class="add-listing-headline">
	                        <h3><i class="sl sl-icon-location"></i> Lifestyles</h3>
	                    </div>
	                    <div class="submit-section">
	                        <div class="row with-forms">
	                            <div class="col-md-12">
	                                <h5 class=" margin-bottom-10">Los lifestyles tambien van asignados a las reviews. </h5>
	                                <div class="checkboxes in-row margin-bottom-20">
	                                    @foreach($cLifestyle as $i => $lifestyle):
	                                        <input id="check-{{ strtolower($i) }}" type="checkbox" name="lifestyle[]" value="{{ $lifestyle['life_id'] }}" @if(in_array($lifestyle['life_id'], $aReviewLifestyle)): checked @endif>
	                                        <label for="check-{{ strtolower($i) }}">{{ $lifestyle['name'] }}</label>
	                                    @endforeach
	                                </div>
	                            </div>
	                            <div class="col-md-12">
	                                <h5>Para que Sirve?</h5>
	                                <small>Los lifestyles tambien van asigandas a las reviews. Generalmente, los lugares y las reviews comparten los mismo lifetyles, pero en los filtros, el uusuario puede filtrar por lifetyle y lugar.</small>
	                            </div>
	                        </div>
	                    </div>
	                </div>
									<div class="add-listing-section margin-top-45">
	                    <div class="add-listing-headline" style="display: flex">
	                        <h3><i class="sl sl-icon-picture"></i> Galeria de Fotos</h3>
	                    </div>
	                    <small>Max: 900px x 600px</small>
											<div class="pricing-list-item pattern  ui-sortable-handle">
												<table id="pricing-list-container">
												<tbody class="ui-sortable  submit-section-image">
														@if($cImages->count()):
																@foreach($cImages as $key => $image):
																 @if ($key == 0)
																	<tr class="container-image">
																			<td  class="image" style="display: flex;width: 400px;justify-content: center;align-items: center;margin-bottom: 20px;">
																				{{--<div class="image" style="display: flex;width: 400px;justify-content: center;align-items: center;margin-bottom: 20px;">--}}
																					<img class="img-clossets" width="100" height="100" src="{{ asset($image['source']) }}" alt="">
																					<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
																					<div class="fm-input pricing-name photoUpload">
																						<div class="browse-wrap"></div>
																						<input type="file" class=" upload" name="image[{{ $image['imag_id'] }}]" />
																						<span class="upload-path"><i class="fa fa-upload"></i> Seleccionar una Foto</span>
																					</div>
																					<div class="fm-close">
																						<a data-id={{ $image['imag_id'] }}  class="delete btn-delete-edit-image btn-delete-image" >
																							<i class="fa fa-remove"></i>
																						</a>
																					</div>
																				{{--</div>--}}
																		</td>
																	</tr>
																	@else
																		<tr class="container-image">
																				<td  class="image" style="display: flex;width: 400px;justify-content: center;align-items: center;margin-bottom: 20px;">
																					{{--<div class="image" style="display: flex;width: 400px;justify-content: center;align-items: center;margin-bottom: 20px;">--}}
																						<img class="img-clossets" width="100" height="100" src="{{ asset($image['source']) }}" alt="">
																						<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
																						<div class="fm-input pricing-name photoUpload">
																							<div class="browse-wrap"></div>
																							<input type="file" class=" upload" name="image_new[{{ $image['imag_id'] }}]" />
																							<span class="upload-path"><i class="fa fa-upload"></i> Seleccionar una Foto</span>
																						</div>
																						<div class="fm-close">
																							<a data-id={{ $image['imag_id'] }}  class="fa fa-remove delete btn-delete-edit-image btn-delete-image" >
																								<!--<i class="fa fa-remove"></i>-->
																							</a>
																						</div>
																					{{--</div>--}}
																			</td>
																		</tr>
																	@endif
																@endforeach
														@else
														<tr class="container-image">
																<td  class="image" style="display: flex;width: 400px;justify-content: center;align-items: center;margin-bottom: 20px;">
																	{{--<div class="image" style="display: flex;width: 400px;justify-content: center;align-items: center;margin-bottom: 20px;">--}}
																		<img class="img-clossets" width="100" height="100" src="" alt="">
																		<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
																		<div class="fm-input pricing-name photoUpload">
																			<div class="browse-wrap"></div>
																			<input type="file" class=" upload" name="image[]" />
																			<span class="upload-path"><i class="fa fa-upload"></i> Seleccionar una Foto</span>
																		</div>
																		<div class="fm-close">
																			<a data-id=""  class="delete btn-delete-edit-image btn-delete-image" >
																				<i class="fa fa-remove"></i>
																			</a>
																		</div>
																	{{--</div>--}}
															</td>
														</tr>
														@endif
												</tbody>
											</table>
											</div>
											<a class="button add-pricing-list-item  btn-add-image">Agregar Foto</a>
	                </div>
	                <div class="add-listing-section margin-top-45">
	                    <div class="add-listing-headline">
	                        <h3><i class="sl sl-icon-docs"></i> Descripcion del Lugar</h3>
	                    </div>
	                    <div class="form">
	                        <h5>Describe el lugar.</h5>
	                        <textarea class="WYSIWYG" id="summary-ckeditor" name="description" cols="40" rows="3" id="summary" spellcheck="true">{!! $oReview['description'] !!}</textarea>
	                    </div>
	                </div>
	                <button class="button preview">Guardar y Publicar <i class="fa fa-arrow-circle-right"></i></button>
	            </form>
	        </div>
	    </div>
	    <div class="col-md-12">
	        <div class="copyrights">© 2018 Escapar.me. </div>
	    </div>
	</div>
@endsection
@section('js')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>
		<script>
						$('.container-image:first-child').find('button').css('visibility', 'hidden');
						$('.btn-add-image').on('click', function () {
								var $submit_section = $('.submit-section-image'),
										$container_image = $submit_section.find('.container-image'),
										$first = $submit_section.find('.container-image:first-child');
								$first
										.clone(true)
										.appendTo($submit_section)
										.find('.image')
										.val("")
										.parent()
										.find('img')
										.css('visibility', 'hidden')
										.parent()
										.css('visibility', 'visible')
										.find('input')
										.attr("name", "image_new[]")
										.find('a')
										.attr('data-id', '')
										//.siblings()
										//.css('visibility', 'visible');
						})
						$(".submit-section-image").on('click', ".container-image .btn-delete-image", function(){
								var $this = $(this);
								var r = confirm("¿Quieres eliminar la imagen?");
								if( r= true)
								{
										var id = $(this).attr('data-id');
										if (id) {
											$.ajax({
												url: '/admin/image/'+id,
												type: 'DELETE',
												headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
												contentType: 'json',
												success: function(image){
													if (image) {
														console.log('Eliminacion realizada',image);
													}
												}, error: function(xhr, status){
													console.log('status error',JSON.stringify(status));
												}, complete: function(xhr, status){
													console.log('status complete',JSON.stringify(status));
													//window.location.pathname = '/admin/review';
												}
											})
										}
										/*let $container_image = $this
												.parent('.container-image');
										let $input_image = $container_image
												.find('.image');
												console.log($input_image
												.attr('name')
												.match(/\d/g));
										let revi_id = $input_image
												.attr('name')
												.match(/\d/g);
										if(revi_id === null)
										{
												$container_image.remove();
												return false;
										}
										let value = revi_id
												.join('');
										$input_image
												.attr('name', `image_delete[${value}]`);
										$container_image
												.find('a, button, img').css('display', 'none');
										$input_image.attr('type', 'hidden');*/
								}
						})
				</script>
				<script type="text/javascript">
						$('input[type="file"]').change(function(){
							if (this.files && this.files[0]) {
						    var reader = new FileReader();
								var img = $(this).closest("div").siblings()[0];
						    reader.onload = function(e) {
									$(img).attr('src', e.target.result);
									$(img).css('visibility', 'visible');
								}
						    reader.readAsDataURL(this.files[0]);
						  }
							$(this).next('.upload-path').html('<i class="fa fa-upload"></i>   '+   this.files[0].name+'');
						});
				</script>
@endsection