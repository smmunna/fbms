@extends('layouts.dashboard_layout')
@section('title', 'Edit')

@section('dash_content')
    <form action="{{ route('orders.update', ['order' => $entity->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="status">Change Status</label>
            <select name="status" id="status" class="form-control">
                <option value="Processing" {{ $entity->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                <option value="Completed" {{ $entity->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Pending" {{ $entity->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Reject" {{ $entity->status == 'Reject' ? 'selected' : '' }}>Reject</option>
                <option value="Cancel" {{ $entity->status == 'Cancel' ? 'selected' : '' }}>Cancel</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
