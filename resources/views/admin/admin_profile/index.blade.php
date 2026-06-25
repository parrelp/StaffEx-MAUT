@extends('layouts.admin.app')

@section('content')
<div class="container ms-30">
  <h1>Welcome Admin Profile</h1>
  <p>Email: {{ auth()->user()->email }}</p>
  <p>Role: {{ auth()->user()->role }}</p>
  <form action="{{ route('logout') }}" method="POST" style="display: inline;">
      @csrf
      <button type="submit">Logout</button>
  </form>

  <div class="pop-up"></div>
</div>
@endsection


