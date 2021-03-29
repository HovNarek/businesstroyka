@extends('admin.layouts.app-admin')

@section('content-wrapper')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактировать специализацию</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ Route('specializations.index')}} ">Список специализации</a>
                        </li>
                        <li class="breadcrumb-item active">Редактировать специализацию {{ $spec->spec_title }}</li>
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
                            <h3 class="card-title">Специализация {{ $spec->spec_title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <form role="form" method="post" action="{{ route('specializations.update', $spec->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="spec_title">Название:</label>
                                    <input type="text" name="spec_title"
                                        class="form-control @error('spec_title') is-invalid @enderror" id="spec_title"
                                           value="{{ old('spec_title', $spec->spec_title) }}"">
                                </div>
                                <div class="form-group">
                                    <label for="spec_mtitle">Meta Title:</label>
                                    <input type="text" name="spec_mtitle"
                                        class="form-control @error('spec_mtitle') is-invalid @enderror" id="spec_mtitle"
                                           value="{{ old('spec_mtitle', $spec->spec_mtitle) }}">
                                </div>
                                <div class="form-group">
                                    <label for="spec_mkeywords">Meta Keywords</label>
                                    <textarea rows="3" name="spec_mkeywords"
                                        class="form-control @error('spec_mkeywords') is-invalid @enderror"
                                              id="spec_mkeywords">{{ old('spec_mkeywords', $spec->spec_mkeywords) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="spec_mdescription">Meta Keywords</label>
                                    <textarea rows="5" name="spec_mdescription"
                                        class="form-control @error('spec_mdescription') is-invalid @enderror"
                                              id="spec_mdescription">{{ old('spec_mdescription', $spec->spec_mdescription) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input spec_enabled" id="customSwitch3"
                                        name="spec_enabled" @if($spec->spec_enabled)checked @endif>
                                        <label class="custom-control-label" for="customSwitch3">
                                            Отключена / Включена
                                        </label>
                                    </div>
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

