@if (count($errors) > 0)
<!-- Список ошибок формы -->
<div class="alert-danger">
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
</div>
@endif