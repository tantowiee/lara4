@if($errors->has())
    <div class="alert alert-error">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <h4>Error!</h4>
            @foreach($errors->all() as $message)
                <p>{{ $message }}</p>
            @endforeach
    </div>
@endif