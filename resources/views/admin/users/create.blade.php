@extends('admin.layouts.app-admin')

@section('head-css')
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
@endsection

@section('content-wrapper')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавить пользователя</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Добавить пользователя</li>
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
                            <h3 class="card-title">Добавить пользователя</h3>
                        </div>
                        <!-- /.card-header -->
                        <form role="form" method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="avatar_div">
                                    <span class="delete_image" id="delete-image">×</span>
                                    <img src="{{ asset('avatar.svg') }}" class="user_avatar" alt="...">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Роль:</label>
                                    <div class="col-sm-5">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="user_type" id="user_type1" value="Исполнитель"
                                                @if(old('user_type') && old('user_type') == 'Исполнитель') checked @endif>
                                            <label  class="form-check-label" for="user_type1">Исполнитель</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="user_type" id="user_type2" value="Заказчик"
                                                   @if(old('user_type') && old('user_type') == 'Заказчик') checked @endif>
                                            <label class="form-check-label" for="user_type2">Заказчик</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="login" class="col-sm-2 col-form-label">Логин:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="login" id="login" value="{{ old('login') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">e-mail:</label>
                                    <div class="col-sm-5">
                                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Имя:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="surname" class="col-sm-2 col-form-label">Фамилия:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="surname" id="surname" value="{{ old('surname') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="midname" class="col-sm-2 col-form-label">Отчество:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="midname" id="midname" value="{{ old('midname') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Аватар:</label>
                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="avatar"
                                                       name="avatar">
                                                <label class="custom-file-label" for="avatar">Выберите файл</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Пароль:</label>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control" name="password" id="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password_confirmation" class="col-sm-2 col-form-label">Подтверждение пароля:</label>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Регион:</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="region" name="region">
                                            <option value="0">- регион -</option>
                                            @foreach($regions as $key => $region)
                                                <option value="{{ $key }}"
                                                    @if(old('region') && old('region') == $key) selected @endif>
                                                    {{ $region}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Город:</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="city" name="city">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="street" class="col-sm-2 col-form-label">Улица:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="street" id="street" value="{{ old('street') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="birthday" class="col-sm-2 col-form-label">Дата рождения:</label>
                                    <div class="col-sm-5">
                                        <input type="date" class="form-control" name="birthday" id="birthday" value="{{ old('birthday') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Пол:</label>
                                    <div class="col-sm-5">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="man" value="Мужчина"
                                                   @if(old('gender') && old('gender') == 'Мужчина') checked @endif>
                                            <label  class="form-check-label" for="man">Мужчина</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="woman" value="Женщина"
                                                   @if(old('gender') && old('gender') == 'Женщина') checked @endif>
                                            <label class="form-check-label" for="woman">Женщина</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row spec_div">
                                    <label class="col-sm-2 col-form-label">Специализация:</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="specialization" name="specialization">
                                            <option value="0">- специализация -</option>
                                            @foreach($specs as $spec)
                                                <option value="{{$spec->id}}"
                                                    @if(old('specialization') && old('specialization') == $spec->id) selected @endif>
                                                    {{ $spec->spec_title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Статус:</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="status" name="status">
                                            @foreach($statuses as $status)
                                                <option value="{{$status->id}}"
                                                        @if(old('status') && old('status') == $status->id) selected @endif>
                                                    {{ $status->status }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Статус (описание):</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control" rows="3" name="status_desc">{{ old('status_desc') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="icq" class="col-sm-2 col-form-label">ICQ:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="icq" id="icq" value="{{ old('icq') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="skype" class="col-sm-2 col-form-label">Skype:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="skype" id="skype" value="{{ old('skype') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-2 col-form-label">Телефоны:</label>
                                    <div class="col-sm-5 phone_div">
                                        <a href="" class="phones-add">+ добавить</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="emails" class="col-sm-2 col-form-label">E-mail'ы:</label>
                                    <div class="col-sm-5">
                                        <a href="" class="emails-add">+ добавить</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="site" class="col-sm-2 col-form-label">Сайты:</label>
                                    <div class="col-sm-5">
                                        <a href="" class="site-add">+ добавить</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="show_info" id="show_info"
                                                   @if(old('show_info')) checked @endif>
                                            <label for="show_info" class="form-check-label">Показывать информацию только авторизованным пользователям</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">О себе:</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control" rows="5" name="about">{{ old('skype') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Уведомления:</label>
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="new_messages" id="new_messages"
                                                   @if(old('new_messages')) checked @endif>
                                            <label for="new_messages" class="form-check-label">Новые сообщения</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="new_orders_offers" id="new_orders_offers"
                                                   @if(old('new_orders_offers')) checked @endif>
                                            <label for="new_orders_offers" class="form-check-label">Новые заказы/предложения</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Принадлежность к группе:</label>
                                    <div class="col-sm-5">
                                        <select class="duallistbox" multiple="multiple" name="roles[]">
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}"
                                                        @if(old('roles') !== null && in_array($role->id, old('roles'))) selected @endif>
                                                    {{ $role->role_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Добавить</button>
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
    @include('admin.users.js-user')

    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('adminlte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>

    <script>
        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox();
    </script>
@endsection


