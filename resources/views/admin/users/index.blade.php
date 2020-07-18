@extends('admin.layout')


@section('content')



    <div class="" uk-grid>


        <div class="uk-width-1-6@m leftAdminPanel">
            <div class="uk-card uk-card-body uk-card-small">
                <ul class="uk-list">
                    <li><a href="{{ url('/admin') }}" class="uk-width-1-1 uk-button-small uk-button uk-button-default">Главная</a></li>
                    <li><a href="{{ route('categories.index') }}" class="uk-width-1-1 uk-button-small uk-button uk-button-default">Категории</a></li>
                    <li><a href="{{ route('tags.index') }}" class="uk-width-1-1 uk-button-small uk-button uk-button-default">Теги</a></li>
                    <li><a href="{{ route('users.index') }}" class="uk-width-1-1 uk-button-small uk-button uk-button-primary">Пользователи</a></li>
                    <li><a href="{{ route('catalog.index') }}" class="uk-width-1-1 uk-button-small uk-button uk-button-default">Каталог</a></li>
                </ul>
            </div>
        </div>






        <div class="uk-width-expand@m uk-padding">

            <div class="uk-h3">Пользователи</div>
            <a href="{{ route('users.create') }}" class="uk-button uk-button-primary uk-button-small">Создать</a>

            <table class="uk-table uk-table-middle uk-table-divider uk-table-hover">
                <thead>
                <tr>
                    <th >id</th>
                    <th >Имя </th>
                    <th >img </th>
                    <th class="uk-width-expand">email </th>

                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td style="min-width: 150px; ">{{ $user->name }}</td>
                        <td><img style="min-width: 140px;" src="{{ $user->getImage() }}" alt=""></td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="uk-margin-small">
                                <div class="uk-button-group">
                                    <a href="{{ route('users.edit', $user->id) }}" class="uk-icon-button uk-margin-small-right" uk-icon="pencil" uk-tooltip="title: edit"></a>
                                    {!! Form::open([
                                            'method' => 'delete',
                                            'route' => ['users.destroy', $user->id]
                                            ]) !!}
                                    <button onclick="return confirm('удалить?')" class="uk-icon-button uk-margin-small-right" uk-icon="trash" uk-tooltip="title: удалить"></button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>



    </div>
@endsection
