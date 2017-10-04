@extends('layouts.public')

@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-md-12">            
            <div class="row">
            <div class="col-md-12">
            {!! Form::model($vehiculo, ['route' => ['modificarVehiculo',$vehiculo->id]]) !!}
              <h3>Actualizar Vehiculo</h3> 
              <hr> 
              <div class="row well"> 
                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Vehiculo', 'Vehiculo:') !!}
                          {!! Form::text('vehiculo',null,['placeholder'=>'vehiculo','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div>


                  <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Marca', 'Marca:') !!}
                          {!! Form::select('marca', $marcas, null, ['placeholder'=>'Selecciona una Marca','class'=>'form-control','required'=>'required','id'=>'marca' ]) !!}
                      </div>
                  </div> 
                  <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                        {!! Form::Label('Submarca', 'Submarca:') !!}
                        {!! Form::select('submarca', $submarca, null, ['placeholder'=>'Selecciona una Submarca','class'=>'form-control','required'=>'required','id'=>'submarca' ]) !!}
                      </div>
                  </div>


               </div> 
               <div class="row well"> 
                  <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Modelo', 'Modelo*:') !!}
                          {!! Form::text('modelo',null,['placeholder'=>'modelo','class'=>'form-control','required'=>'required']) !!}
                      </div> 
                  </div>
                  <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Numero Serie', 'Número Serie:') !!}
                          {!! Form::text('serie',null,['placeholder'=>'numero serie','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div> 
                  <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                          {!! Form::Label('Numero Placas', 'Número de Placas:') !!}
                          {!! Form::text('placas',null,['placeholder'=>'numero placas','class'=>'form-control','required'=>'required']) !!}
                      </div>
                  </div> 
              </div>
              <div class="row well">
                    <div class="col-sm-4 col-md-4"> 
                      <div class="input-group"> 
                          {!! Form::Label('Número Seguro', 'Número Seguro:') !!}
                          {!! Form::text('seguro',null,['placeholder'=>'Número Seguro','class'=>'form-control','required'=>'required']) !!}
                      </div> 
                  </div>
                    <div class="col-sm-4 col-md-4"> 
                          <div class="input-group"> 
                              {!! Form::Label('Número Económico', 'Número Económico:') !!}
                              {!! Form::number('num_eco',null,['placeholder'=>'Número de Inventario','class'=>'form-control','required'=>'required']) !!}
                          </div> 
                      </div>
                  
                  <div class="col-sm-4 col-md-4">
                      <div class="input-group">
                        {!! Form::Label('Tipo', 'Tipo:') !!}
                            <select id="estatus" name="estatus" class="form-control">
                              <option value="">Seleccione una Opción</option>
                              <option value="Propio">Propio</option>
                              <option value="Arrendado">Arrendado</option>
                            </select>                      
                        </div>
                  </div> 
               </div>
                <div class="row well">
                    {!! Form::hidden('id',$vehiculo->id) !!}
                    <a class="btn btn-warning" href="{{ route('control-vehicular.index') }}"> Regresar</a>
                    {!! Form::submit('Confirmar Vehiculo',['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
                                
            </div>
        </div>
    </div>
</div> 
</div>
<script type="text/javascript">
  $('#marca').change(function(){
    var marca = $('#marca option:selected').text();
    console.log("marca: "+marca);

    $.get('/sub-marcas/'+marca,function(data,status){
      console.log(data);
        $('#submarca').empty();
        $('#submarca').append('<option value="0">Submarcas</option>');
        $.each( data, function( key, value ) {
          var option = "<option value='"+value.submarca+"'>"+value.submarca+"</option>";
          $('#submarca').append(option);
        });
    });
  });
</script>

@endsection

