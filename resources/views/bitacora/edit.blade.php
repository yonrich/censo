@extends('layouts.public')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">            
            <div class="row">
            <div class="col-md-12">
            {!! Form::model($bitacora, ['route' => ['bitacoraEntrada',$bitacora->id]]) !!}
            <h3>Checar Entrada</h3> 
            <hr> 
             <div class="row well"> 
                <div class="col-sm-4 col-md-3">
                      <div class="input-group">
                            {!! Form::Label('Fecha y Hora Entrada', 'Fecha y Hora Entrada*:') !!}
                            <input type="datetime-local" name="Hentrada" id="Hentrada">
                            </div>
                        </div>
                    </div>
                <div class="col-sm-4 col-md-4">
                    <div class="input-group">
                        {!! Form::Label('Homeotraje Final', 'Homeotraje Final:') !!}
                        {!! Form::text('homeotrajeFinal',null,['placeholder'=>'homeotraje','class'=>'form-control','required'=>'required']) !!}
                    </div>
                </div> 
            </div>
             <div class="row well">   
                          <div class="col-sm-12">
                    {!! Form::Label('obs', 'Observaciones:') !!}
                    {!! Form::textarea('obs2',null,['placeholder'=>'Observaciones','class'=>'form-control','required'=>'required']) !!}
                  </div>
             </div>



            {!! Form::hidden('id',$bitacora->id) !!}
            <a class="btn btn-warning" href="{{ route('bitacora.index') }}"> Regresar</a>
            {!! Form::submit('Confirmar Entrada',['class'=>'btn btn-primary']) !!} 
            {!! Form::close() !!} 
          </div>
          </div>
        </div>
    </div>
</div> 
</div>
<script type="text/javascript">
            $(function () {
                $('#Hentrada').datetimepicker({
                    locale: 'ES'
                });
            });
        </script>
@endsection

