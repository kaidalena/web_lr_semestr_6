@extends ('layouts.app')

@section('title-block')
  Загрузка блога
@endsection


@section('content')
<section>
    <h1>Загрузка файла с сообщениями Блога</h1>
    @include('common.msg')
    <br/>
    <h3> Файл *.CSV </h3>
    <form enctype="multipart/form-data" action="{{ route('loadBlogs') }}" method="POST">
    @csrf
        <input type="hidden" name="300000" value="30000" />
        <input name="userFile" type="file">
        <br/>
        <input type="submit" value="Загрузить">
    </form>
</section>
@endsection