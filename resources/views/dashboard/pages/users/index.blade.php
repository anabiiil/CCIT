@extends('dashboard.layouts.app')
@section('title','users')
@section("style")
<link href="{{ asset('dashboard') }}/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="form">
            <form action="{{ url('admin/users/search') }}" method="get">
                @csrf
            <div class="form-group">
                <div class="">
                    <input type="search" class="form-control mb-3" name="searchword" value="{{ $search_word ?? '' }}" placeholder="search with email or name now">
                    <div class="">
                        <button type="submit" class="btn btn-primary mb-3">Search</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered text-center" style="width:100%">
                <thead class="font-weight-bold">
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>email</th>
                        <th>subscription type</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all as $key => $user)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>   {{ $user->name }}

                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->activeSubscription->name ?? 'not subscribed' }}
                        </td>

                        <td>
                            <span class="badge bg-{{ $user->status == 'active' ? 'success' : 'warning text-dark' }}">{{ $user->status }}</span>
                        </td>

                        <td>
                            <a class="btn btn-{{ $user->status == 'active' ? 'warning' : 'success' }}" href="{{ url('admin/users/change_status/'.$user->id) }}" onclick="return  confirm('are you sure?');" ><span>{{ $user->status == 'active' ? 'De active' : 'active' }}</span></a>
                            <a class="btn btn-danger" href="{{ url('admin/users/delete/'.$user->id) }}" onclick="return  confirm('are you sure?');" ><span>Delete</span></a>


                            {{-- @if ($user->deleted_at)
                                    @if (Auth::guard('admin')->user()->group->licenses()->whereIn('license_name',['delivery_delete','employees_delete'])->first())
                                    <a href="{{ url("admin/users/$user->id/destroy") }}" onclick="return confirm('سوف يظهر المنتج بكل منتجاته');" type="button" class="btn btn-outline-info mx-1"><i class="fadeIn animated bx bx-revision"></i> استرجاع </a>
                            @endif
                            @else
                            <a href="{{ url("admin/users/$user->id/show") }}" class="btn btn-outline-info mx-1"><i class="lni lni-eye"></i> مشاهدة </a>
                            @if (Auth::guard('admin')->user()->group->licenses()->whereIn('license_name',['delivery_edit','employees_edit'])->first())
                            <a href="{{ url("admin/users/$user->type/edit/$user->id") }}" class="btn btn-outline-success  mx-1"><i class="fadeIn animated bx bx-edit"></i> تعديل </a>
                            @endif
                            @if (Auth::guard('admin')->user()->group->licenses()->whereIn('license_name',['delivery_delete','employees_delete'])->first())
                            <a href="{{ url("admin/users/$user->id/destroy") }}" onclick="return  confirm('هل انت متأكد؟');" type="button" class="btn btn-outline-danger mx-1"><i class="fadeIn animated bx bx-trash"></i> حذف </a>
                            @endif
                            @endif --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>email</th>
                        <th>subscription type</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection

@section("script")
<script src="{{ asset('dashboard') }}/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('dashboard') }}/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

</script>
<script>
    $(document).ready(function() {

        table.buttons().container()
            .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });

</script>
@endsection
