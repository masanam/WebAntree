@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Hosts
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($hosts, ['route' => ['admin.hosts.update', $hosts->id], 'method' => 'patch']) !!}

                        @include('admin.hosts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection