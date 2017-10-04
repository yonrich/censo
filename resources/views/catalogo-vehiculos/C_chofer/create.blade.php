@extends('layouts.public')

@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-md-12">            
            <div class="row">
            <div class="col-md-12">
            {{ Form::open(array('route' => 'Chofer.store')) }} <!-- ruta -->
              <h3>Registrar Chofer</h3> 
              <hr> 
              <div class="row well"> 
                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Empleado', 'Empleado:') !!}
                           {!! Form::text('q', '', ['id' =>  'q', 'placeholder' =>  'Escribe el Nombre']) !!} 
                      </div>
                  </div>
                  <div class="row well"> 
                              <div class="col-md-12"> 
                                  <div class="input-group">  
                                    {!! Form::hidden('empleado', '', ['id' =>  'empleado']) !!}
                                  </div>
                              </div>
                  </div>
                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Puesto', 'Puesto:') !!}
                          {!! Form::select('puesto', $puestos, null, ['placeholder'=>'Seleccione un Puesto','class'=>'form-control','required'=>'required' ]) !!}
                      </div>
                  </div>                 
               </div> 

                <div class="row well">
                    <a class="btn btn-warning" href="{{ route('Chofer.index') }}"> Regresar</a>
                    {!! Form::submit('Registrar Chofer ',['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
                
            </div>
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
      $('#q').val(ui.item.nombre + " " + ui.item.Apaterno);
      $('#empleado').val(ui.item.numeroE);
    }
  });
   $('#q').data( "ui-autocomplete" )._renderItem = function( ul, item ){
      ul.attr('class','list-group');
      ul.attr('style','height:150px; width:100%; max-height: 155px; overflow-y:scroll; z-index:2; position: absolute;');
      var $a = $("<a href='#'  class='list-group-item' style='color:black;width:100%' size:10px'>");
        $a.attr('id', item.id);
        $a.append(item.nombre + " " + item.Apaterno);
        return $a.appendTo(ul);    
    };
});

</script> 
@endsection

