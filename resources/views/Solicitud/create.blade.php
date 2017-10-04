@extends('layouts.public')

@section('content')

<div class="container">
    <div class="row">
                     <div class="col-md-12">            
                        <div class="row">
                        <div class="col-md-12">
                        {!! Form::open(array('route' => 'solicitud.store')) !!}
                          <h4>Modulo para la Solicitud de Equipo de Computo</h4> 
                          <hr> 
                          <div class="row well" style="background-color:rgb(232, 232, 232);"> 
                              <div class="col-md-12"> 
                                  <div class="input-group"> 
                                   {!! Form::Label('nombre ', 'Nombre del Empleado:') !!}  
                                    {!! Form::text('q', '', ['id' =>  'q', 'placeholder' =>  'Ingresar Datos']) !!}

              
                                  </div>
                              </div>
                          </div>
                                 {!! Form::hidden('id_empl', '', ['id' =>  'id_empl']) !!}

                                            
                              </div>
                          </div>
                          <div class="row well" style="background-color:rgb(232, 232, 232);"> 
                              <div class="col-md-4"> 
                                  <div class="input-group"> 
                                      {!! Form::Label('tipo', 'Tipo de Equipo:') !!} 
                                        <select id="tipo" name="tipo" class="form-control">  
                                          <option value="">Seleccione una Opción</option> 
                                          <option value="Laptop">LAPTOP</option> 
                                          <option value="Escritorio">ESCRITORIO</option> 
                                          <option value="Workstation">WORKSTATION</option> 
                                          <option value="Servidor">SERVIDOR</option>                                   
                                        </select> 
                                  </div>
                              </div>
                          
                              <div class="col-md-4"> 
                                  <div class="input-group">
                                      {!! Form::Label('tipo ', 'Tipo de Procesador:') !!}
                                      {!! Form::text('procesador',null,['placeholder'=>'Tipo de Procesador','class'=>'form-control']) !!}
                                  </div>
                              </div> 
                           
                              <div class="col-md-4"> 
                                  <div class="input-group">
                                      {!! Form::Label('memoria', 'Memoria RAM:') !!} 
                                          <select id="memoria" name="memoria" class="form-control"> 
                                            <option value="">Seleccione una Opción</option> 
                                            <option value="4 bg">4 Gb</option> 
                                            <option value="8 bg">8 Gb</option> 
                                            <option value="12 bg">12 Gb</option> 
                                            <option value="16 bg">16 Gb</option>                                   
                                          </select> 
                                  </div>
                              </div>
                              <div class="col-md-4"> 
                                  <div class="input-group">
                                      {!! Form::Label('DD', 'Disco Duro:') !!} 
                                        <select id="DD" name="DD" class="form-control"> 
                                          <option value="">Seleccione una Opción</option> 
                                          <option value="500G">500 Gb</option> 
                                          <option value="1 Tera">1 Tb </option> 
                                        </select> 
                                  </div>
                              </div>                              
                              <div class="col-md-4"> 
                                  <div class="input-group">
                                      {!! Form::Label('monitor', 'Monitor:') !!} 
                                        <select id="monitor" name="monitor" class="form-control"> 
                                          <option value="">Seleccione una Opción</option> 
                                          <option value="15">15 Pulgadas</option> 
                                          <option value="17">17 Pulgadas</option> 
                                          <option value="19">19 Pulgadas</option> 
                                          <option value="20">20 Pulgadas</option>  
                                          <option value="21">21 Pulgadas</option>                                  
                                        </select>
                                  </div>
                              </div>


                          </div>
                           
                              
                          
                          <div class="row well" style="background-color:rgb(232, 232, 232);">  
                              <div class="col-md-12"> 
                                  <div class="input-group">
                                      {!! Form::Label('Observaciones', 'Observaciones:') !!}
                                      {!! Form::textarea('obs',null,['placeholder'=>'Ingresar comentarios si las especificaciones no encuentran en los campos anteriores','class'=>'form-control']) !!}
                                  </div>
                              </div> 
                            </div> 
                         
                              <div class="row well"> 
                                  <a class="btn btn-info" href="{{ route('solicitud.index') }}"> Regresar</a> 
                                  {!! Form::submit('Crear Solicitud',['class'=>'btn btn-success']) !!} 
                              </div> 
                            
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
</div>
{!!Html::script('//code.jquery.com/ui/1.11.4/jquery-ui.js')!!}
<script>
$(function()
{
   $( "#q" ).autocomplete({
    source: "search/autocomplete",
    minLength: 3,
    select: function(event, ui) {
      event.preventDefault();
      console.log(ui);
      $('#q').val(ui.item.nombre + " " + ui.item.Apaterno + " " + ui.item.Amaterno);
      $('#id_empl').val(ui.item.numeroE);
    }
  });
   $('#q').data( "ui-autocomplete" )._renderItem = function( ul, item ){
      ul.attr('class','list-group');
      ul.attr('style','height:150px; width:100%; max-height: 155px; overflow-y:scroll; z-index:2; position: absolute;');
      var $a = $("<a href='#'  class='list-group-item' style='color:black;width:100%' size:10px'>");
        $a.attr('id', item.id);
        $a.append(item.nombre + " " + item.Apaterno + " " + item.Amaterno);
        return $a.appendTo(ul);    
    };
});

</script> 
@endsection
