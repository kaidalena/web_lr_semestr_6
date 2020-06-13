@extends ('layouts.app')

@section('title-block')
  Редактор блога
@endsection

@section('content')
<section>

    
    <h1>Добавление записи Блога</h1>

    @include('common.errors')
    @include('common.msg')
    
    
    <form enctype="multipart/form-data"  action="{{ route('blog.create') }}" method=POST >
    @csrf
        <p><input type="text" id="topic" name="topic" placeholder="Тема сообщения" data-toggle="popover" 
            >
            
        </p>

        <p><textarea id="message" name="message" data-toggle="popover" placeholder="Ваше сообщение..."
            ></textarea>
            
        </p>

        <p>
            <input type="hidden" name="30000" value="30000" />    
            <input name="userFile" type="file" accept="image/*">

        </p>

        
        <input type="submit"  id="submit" value="Отправить" >
        <input type="reset" id="reset" value="Очистить" >
    </form>
</section>
@endsection