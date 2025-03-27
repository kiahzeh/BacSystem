@extends('layouts.app')

@section('title', 'Welcome to BAC System')

@section('content')
  <section class="hero">
    <h1>Welcome to BAC System</h1>
    <p>Streamline and monitor procurement with ease.</p>
    <button onclick="window.location.href='{{ url('/login') }}'">Get Started</button>
  </section>

  <section class="contact">
    <h2>Contact Us</h2>
    <p>Email: support@bacsystem.com</p>
    <p>Phone: +63 123 456 7890</p>
  </section>
@endsection
