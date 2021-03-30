@extends('admin.layouts.app-admin')

@section('content-wrapper')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Категории</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Список категории</li>
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
                            <h3 class="card-title">Список категории</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Добавить категорию</a>
                            @if (count($cats))
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
@foreach($cats as $key => $cat)
    <tr>
        <td>{{$key + 1}}</td>
        <td>{{ $cat->cat_title }}</td>
        <td>
            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success cat_enabled_div">
                <input type="checkbox" class="custom-control-input cat_enabled" id="cat_enabled_{{$cat->id}}"
                       name="cat_enabled" data-id="{{ $cat->id }}" @if($cat->cat_enabled)checked @endif>
                <label class="custom-control-label" for="cat_enabled_{{$cat->id}}" title="Вкл/Выкл"></label>
            </div>
            <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-info btn-sm float-left mr-1 cat_edit">
                <i class="fas fa-pencil-alt"></i>
            </a>
            <form
                action="{{ route('categories.destroy', $cat->id)}}"
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
                                <p>Категории еще нет ....</p>
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

@section('foot-js')
    <script>
        $('.cat_enabled').change(function (e) {
            let id = $(this).data('id');
            $.ajax({
                url: "{{ Route('categories.ajaxChangeCatStatus') }}",
                type: "POST",
                data: {
                    id: id
                },
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },
                success: function (data) {

                },
            });
        });
    </script>
@endsection
