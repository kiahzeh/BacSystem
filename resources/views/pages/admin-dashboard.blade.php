@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
  <section class="dashboard">
    <h1>Welcome, Admin!</h1>
    <p>Track your procurement processes easily.</p>
    
    <!-- Procurement Monitoring Section -->
    <div class="procurement-tracker">
      <h2>Procurement Process</h2>
      <ul class="process-bar">
        <li class="completed">ATP</li>
        <li class="completed">Procurement</li>
        <li>Posting in PhilGEPS</li>
        <li>Pre-Bid</li>
        <li>Bid Opening</li>
        <li>Bid Evaluation</li>
        <li>Post Qualification</li>
        <li>Confirmation on Approval</li>
        <li>Issuance of Notice of Award</li>
        <li>Purchase Order</li>
        <li>Contract</li>
        <li>Notice to Proceed</li>
        <li>Posting of Award in PhilGEPS</li>
        <li>Forward Purchase or Supply</li>
      </ul>
    </div>
  </section>
@endsection
