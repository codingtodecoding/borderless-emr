@extends('layouts.admin')

@section('page-title', 'Treatment Management')

@section('admin-content')

<div class="container-fluid">

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Treatment List</h4>

            <a href="{{ route('admin.treatments.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add Treatment
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">SR No</th>
                            <th>Treatment Name</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($treatments as $key => $treatment)
                            <tr>
                                <td>{{ ($treatments->currentPage() - 1) * 10 + $key + 1 }}</td>
                                <td>{{ $treatment->name }}</td>
                                <td>
                                    <a href="{{ route('admin.treatments.edit', $treatment->id) }}"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.treatments.destroy', $treatment->id) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this treatment?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">
                                    No treatments found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($treatments->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $treatments->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>

</div>

@endsection
