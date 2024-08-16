@extends('layouts.admin')

@section('title','List Coupon')


@section('css')
<style>
    .expired {
        color: white;
        background-color: #FFCCCC;
    }

    .active {
        color: white;
        background-color: #CCFFCC;
    }
</style>
@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Coupon','key' => 'List'])


    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-12">
                    <a href="{{ route('coupon.create')}}" class="btn btn-success btn-sm float-right">Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>STT</th>
                    <th>Mã KM</th>
                    <th>Giảm tiền</th>
                    <th>Giảm phần trăm</th>
                    <th>Loại giảm giá</th>
                    <th>Mô tả</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày hết hạn</th>
                    <th>Trạng thái</th>
                </tr>
                @if(count($coupons) > 0)

                @foreach($coupons as $coupon)

                <tr>
                    <td>{{ $coupon->id}}</td>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ $coupon->discount_amount }}</td>
                    <td>{{ $coupon->discount_percentage }}</td>
                    <td>{{ $coupon->discount_type }}</td>
                    <td>{{ $coupon->description }}</td>
                    <td>{{ $coupon->start_date }}</td>
                    <td>{{ $coupon->end_date }}</td>
                    <td class="{{ $coupon->status === 'expired' ? 'expired' : 'active'}}">{{ $coupon->status }}</td>

                    <td>
                        <form method="post">
                            @csrf
                            @method('DELETE')
                            <a href="" data-url="{{ route('coupon.destroy', ['id' => $coupon->id]) }}" class="btn btn-danger btn-sm action_delete">Delete</a>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5" class="text-center">No Data Found</td>
                </tr>
                @endif
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $coupons->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

@endsection
@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert.min.js') }}"></script>
<script src="{{ asset('admins/main.js') }}"></script>
<script src="{{ asset('admins/search/search.js') }}"></script>
@endsection
