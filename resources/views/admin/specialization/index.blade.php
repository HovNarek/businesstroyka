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

                            <form action="" method="GET">
                                <div class="form-group">
                                    <label>Выбрать категорию</label>
                                    <select class="form-control select2 cat_select" name="cat" style="width: 30%;">
                                        <option value="0" @if(0 == $current_cat_id) selected @endif>
                                            все категории
                                        </option>
                                        @foreach($cats as $key => $cat)
                                            <option value="{{ $cat->id }}" @if($cat->id == $current_cat_id) selected @endif>
                                                    {{ $cat->cat_title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>

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
                <input type="checkbox" class="custom-control-input spec_enabled" id="spec_enabled_{{$spec->id}}"
                       name="spec_enabled" data-id="{{ $spec->id }}" @if($spec->spec_enabled)checked @endif>
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
                                <p>Специализации еще нет ....</p>
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
        $('.cat_select').change(function () {
            this.form.submit();
        })
    </script>

    <script>
        $('.spec_enabled').change(function (e) {
            let id = $(this).data('id');
            $.ajax({
                url: "{{ Route('specializations.ajaxChangeSpecStatus') }}",
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
