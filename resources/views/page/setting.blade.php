@extends('template')

@section('test1', 'Setting')

@section('link1')
<a href="/cart">Back</a>
@endsection

@section('konten')
    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header bg-primary text-white">
                    Profile
                </div>
                <div class="card-body">
                    <h5 class="card-title mb-0">{{ Auth::user()->name }}</h5>
                    <p class="card-text text-muted mb-0">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    Password
                </div>
                <div class="card-body">
                    <a href="{{ route('password.change') }}" class="btn btn-warning">
                        <i class="fi fi-rr-key me-2"></i> Change Password
                    </a>
                </div>
            </div>
            <div class="card mt-3">
            <div class="card-header bg-danger text-white">
                Delete Account
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('account.delete') }}" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-60">
                        <i class="fi fi-rr-trash me-2"></i> Delete My Account
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection