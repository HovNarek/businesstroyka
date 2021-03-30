@extends('admin.layouts.app-admin')

@section('head-css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content-wrapper')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавить категорию</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ Route('categories.index')}} ">Список категории</a>
                        </li>
                        <li class="breadcrumb-item active">Добавить категорию</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Добавить категорию</h3>
                        </div>
                        <!-- /.card-header -->
                        <form role="form" method="post" action="{{ route('categories.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="cat_title">Название</label>
                                    <input type="text" name="cat_title"
                                        class="form-control @error('cat_title') is-invalid @enderror" id="cat_title"
                                        value="{{ old('cat_title') }}">
                                </div>
                                <div class="form-group">
                                    <label for="cat_mtitle">Meta Title</label>
                                    <input type="text" name="cat_mtitle"
                                        class="form-control @error('cat_mtitle') is-invalid @enderror" id="cat_mtitle"
                                        value="{{ old('cat_mtitle') }}">
                                </div>
                                <div class="form-group">
                                    <label>Специализации</label>
                                    <select class="select2" multiple="multiple" name="specs[]"
                                            data-placeholder="Выберите специализации" style="width: 100%;">
                                        @foreach($specs as $key => $spec)
                                            <option value="{{ $spec->id }}"
                                                    @if(old('specs') !== null && in_array($spec->id, old('specs'))) selected @endif>
                                                {{ $spec->spec_title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cat_mkeywords">Meta Keywords</label>
                                    <textarea rows="3" name="cat_mkeywords"
                                        class="form-control @error('cat_mkeywords') is-invalid @enderror"
                                              id="cat_mkeywords">{{ old('cat_mkeywords') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cat_mdescription">Meta Keywords</label>
                                    <textarea rows="5" name="cat_mdescription"
                                        class="form-control @error('cat_mdescription') is-invalid @enderror"
                                              id="cat_mdescription">{{ old('cat_mdescription') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input cat_enabled" id="cat_enabled"
                                        name="cat_enabled">
                                        <label class="custom-control-label" for="cat_enabled">
                                            Отключена / Включена
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input cat_pay" id="cat_pay"
                                        name="cat_pay">
                                        <label class="custom-control-label" for="cat_pay">
                                            Платное размещение
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cat_price">Цена</label>
                                    <input type="number" name="cat_price"
                                           class="form-control @error('cat_price') is-invalid @enderror" id="cat_price"
                                           value="{{ old('cat_price') }}">
                                </div>
                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Создать</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('foot-js')
    <!-- Select2 -->
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>

    <!-- Page specific script -->
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
        })
    </script>
@endsection

