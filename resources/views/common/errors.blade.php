@if (count($errors) > 0)
    error
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif