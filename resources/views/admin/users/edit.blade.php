@extends('admin.layout')


@section('content')



    <div class="" uk-grid>


        <div class="uk-width-1-6@m leftAdminPanel">
            <div class="uk-card uk-card-body uk-card-small">
                @include('admin._sidebar')
            </div>
        </div>






        <div class="uk-width-expand@m uk-padding">

            <div class="uk-h3">Редактировать пользователя</div>
            <a href="{{ route('users.index') }}" class="uk-button uk-button-primary uk-button-small">Назад</a>

            @include('admin.errors')

            <fieldset class="uk-fieldset">
                {!! Form::open(
                        ['route' => ['users.update', $user->id],
                        'method'=> 'put',
                        'files' => true]
                        ) !!}

                <div class="uk-margin">
                    <label class="uk-form-label" for="name">Имя</label>
                    <input class="uk-input" id="name" name="name" type="text" placeholder="Имя пользователя" value="{{ $user->name }}">
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="email">почта</label>
                    <input class="uk-input" id="email" name="email" type="text" placeholder="email" value="{{ $user->email }}">
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="password">пароль</label>
                    <input class="uk-input" id="password" name="password" type="password" placeholder="пароль">
                </div>


                <div class="uk-margin">
                    <img style="width: 200px;" src="{{ $user->getImage() }}" alt="">
                </div>


                <div class="uk-margin">
                    <span class="uk-text-middle">аватар</span>
                    <div uk-form-custom>
                        <input type="file" name="avatar">
                        <span class="uk-link">загрузить</span>
                    </div>
                </div>

                <div class="uk-margin">
                    <button class="uk-button uk-button-default">сохранить</button>
                </div>
            </fieldset>
            {!! Form::close() !!}


        </div>



    </div>
@endsection
