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
                    <h1>Редактирование пользователя</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Редактирование пользователя</li>
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
                            <h3 class="card-title">Пользователя N {{ $user->id }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <form role="form" method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="avatar_div">
                                    <span class="delete_image" id="delete-image">×</span>
                                    <span class="delete_avatar_image" id="delete_avatar_image">×</span>
                                    @if($user->avatar)
                                        @if(preg_match('/avatar\//', $user->avatar))
                                            <img src="{{ asset('uploads/' . $user->avatar) }}" class="user_avatar" alt="..." data-id="{{ $user->id }}">
                                        @else
                                            <img src="{{ $user->avatar }}" class="user_avatar" alt="..." data-id="{{ $user->id }}">
                                        @endif
                                    @else
                                        <img src="{{ asset('avatar.svg') }}" class="user_avatar" alt="...">
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Роль:</label>
                                    <div class="col-sm-5">
                                        <p><b>{{ $user->user_type }}</b> - <a href="" class="blocked"></a></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="login" class="col-sm-2 col-form-label">Логин:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="login" id="login" value="{{ old('login', $user->login) }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">e-mail:</label>
                                    <div class="col-sm-5">
                                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $user->email) }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Имя:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="surname" class="col-sm-2 col-form-label">Фамилия:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="surname" id="surname" value="{{ old('surname', $user->surname) }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="midname" class="col-sm-2 col-form-label">Отчество:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="midname" id="midname" value="{{ old('midname', $user->midname) }}">
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
                                    <label class="col-sm-2 col-form-label">IP (при регистрации):</label>
                                    <div class="col-sm-5">
                                        <p>{{ $user->ips[0]->ip }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Время авторизации:</label>
                                    <div class="col-sm-5">
                                        @if(count($user->ips) === 1)
                                            <p>{{ $user->ips[0]->updated_at }}  - последнее, {{ $user->ips[0]->ip }}</p>
                                        @else
                                            @if(count($user->ips) === 2)
                                                <p>{{ $user->ips[1]->updated_at }}  - последнее, {{ $user->ips[1]->ip }}</p>
                                                <p>{{ $user->ips[0]->updated_at }}  - предпоследнее, {{ $user->ips[0]->ip }}</p>
                                            @else
                                                @if(count($user->ips) === 3)
                                                    <p>{{ $user->ips[2]->updated_at }}  - последнее, {{ $user->ips[2]->ip }}</p>
                                                    <p>{{ $user->ips[1]->updated_at }}  - предпоследнее, {{ $user->ips[1]->ip }}</p>
                                                @endif
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Регион:</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="region" name="region">
                                            @if($user->city)
                                                @foreach($regions as $key => $region)
                                                    <option value="{{ $key }}"
                                                        @if($user->city->region_id == $key) selected @endif>
                                                        {{ $region}}
                                                    </option>
                                                @endforeach
                                            @else
                                                <option value="0">- регион -</option>
                                                @foreach($regions as $key => $region)
                                                    <option value="{{ $key }}"
                                                            @if(old('region') && old('region') == $key) selected @endif>
                                                        {{ $region}}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Город:</label>
                                    <div class="col-sm-5">
                                        @if($user->city)
                                            <select class="form-control" id="city" name="city" data-id="{{ $user->city->id }}">
                                            </select>
                                        @else
                                            <select class="form-control" id="city" name="city">
                                            </select>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="street" class="col-sm-2 col-form-label">Улица:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="street" id="street" value="{{ old('street', $user->street) }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="birthday" class="col-sm-2 col-form-label">Дата рождения:</label>
                                    <div class="col-sm-5">
                                        <input type="date" class="form-control" name="birthday" id="birthday" value="{{ old('birthday', $user->birthday) }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Пол:</label>
                                    <div class="col-sm-5">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="man" value="Мужчина"
                                                   @if($user->gender == 'Мужчина') checked @endif>
                                            <label  class="form-check-label" for="man">Мужчина</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="woman" value="Женщина"
                                                   @if($user->gender == 'Женщина') checked @endif>
                                            <label class="form-check-label" for="woman">Женщина</label>
                                        </div>
                                    </div>
                                </div>
                                @if($user->user_type === 'Исполнитель')
<div class="form-group row spec_div">
    <label class="col-sm-2 col-form-label">Специализация:</label>
    <div class="col-sm-5">
        <select class="form-control" id="specialization" name="specialization">
            @foreach($specs as $spec)
                <option value="{{$spec->id}}"
                    @if($user->specialization_id == $spec->id) selected @endif>
                    {{ $spec->spec_title }}
                </option>
            @endforeach
        </select>
    </div>
</div>
@if($user->account_type == 'master' || $user->account_type == 'base')
    @php
        $count = 0;
        $length = floor(count($specs)/2);
    @endphp
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Дополнительные специализации:</label>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-6">
                    @foreach($specs as $spec)
                        @if($count++ < $length)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="other_specs[]"
                                       id="specs_{{ $spec->id }}" value="{{ $spec->id }}"
                                       @if($user->otherspecializations && in_array($spec->id, $user->otherspecializations->pluck('id')->all())) checked @endif>
                                <label for="specs_{{ $spec->id }}" class="form-check-label">{{ $spec->spec_title }}</label>
                            </div>
                        @else
                            @break
                        @endif
                   @endforeach
                </div>
                @php
                    $count = 0;
                @endphp
                <div class="col-sm-6">
                    @foreach($specs as $spec)
                        @if($count++ >= $length)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="other_specs[]"
                                       id="specs_{{ $spec->id }}" value="{{ $spec->id }}"
                                       @if($user->otherspecializations && in_array($spec->id, $user->otherspecializations->pluck('id')->all())) checked @endif>
                                <label for="specs_{{ $spec->id }}" class="form-check-label">{{ $spec->spec_title }}</label>
                            </div>
                        @else
                            @continue
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
                                @endif
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Статус:</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="status" name="status">
                                            @foreach($statuses as $status)
                                                <option value="{{$status->id}}"
                                                        @if($user->status_id == $status->id) selected @endif>
                                                    {{ $status->status }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Статус (описание):</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control" rows="3" name="status_desc">{{ old('status_desc', $user->status_desc) }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="icq" class="col-sm-2 col-form-label">ICQ:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="icq" id="icq" value="{{ old('icq', $user->icq) }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="skype" class="col-sm-2 col-form-label">Skype:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="skype" id="skype" value="{{ old('skype', $user->skype) }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-2 col-form-label">Телефоны:</label>
                                    <div class="col-sm-5 phone_div">
                                        @forelse($user->phones as $ph)
                                            <div class="phone mb-1">
                                                <input type="text" class="form-control phone_input" name="phones[]" value="{{ $ph->phone }}">
                                                <button type="button" class="close" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @empty
                                        @endforelse
                                        <a href="" class="phones-add">+ добавить</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="emails" class="col-sm-2 col-form-label">E-mail'ы:</label>
                                    <div class="col-sm-5">
                                        @forelse($user->emails as $em)
                                            <div class="emails mb-1">
                                                <input type="text" class="form-control emails_input" name="emails[]" value="{{ $em->email }}">
                                                <button type="button" class="close" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @empty
                                        @endforelse
                                        <a href="" class="emails-add">+ добавить</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="site" class="col-sm-2 col-form-label">Сайты:</label>
                                    <div class="col-sm-5">
                                        @if($user->site)
                                            <div class="site mb-1">
                                                <input type="text" class="form-control site_input" name="site" value="{{ $user->site }}">
                                                <button type="button" class="close" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        <a href="" class="site-add">+ добавить</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="show_info" id="show_info"
                                                   @if(old('show_info') || $user->show_info) checked @endif>
                                            <label for="show_info" class="form-check-label">Показывать информацию только авторизованным пользователям</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">О себе:</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control" rows="5" name="about">{{ old('about', $user->about) }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Уведомления:</label>
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="new_messages" id="new_messages"
                                                   @if(old('new_messages') || $user->new_messages) checked @endif>
                                            <label for="new_messages" class="form-check-label">Новые сообщения</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="new_orders_offers" id="new_orders_offers"
                                                   @if(old('new_orders_offers') || $user->new_orders_offers) checked @endif>
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
                                                    @if(old('roles') !== null && in_array($role->id, old('roles'))) selected
                                                    @elseif(in_array($role->id, $user->roles->pluck('id')->all())) selected
                                                    @endif
                                                >
                                                    {{ $role->role_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @if(!$user->email_verified_at)
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-5">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="verified" id="verified" checked >
                                                <label for="verified" class="form-check-label">Активировать</label>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(!$user->is_logout)
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-5">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="is_logout" id="is_logout" checked >
                                                <label for="is_logout" class="form-check-label">Разлогинить</label>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
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
    @include('admin.users.js.js-user-edit')

    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('adminlte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>

    <script>
        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox();
    </script>
@endsection


