@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> This is embaracing we can't find you without the following.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

