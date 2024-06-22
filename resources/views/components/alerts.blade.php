@if(session('error'))
<div class="alert alert-danger">
  {{ session('error') }}
  <button class="alert__close">X</button>
</div>
@endif
@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
  <button class="alert__close">X</button>
</div>
@endif
@if(session('warning'))
<div class="alert alert-warning">
  {{ session('warning') }}
  <button class="alert__close">X</button>
</div>
@endif