@extends('layouts.public')

@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-md-12">            
            
            
            {{ Form::open(array('route' => 'estudios.store')) }} 
            <h4><b>Modulo para Identificación de Daños</b></h4> 
            <hr>
                    
                    
                    <div class="row well" style="background-color:rgb(252, 252, 252);"> 
                            
                            <div class="col-sm-4 col-md-2">
                                <div class="input-group">
                                    {!! Form::model($censo, ['route' => ['censos.edit',$censo->id]]) !!} 
                                    {!! Form::Label('id', 'No. Registro:') !!}
                                    {!! Form::text('id',null,['placeholder'=>'id','class'=>'form-control','required'=>'required', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-2">
                                <div class="input-group">
                                    {!! Form::model($censo, ['route' => ['censos.edit',$censo->id]]) !!} 
                                    {!! Form::Label('folio', 'Folio SEDATU:') !!}
                                    {!! Form::text('folio',null,['placeholder'=>'folio','class'=>'form-control','required'=>'required', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-2">
                                <div class="input-group">
                                    {!! Form::model($censo, ['route' => ['censos.edit',$censo->id]]) !!} 
                                    {!! Form::Label('nombre', 'Nombre:') !!}
                                    {!! Form::text('nombre',null,['placeholder'=>'nombre','class'=>'form-control','required'=>'required', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-3">
                                <div class="input-group">
                                    {!! Form::model($censo, ['route' => ['censos.edit',$censo->id]]) !!} 
                                    {!! Form::Label('apellido_paterno', 'Apellido Paterno:') !!}
                                    {!! Form::text('apellido_paterno',null,['placeholder'=>'apellido_paterno','class'=>'form-control','required'=>'required', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-3">
                                <div class="input-group">
                                    {!! Form::model($censo, ['route' => ['censos.edit',$censo->id]]) !!} 
                                    {!! Form::Label('apellido_materno', 'Apellido Materno:') !!}
                                    {!! Form::text('apellido_materno',null,['placeholder'=>'apellido_materno','class'=>'form-control','required'=>'required', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                    </div>


                            <!--<div class="col-sm-0 col-md-0">
                           <div class="input-group">  
                                
                                {!! Form::text('censo_id',$censo->id,['placeholder'=>'Ingresar Folio','class'=>'form-control','required'=>'required']) !!}
                                {!! Form::hidden('censo_id', $censo->id, ['id' =>  'censo_id']) !!}
                           </div>
                            </div>-->

                    <center><font size="4" face="roman" color="#35001C">Datos de la Vivienda</font></center>
                    <div class="row well" style="background-color:rgb(252, 252, 252);">                             
                                                     
                            
                            <div class="col-sm-4 col-md-4">
                                <div class="input-group"> 
                                    {!! Form::Label('Folio', 'Folio Domicilio:') !!}
                                    {!! Form::text('foliodom',null,['placeholder'=>'Ingresar Folio','class'=>'form-control','required'=>'required']) !!}
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-4"> 
                                <div class="input-group"> 
                                    {!! Form::Label('coordenada1', 'Latitud:') !!}
                                    {!! Form::text('lat',null,['placeholder'=>'Valor Decimal ....','class'=>'form-control','required'=>'required']) !!}
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-4"> 
                                <div class="input-group"> 
                                    {!! Form::Label('coordenada2', 'Longitud:') !!}
                                    {!! Form::text('lng',null,['placeholder'=>'Valor Decimal ....','class'=>'form-control','required'=>'required']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-2">
                                <div class="input-group">
                                    {!! Form::Label('Plantas', 'Plantas:') !!}
                                    {!! Form::text('plantas',null,['placeholder'=>'Número','class'=>'form-control','required'=>'required']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-2">
                                <div class="input-group">
                                    {!! Form::Label('recamaras', 'Recámaras:') !!}
                                    {!! Form::text('recamaras',null,['placeholder'=>'Número','class'=>'form-control','required'=>'required']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-2">
                                <div class="input-group">
                                    {!! Form::Label('banos', 'Baños:') !!}
                                    {!! Form::text('no_banos',null,['placeholder'=>'Número','class'=>'form-control','required'=>'required']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-2">
                                <div class="input-group">
                                    {!! Form::Label('cocina', 'Cocina:') !!}
                                    {!! Form::text('cocina',null,['placeholder'=>'Número','class'=>'form-control','required'=>'required']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-2">
                                <div class="input-group">
                                    {!! Form::Label('sala', 'Sala:') !!}
                                    {!! Form::text('sala',null,['placeholder'=>'Número','class'=>'form-control','required'=>'required']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-2">
                                <div class="input-group">
                                    {!! Form::Label('comedor', 'Comedor:') !!}
                                    {!! Form::text('comedor',null,['placeholder'=>'Número','class'=>'form-control','required'=>'required']) !!}
                                </div>
                            </div>
                         
                            <div class="col-sm-4 col-md-2"> 
                                <div class="form-group"> 
                                    {!! Form::Label('muro', 'Tipo de Muro:') !!}
                                    {!! Form::select('muro', ['CONCRETO' => 'CONCRETO', 'ADOBE' => 'ADOBE','MADERA'=>'MADERA'], null, ['placeholder' => 'Seleccione ....','class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-2"> 
                                <div class="form-group"> 
                                    {!! Form::Label('techo', 'Tipo de Techo:') !!}
                                    {!! Form::select('techo', ['CONCRETO' => 'CONCRETO', 'LAMINAS' => 'LAMINAS','TEJA'=>'TEJA'], null, ['placeholder' => 'Seleccione ....','class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-2"> 
                                <div class="form-group"> 
                                    {!! Form::Label('piso', 'Tipo de Piso:') !!}
                                    {!! Form::select('piso', ['FIRME' => 'FIRME', 'TIERRA' => 'TIERRA'], null, ['placeholder' => 'Seleccione ....','class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-2"> 
                                <div class="form-group"> 
                                    {!! Form::Label('agua', 'Agua Potable:') !!}
                                    {!! Form::select('agua', ['ENTUBADA' => 'ENTUBADA', 'POSO' => 'POSO'], null, ['placeholder' => 'Seleccione ....','class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-2"> 
                                <div class="form-group"> 
                                    {!! Form::Label('bano', 'Baño:') !!}
                                    {!! Form::select('bano', ['RETRETE' => 'RETRETE', 'LETRINA' => 'LETRINA'], null, ['placeholder' => 'Seleccione ....','class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-2"> 
                                <div class="form-group"> 
                                    {!! Form::Label('drenaje', 'Drenaje:') !!}
                                    {!! Form::select('drenaje', ['SI' => 'SI', 'NO' => 'NO'], null, ['placeholder' => 'Seleccione ....','class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-2"> 
                                <div class="form-group"> 
                                    {!! Form::Label('energia', 'Energia Electrica:') !!}
                                    {!! Form::select('energia', ['SI' => 'SI', 'NO' => 'NO'], null, ['placeholder' => 'Seleccione ....','class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-2">
                                <div class="input-group">
                                    {!! Form::Label('habitantes', 'Número de Habitantes:') !!}
                                    {!! Form::text('habitantes',null,['placeholder'=>'Número de Habitantes','class'=>'form-control','required'=>'required']) !!}
                                </div>
                            </div>                                                         
                                                     
                         
                    </div>         
                
                    <center><font size="4" face="roman" color="#35001C">Tipo de Afectación en Vivienda y Clasificación</font></center>
                    <div class="row well" style="background-color:rgb(252, 252, 252);"> 
                            
                            <div class="col-sm-4 col-md-3"> 
                                <div class="form-group"> 
                                    {!! Form::Label('clasificacion', 'Clasificación Actual:') !!}
                                    {!! Form::select('clasificacion', ['PERDIDA TOTAL' => 'PERDIDA TOTAL', 'DAÑO PARCIAL' => 'DAÑO PARCIAL', 'DAÑO MENOR' => 'DAÑO MENOR'], null, ['placeholder' => 'Seleccione ....','class'=>'form-control']) !!}
                                </div>
                            </div>
                            
                            <div class="col-sm-4 col-md-3"> 
                                <div class="input-group">
                                <h6><b>Daño Total (Estructural)</b></h6> 
                                    
                                    {!! Form::checkbox('columnas','1',false,['id'=>'columnas']) !!} 
                                    {!! Form::label('Columnas','-Columnas', array('class'=>'control-label'))!!} <br>

                                    {!! Form::checkbox('trabes','1',false,['id'=>'trabes']) !!} 
                                    {!! Form::label('Trabes','-Trabes', array('class'=>'control-label'))!!} <br>
                                    
                                    {!! Form::checkbox('muros','1',false,['id'=>'muros']) !!}
                                    {!! Form::label('Muros','-Muros', array('class'=>'control-label'))!!} <br>
                                    
                                    {!! Form::checkbox('techumbres','1',false,['id'=>'techumbres']) !!}
                                    {!! Form::label('Techumbres','-Techumbres', array('class'=>'control-label'))!!} <br>
                                    
                                </div> 
                            </div> 

                            <div class="col-sm-4 col-md-3"> 
                                <div class="input-group">
                                <h6><b>Daño Parcial</b></h6>

                                    {!! Form::checkbox('puertas','1',false,['id'=>'puertas']) !!} 
                                    {!! Form::label('Puertas','-Puertas', array('class'=>'control-label'))!!} <br>
                                    
                                    {!! Form::checkbox('pisos','1',false,['id'=>'pisos']) !!}
                                    {!! Form::label('Pisos','Pisos', array('class'=>'control-label'))!!} <br>
                                   
                                    {!! Form::checkbox('techumbresa','1',false,['id'=>'techumbresa']) !!}
                                    {!! Form::label('Techumbres','-Techumbres', array('class'=>'control-label'))!!} <br>
                                   
                                    {!! Form::checkbox('murosa','1',false,['id'=>'murosa']) !!}
                                    {!! Form::label('Muros','Muros', array('class'=>'control-label'))!!} <br>
                                    
                                </div> 
                            </div>

                            <div class="col-sm-4 col-md-3"> 
                                <div class="input-group">
                                <h6><b>Daño Menor</b></h6>

                                    {!! Form::checkbox('mamposteria','1',false,['id'=>'mamposteria']) !!}
                                    {!! Form::label('Mamposteria','-Mampostería', array('class'=>'control-label'))!!} <br>
                                    
                                    {!! Form::checkbox('pintura','1',false,['id'=>'pintura']) !!}
                                    {!! Form::label('Pintura','-Pintura', array('class'=>'control-label'))!!} <br>
                                    
                                    {!! Form::checkbox('puertasa','1',false,['id'=>'puertasa']) !!}
                                    {!! Form::label('Puertas','-Puertas', array('class'=>'control-label'))!!} <br>
                                    
                                    {!! Form::checkbox('ventanas','1',false,['id'=>'ventanas']) !!}
                                    {!! Form::label('Ventanas','-Ventanas', array('class'=>'control-label'))!!} <br>
                                    

                                </div> 
                            </div>  
                            
                            <div class="col-sm-6 col-md-4">
                                <div class="input-group">
                                    {!! Form::Label('superficie', 'Superficie Total del Predio(M2):') !!}
                                    {!! Form::text('superficie',null,['placeholder'=>'Superficie total ....','class'=>'form-control','required'=>'required']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="input-group">
                                    {!! Form::Label('construida', 'Área Construida del Predio(M2):') !!}
                                    {!! Form::text('construida',null,['placeholder'=>'Área total ....','class'=>'form-control','required'=>'required']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="input-group">
                                    {!! Form::Label('afectacion', 'Área Afectada Construida(M2):') !!}
                                    {!! Form::text('afectacion',null,['placeholder'=>'Superficie de la vivienda','class'=>'form-control','required'=>'required']) !!}
                                </div>
                            </div>
                            
                    </div>

                    <center><font size="4" face="roman" color="#35001C">Revisión Fisica de la Vivienda</font></center>
                    <div class="row well" style="background-color:rgb(252, 252, 252);"> 
                                                                                   
                            <div class="col-sm-4 col-md-4"> 
                                <div class="form-group"> 
                                    {!! Form::Label('demolida', 'A) Se Encuentra Demolida:') !!}
                                    {!! Form::checkbox('demolida','1',false,['id'=>'demolida']) !!}
                                    
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-4"> 
                                <div class="form-group"> 
                                    {!! Form::Label('limpia', 'B) Se Encuentra Limpia:') !!}
                                    {!! Form::checkbox('limpia','1',false,['id'=>'limpia']) !!}
                                    
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-4"> 
                                <div class="form-group"> 
                                    {!! Form::Label('escombros', 'C) Se Encuentran Escombros en Ella:') !!}
                                    {!! Form::checkbox('escombros','1',false,['id'=>'escombros']) !!}
                                    
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-4"> 
                                <div class="form-group"> 
                                    {!! Form::Label('demolida1', 'Demolida Por:') !!}
                                    {!! Form::select('demolida_tipo', ['PARTICULAR' => 'PARTICULAR', 'AYUNTAMIENTO' => 'AYUNTAMIENTO', 'SISMO' => 'SISMO', 'EMPRESA' => 'EMPRESA'], null, ['placeholder' => 'Seleccione ....','class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-4"> 
                                <div class="form-group"> 
                                    {!! Form::Label('limpia1', 'Limpieza Realizada Por:') !!}
                                    {!! Form::select('limpia_tipo', ['DUEÑO(A)' => 'DUEÑO(A)', 'DUEÑO(A)/PET' => 'DUEÑO(A)/PET', 'PET' => 'PET', 'AYUNTAMIENTO' => 'AYUNTAMIENTO', 'EMPRESA' => 'EMPRESA'], null, ['placeholder' => 'Seleccione ....','class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-4"> 
                                <div class="form-group"> 
                                    {!! Form::Label('escombros1', 'Escombros Recolectados Por:') !!}
                                    {!! Form::select('escombros_tipo', ['PARTICULAR' => 'PARTICULAR', 'AYUNTAMIENTO' => 'AYUNTAMIENTO', 'EMPRESA' => 'EMPRESA'], null, ['placeholder' => 'Seleccione ....','class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="input-group">
                                    {!! Form::Label('escmbros2', 'Total de Escombros(M3):') !!}
                                    {!! Form::text('total_escombros',null,['placeholder'=>'Total M3','class'=>'form-control','required'=>'required']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-8">
                                <div class="input-group">
                                    {!! Form::Label('escombros3', 'Lugar Donde se Depositan los Escombros:') !!}
                                    {!! Form::text('escombros_deposito',null,['placeholder'=>'Localización','class'=>'form-control','required'=>'required']) !!}
                                </div>
                            </div>


                            
                    </div>


                    <center><font size="4" face="roman" color="#35001C">Evidencia de Imagenes</font></center>
                    <div class="row well" style="background-color:rgb(252, 252, 252);"> 
                                                                                   
                           <!--  *******************Ventana Modal Adjuntar Oficio  ********************************* -->
                            

                                            <div class="col-sm-4 col-md-4">
                                                <div class="input-group">
                                                   {!! Form::Label('Documento', 'Imagen Principal:') !!}
                                                    {!! Form::file('imagen_a',null,['placeholder'=>'imagen_a','class'=>'form-control','required'=>'required']) !!}
                                                </div>
                                            </div>

                                            <!--<div class="col-sm-4 col-md-4">
                                                <div class="input-group">
                                                   {!! Form::Label('Documento', 'Imagen Frontal:') !!}
                                                    {!! Form::file('imagen_b',null,['placeholder'=>'imagen_b','class'=>'form-control','required'=>'required']) !!}
                                                </div>
                                            </div> 

                                            <div class="col-sm-4 col-md-4">
                                                <div class="input-group">
                                                   {!! Form::Label('Documento', 'Imagen Lateral:') !!}
                                                   {!! Form::file('imagen_c',null,['placeholder'=>'imagen_c','class'=>'form-control','required'=>'required']) !!}
                                                </div>
                                            </div>--> 
                                       
                                                              
                    </div>            
                
                    
                                       
                    <div class="row well" style="background-color:rgb(252, 252, 252);"> 

                            <div class="col-sm-8 col-md-8> 
                                 <div class="input-group"> 
                                    {!! Form::Label('demolida', 'Nombre del Brigadista que Elaboro:') !!}
                                    {!! Form::text('brigadista',null,['placeholder'=>'Nombre Completo','class'=>'form-control','required'=>'required']) !!}
                                 </div>
                            </div>

                                        

                    </div>            
                   
                    <hr>
                            <a class="btn btn-default btn-md active" href="{{ route('censos.index') }}"> Regresar</a>
                            {!! Form::submit('Registrar Estudio',['class'=>'btn btn-default btn-md active']) !!}
                            {!! Form::close() !!}
                    
                
            </div>
        </div>
    </div>

                    

@endsection