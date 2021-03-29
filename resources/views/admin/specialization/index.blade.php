@extends('admin.layouts.app-admin')

@section('content-wrapper')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Специализации</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Список специализации</li>
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
                            <h3 class="card-title">Список специализации</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('specializations.create') }}" class="btn btn-primary mb-3">Добавить специализацию</a>
                            @if (count($specs))
                                <div class="table-responsive" >
                                    <table class="table table-bordered table-hover text-wrap">
                                        <thead>
                                        <tr>
                                            <th width="10">ID</th>
                                            <th>Название</th>
                                            <th width="150">Действие</th>
                                        </tr>
                                        </thead>
                                        <tbody>
@foreach($specs as $key => $spec)
    <tr>
        <td>{{$key + 1}}</td>
        <td>{{ $spec->spec_title }}</td>
        <td>
            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success spec_enabled_div">
                <input type="checkbox" class="custom-control-input" id="spec_enabled_{{$spec->id}}" name="spec_enabled">
                <label class="custom-control-label" for="spec_enabled_{{$spec->id}}" title="Вкл/Выкл"></label>
            </div>
            <a href="{{ route('specializations.edit', $spec->id) }}" class="btn btn-info btn-sm float-left mr-1 spec_edit">
                <i class="fas fa-pencil-alt"></i>
            </a>
            <form
                action="{{ route('specializations.destroy', $spec->id)}}"
                method="post" class="float-left">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Подтвердить удаление')">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </td>
    </tr>
@endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>ТСпециализации еще нет ....</p>
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
