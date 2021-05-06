@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h1 class="card-title">Admin Dashboard</h1>
                </div>

                <div class="card-body">
                    <div class="row">
                        @foreach($menuItems as $menu)
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="fas fa-database"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">{{ $menu['title'] }}</span>
                                    <span class="info-box-number">{{ $menu['value'] }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
