@extends('layouts.public')

@section('content')
<!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
          <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
            </button>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <center>
                            <img src="{{ asset('public/img/home.png') }}" border=0 style="width: 100%">
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
@endsection
