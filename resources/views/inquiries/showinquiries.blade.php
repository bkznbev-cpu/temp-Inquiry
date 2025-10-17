@extends('layouts.layout')
@section('title', 'Inquiries')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/inquiries.css') }}">
@endsection

@section('content')
<div class="inquiries-container">

    <!-- Left Sidebar -->
    <aside class="people">
        <h2>Inquiries</h2>
        <input type="text" placeholder="Search inquiry">
        <ul class="chat-list">
            <li class="chat active">Sir Balmond Dagus</li>
            <li class="chat">ITP317 System Integration</li>
            <li class="chat">Alucard</li>
            <li class="chat">Badang</li>
            <li class="chat">Gloo</li>
        </ul>
    </aside>

    <!-- Chat Window -->
    <main class="chat-window">
        <h2 style="text-align:center;">Inquiry Table</h2>
        <table border="1" width="100%" cellpadding="8" cellspacing="0" style="border-collapse:collapse;">
            <thead style="background:#3498db; color:white;">
                <tr>
                    <th>UserID</th>
                    <th>Seeker ID</th>
                    <th>Owner ID</th>
                    <th>Message</th>
                    <th>Date Sent</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inquiries as $inquiry)
                    <tr>
                        <td>{{ $inquiry->UserID }}</td>
                        <td>{{ $inquiry->seeker_id }}</td>
                        <td>{{ $inquiry->owner_id }}</td>
                        <td>{{ $inquiry->Message }}</td>
                        <td>{{ $inquiry->DateSent }}</td>
                        <td>
                            @if ($inquiry->Status == 'Pending')
                                <span style="color:orange;">{{ $inquiry->Status }}</span>
                            @else
                                <span style="color:green;">{{ $inquiry->Status }}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <!-- Right Sidebar -->
    <aside class="chat-info">
        <h3>User Info</h3>
        <p><strong>Name:</strong> Sir Balmond Dagus</p>
        <p><strong>Status:</strong> Online</p>
        <ul>
            <li>Profile</li>
            <li>Mute</li>
            <li>Search</li>
        </ul>
    </aside>

</div>
@endsection
