@extends('layouts.admin')

@section('title','Thêm Mã giảm giá')

@section('content')
<div class="content-wrapper">

    @include('partials.content-header', ['name' => 'Coupon','key' => 'Add'])

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('coupon.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Mã giảm giá</label>
                            <input type="text" class="form-control" placeholder="Nhập mã giảm giá" name="code" value="{{ old('code')}}">
                        </div>
                        <div class="form-group">
                            <label>Chọn loại giảm giá</label>
                            <select class="form-control" id="discount_type" name="discount_type">
                                <option value="0" selected>Chọn loại giảm giá</option>
                                {!! $coupon_types !!}
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Giảm theo giá </label>
                            <input type="text" class="form-control discount_amount" placeholder="Nhập giá giảm" name="discount_amount">
                        </div>

                        <div class="form-group">
                            <label>Giảm phần trăm</label>
                            <input type="text" class="form-control discount_percentage" placeholder="Nhập phần trăm giảm" name="discount_percentage">
                        </div>

                        <div class="form-group">
                            <label>Ngày bắt đầu</label>
                            <input type="text" class="form-control" placeholder="Nhập ngày bắt đầu" name="start_date">
                        </div>
                        <div class="form-group">
                            <label>Ngày hết hạn</label>
                            <input type="text" class="form-control" placeholder="Nhập ngày hết hạn" name="end_date">
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="description" class="form-control"> {{ old('description')}}</textarea>


                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let discountAmountInput = document.querySelector('.discount_amount');
        let discountPercentageInput = document.querySelector('.discount_percentage');

        discountAmountInput.disabled = true;
        discountAmountInput.style.opacity = '0.5';

        discountPercentageInput.disabled = true;
        discountPercentageInput.style.opacity = '0.5';
    });

    document.getElementById('discount_type').addEventListener('change', function() {

        let selectedOption = this.value;

        let discountAmountInput = document.querySelector('.discount_amount');
        let discountPercentageInput = document.querySelector('.discount_percentage');

        if (selectedOption === 'fixed') {
            discountAmountInput.style.opacity = '1'; // Khôi phục trường giảm theo giá
            discountAmountInput.disabled = false; // Cho phép nhập trường giảm theo giá
            discountPercentageInput.style.opacity = '0.5'; // Làm mờ trường giảm phần trăm
            discountPercentageInput.disabled = true; // Vô hiệu hóa trường giảm phần trăm
        }
        // Nếu lựa chọn là 'percentage'
        else if (selectedOption === 'percentage') {
            discountPercentageInput.style.opacity = '1'; // Khôi phục trường giảm phần trăm
            discountPercentageInput.disabled = false; // Cho phép nhập trường giảm phần trăm
            discountAmountInput.style.opacity = '0.5'; // Làm mờ trường giảm theo giá
            discountAmountInput.disabled = true; // Vô hiệu hóa trường giảm theo giá
        }
    })
</script>
@endsection
