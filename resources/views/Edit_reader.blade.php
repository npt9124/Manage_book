@extends('Adminn')
@section('admin_content')

    <link rel="stylesheet" href="public/css/add.css">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading" style="background-color: #00a6b2">
                    Edit Reader
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
                        <form method="POST" action="{{ route('update-reader', $reader->reader_id) }}" enctype="multipart/form-data" class="form-horizontal">
                            @csrf

                            <div class="form-group" style="color: black">
                                <label for="name" class="col-sm-2 control-label">Name:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $reader->name }}" required>
                                </div>
                            </div>

                            <div class="form-group" style="color: black">
                                <label for="email" class="col-sm-2 control-label">Email:</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $reader->email }}" required>
                                </div>
                            </div>
                            <div class="form-group" style="color: black">
                                <label for="phone" class="col-sm-2 control-label">Phone:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $reader->phone }}" required>
                                </div>
                            </div>
                            <div class="form-group" style="color: black">
                                <label for="address" class="col-sm-2 control-label">Address:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="address" id="address" class="form-control" value="{{ $reader->address }}" required>
                                </div>
                            </div>
                            <div class="form-group" style="color: black">
                                <label for="gender" class="col-sm-2 control-label">Gender:</label>
                                <div class="col-sm-10">
                                    <label><input type="radio" name="gender" value="male" {{ $reader->gender == 'male' ? 'checked' : '' }} required> Male</label>
                                    <label><input type="radio" name="gender" value="female" {{ $reader->gender == 'female' ? 'checked' : '' }} required> Female</label>
                                    <label><input type="radio" name="gender" value="secret" {{ $reader->gender == 'secret' ? 'checked' : '' }} required> Secret</label>
                                </div>
                            </div>
                            <div class="form-group" style="color: black">
                                <label for="total_num_books_borrowed" class="col-sm-2 control-label">Total num books borrowed:</label>
                                <div class="col-sm-10">
                                    <input type="number" name="total_num_books_borrowed" id="total_num_books_borrowed" class="form-control" value="{{ $reader->total_num_books_borrowed }}" required>
                                </div>
                            </div>

                            <div class="form-group" style="color: black">
                                <label for="birthday" class="col-sm-2 control-label">Birthday:</label>
                                <div class="col-sm-10">
                                    <input type="date" name="birthday" id="birthday" class="form-control" value="{{ $reader->birthday }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn" style="background: #00a6b2;">Update Reader</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
