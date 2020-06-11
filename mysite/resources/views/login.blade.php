@extends ('layouts.app')

@section('title-block')
  Авторизация
@endsection


@section('content')

<section>
        <br/>
        <h1>Авторизация</h1>
        <br/>
        <form class="adminForm" action="{{ route('login') }}" method="POST">
                @csrf
                <p><input type="text" name="login" placeholder="Логин" data-toggle="popover">
                <p><input type="password" name="password" placeholder="Пароль" data-toggle="popover">
                <p>
                        <input type="submit" value="Войти" style="width: 160px;">
                        <!-- <a href="/registration"><input type='button' id="registration" value="Зарегестрироваться" style="width: 160px;"></a> -->
                </p>
        </form>
</section>
@endsection