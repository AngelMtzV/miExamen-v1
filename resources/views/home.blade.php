@extends('layouts.app')

@section('content')
      <div id="app">
        <div class="container">
          @if(Session::has('message'))
              <div class="alert alert-info">
                  {{ Session::get('message') }}
              </div>
          @endif
        </div>
        <div class="container">
          @if(Session::has('error'))
              <div class="alert alert-danger">
                  {{ Session::get('error') }}
              </div>
          @endif
        </div>


          <main>
              @if(auth()->user()->id_tipoUsuario == 1)
                @include('admin.inicioAdmin')
              @else
                @include('user.inicio')
              @endif
          </main>
      </div>
    </div>
    <!-- End of Main Content -->
@endsection
