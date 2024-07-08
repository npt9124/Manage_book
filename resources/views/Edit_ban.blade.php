@extends('Adminn')
@section('admin_content')

    <link rel="stylesheet" href="public/css/add.css">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading" style="background-color: #00a6b2">
                    Edit Ban
                </header>
                <br>
                <style>
                    .form-background {
                        padding: 20px;
                        border-radius: 10px;
                        background-color: #a0d7b8;
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
                        <form method="POST" action="{{ route('update-ban', $ban->ban_id) }}" enctype="multipart/form-data" class="form-horizontal">
                            @csrf

                            <div class="form-group" style="color: black">
                                <label for="ban_name" class="col-sm-2 control-label">Ban Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="ban_name" id="ban_name" class="form-control" value="{{ $ban->ban_name }}" required>
                                </div>
                            </div>
                            <div class="form-group" style="color: black">
                                <label for="fines" class="col-sm-2 control-label">Fines</label>
                                <div class="col-sm-10">
                                    <input type="text" name="fines" id="fines" class="form-control" value="{{ $ban->fines }}" required>
                                </div>
                            </div>

                            <div class="form-group" style="color: black">
                                <label for="loan_id" class="col-sm-2 control-label">Loan:</label>
                                <div class="col-sm-10">
                                    <select name="loan_id" class="form-control" required>
                                        @foreach ($loan as $loans)
                                            <option value="{{ $loans->loan_id }}" {{ $loans->loan_id == $ban->loan_id ? 'selected' : '' }}>{{ $loans->loan_id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn" style="background: #00a6b2;">Update Ban</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
