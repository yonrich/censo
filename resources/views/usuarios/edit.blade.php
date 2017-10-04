@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">            
            <div class="row">
            <div class="col-md-12">
            {!! Form::model($usuarios, ['route' => ['modificarUsuario',$usuarios->id]]) !!}
              <h3>Editar Usuario</h3> 
              <hr> 
            <div class="row well"> 
                    <div class="col-sm-4 col-md-4">
                         <div class="input-group"> 
                              {!! Form::Label('Nombre ', 'Nombre: ') !!}  
                              {!! Form::text('q', '', ['id' =>  'q', 'placeholder' =>  'Escribe tu Nombre']) !!}
                         </div>
                    </div>
             <div class="col-sm-0 col-md-0">
                           <div class="input-group">  
                                {!! Form::hidden('id_empl', '', ['id' =>  'id_empl']) !!}
                           </div>
                    </div>
              <div class="col-sm-4 col-md-4">
                    <div class="input-group">
                        {!! Form::Label('Correo', 'Correo:') !!}
                        {!! Form::email('correo',null,['placeholder'=>'Correo','class'=>'form-control','required'=>'required']) !!}
                    </div>
                </div> 
             </div>  
             <div class="row well"> 
                <div class="col-sm-4 col-md-4"> 
                    <div class="input-group"> 
                        {!! Form::Label('Password', 'Password*:') !!} <br>
                        {!! Form::password('password',null,['placeholder'=>'password','class'=>'form-control','required'=>'required']) !!}
                    </div> 
                </div> 
                <div class="col-sm-4 col-md-4">
                    <div class="input-group">
                        {!! Form::Label('Rol', 'Rol:') !!}
                        {!! Form::select('rol', $roles, null, ['class' => 'form-control']) !!}
                    </div>
                </div> 
            </div>
             
            <a class="btn btn-warning" href="{{ route('usuarios.index') }}"> Regresar</a>
           {!! Form::submit('Registrar Usuario',['class'=>'btn btn-primary']) !!} 
           {!! Form::close() !!} 
          </div>
          </div>
        </div>
    </div>
</div> 
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
      $('#id_empl').val(ui.item.numeroE);
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