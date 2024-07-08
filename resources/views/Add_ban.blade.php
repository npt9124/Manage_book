@extends('Adminn')
@section('admin_content')
    <link rel="stylesheet" href="public/css/add.css">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add ban
                </header>
                <br>
                <style>
                    .form-background {
                        background-image: url('{{ asset('images/img.png') }}');
                        background-size: cover;
                        background-position: center;
                        padding: 20px;
                        border-radius: 10px;
                    }
                </style>

                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert alert-pink">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <div class="panel-body form-background">
                    <div class="position-center">
                        <form method="POST" action="{{ route('save-ban') }}" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <label for="ban_name" class="col-sm-2 control-label" style="color: black">Ban Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="ban_name" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="fines" class="col-sm-2 control-label" style="color: black">Fines</label>
                                <div class="col-sm-10">
                                    <input type="text" name="fines" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="loan_id" class="col-sm-2 control-label" style="color: black">Loan</label>
                                <div class="col-sm-10">
                                    <select name="loan_id" class="form-control" required>
                                        @foreach ($loan as $loans)
                                            <option value="{{ $loans->loan_id }}">{{ $loans->loan_id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn " style="background: #00a6b2;">Add ban</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
