@extends('layouts.app')

@section('title', 'Dashboard - BAC System')

@section('content')
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1>Welcome to BAC System</h1>
            <div class="user-info">
                @if(session('user'))
                    <span>Welcome, {{ session('user')['firstName'] }} {{ session('user')['lastName'] }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="logout-form">
                        @csrf
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                @endif
            </div>
        </div>

        <div class="dashboard-content">
            <div class="dashboard-cards">
                <div class="card">
                    <h3>Procurement Requests</h3>
                    <p class="count">0</p>
                    <p class="label">Pending Requests</p>
                </div>
                <div class="card">
                    <h3>Active Bids</h3>
                    <p class="count">0</p>
                    <p class="label">Current Bidding</p>
                </div>
                <div class="card">
                    <h3>Completed</h3>
                    <p class="count">0</p>
                    <p class="label">Processed Items</p>
                </div>
            </div>

            <div class="recent-activity">
                <h2>Recent Activity</h2>
                <div class="activity-list">
                    <p class="no-activity">No recent activities</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .dashboard-container {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .dashboard-header h1 {
            color: #2d3748;
            font-size: 1.875rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logout-btn {
            background-color: #e53e3e;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .logout-btn:hover {
            background-color: #c53030;
        }

        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .card {
            background-color: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            color: #4a5568;
            font-size: 1.125rem;
            margin-bottom: 1rem;
        }

        .card .count {
            font-size: 2.25rem;
            font-weight: bold;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }

        .card .label {
            color: #718096;
            font-size: 0.875rem;
        }

        .recent-activity {
            background-color: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .recent-activity h2 {
            color: #2d3748;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .activity-list {
            min-height: 200px;
        }

        .no-activity {
            color: #718096;
            text-align: center;
            padding: 2rem;
        }

        .logout-form {
            margin: 0;
        }
    </style>
@endpush