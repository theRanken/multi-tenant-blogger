@if(session()->has('error'))
<div class="alert alert-danger">
  {{ session('error') }}
  <button class="alert__close">X</button>
</div>
@endif
@if(session()->has('success'))
<div class="alert alert-success">
  {{ session('success') }}
  <button class="alert__close">X</button>
</div>
@endif
@if(session()->has('warning'))
<div class="alert alert-warning">
  {{ session('warning') }}
  <button class="alert__close">X</button>
</div>
@endif