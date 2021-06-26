@extends('pages.layouts.page')
@section('content-pra')

<div class="page-products">
    <div class="row contact">
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Tên của bạn (*)</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email của bạn (*)</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" id="" value="Gửi đi">
                </div>
            </form>
        </div>
    </div>
@endsection