@extends('Adminn')
@section('admin_content')

    <link rel="stylesheet" href="public/css/add.css">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading" style="background-color: #00a6b2">
                    Edit Loan
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
                        <form method="POST" action="{{ route('update-loan', $loan->loan_id) }}" enctype="multipart/form-data" class="form-horizontal">
                            @csrf

                            <div class="form-group" style="color: black">
                                <label for="reader_name" class="col-sm-2 control-label">Reader Name:</label>
                                <div class="col-sm-10">
                                    <select name="reader_name" class="form-control" required>
                                        @foreach ($readers as $reader)
                                            <option value="{{ $reader->name }}" {{ $reader->name == $loan->reader->name ? 'selected' : '' }}>{{ $reader->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group" style="color: black">
                                <label for="book_name" class="col-sm-2 control-label">Book Name:</label>
                                <div class="col-sm-10">
                                    <select name="book_name" class="form-control" required>
                                        @foreach ($books as $book)
                                            <option value="{{ $book->book_name }}" {{ $book->book_name == $loan->book->book_name ? 'selected' : '' }}>{{ $book->book_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group" style="color: black">
                                <label for="borrowed_day" class="col-sm-2 control-label">Borrowed Day:</label>
                                <div class="col-sm-10">
                                    <input type="date" name="borrowed_day" id="borrowed_day" class="form-control" value="{{ $loan->borrowed_day }}" required>
                                </div>
                            </div>

                            <div class="form-group" style="color: black">
                                <label for="return_day" class="col-sm-2 control-label">Return Day:</label>
                                <div class="col-sm-10">
                                    <input type="date" name="return_day" id="return_day" class="form-control" value="{{ $loan->return_day }}" required>
                                </div>
                            </div>

                            <div class="form-group" style="color: black">
                                <label for="num_books_on_loan" class="col-sm-2 control-label">Num Books on Loan:</label>
                                <div class="col-sm-10">
                                    <input type="number" name="num_books_on_loan" id="num_books_on_loan" class="form-control" value="{{ $loan->num_books_on_loan }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn" style="background: #00a6b2;">Update Loan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
