@extends('Adminn')
@section('admin_content')

    <link rel="stylesheet" href="public/css/add.css">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add Reader
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
                        <form method="POST" action="{{ route('save-reader') }}" enctype="multipart/form-data" class="form-horizontal">
                            @csrf

                            <div class="form-group" style="color: black">
                                <label for="name" class="col-sm-2 control-label">Name:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group" style="color: black">
                                <label for="email" class="col-sm-2 control-label">Email:</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group" style="color: black">
                                <label for="phone_number" class="col-sm-2 control-label">Phone:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="phone_number" id="phone_number" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group" style="color: black">
                                <label for="address" class="col-sm-2 control-label">Address:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="address" id="address" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group" style="color: black">
                                <label for="gender" class="col-sm-2 control-label">Gender:</label>
                                <div class="col-sm-10">
                                    <label><input type="radio" name="gender" value="male" required> Male</label>
                                    <label><input type="radio" name="gender" value="female" required> Female</label>
                                    <label><input type="radio" name="gender" value="female" required> Secret</label>
                                </div>
                            </div>
                            <div class="form-group" style="color: black">
                                <label for="total_num_books_borrowed" class="col-sm-2 control-label">Total num books borrowed:</label>
                                <div class="col-sm-10">
                                    <input type="number" name="total_num_books_borrowed" id="total_num_books_borrowed" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group" style="color: black">
                                <label for="birthday" class="col-sm-2 control-label">Birthday:</label>
                                <div class="col-sm-10">
                                    <input type="date" name="birthday" id="birthday" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn " style="background: #00a6b2;">Add reader</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
