@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Lokets
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($lokets, ['route' => ['admin.lokets.update', $lokets->id], 'method' => 'patch']) !!}

                        @include('admin.lokets.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection