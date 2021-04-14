@extends('admin.layouts.app-admin')

@section('content-wrapper')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Список пользователей</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Список пользователей</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Пользователи</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if (count($users))
                                <div class="table-responsive" >
                                    <table class="table table-bordered table-hover text-wrap">
                                        <thead>
                                        <tr>
                                            <th width="10">ID</th>
                                            <th>Логин</th>
                                            <th>Рейтинг</th>
                                            <th>Баланс</th>
                                            <th>Был</th>
                                            <th width="150">Действие</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <td>

                                            </td>
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Пользователь еще нет ....</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

