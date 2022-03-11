@extends('dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="card">
        <img src="" class="card-img-top"  alt="">
        <div class="card-body">
           
           <h4 class="card-title font-weight-bold mr-5"></h4>                 
            <p class="card-text"></p>
            <div class="row">
                <div class="col-4">
                    <a href="" class="btn btn-primary">Read more &rarr;</a>
                </div>
                <div class="col-8">
                    <p class="text-gray small ml-5">
                        <i class="far fa-calendar-alt"></i>
                        <a href="" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-user-edit"></i>
                        </a>
                      </p>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection