@extends('Adminn')
@section('admin_content')
    <link rel="stylesheet" href="public/css/add.css">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add Loan
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

                @if (Session::has('message'))
                    <span class="text-alert alert-pink">{{ Session::get('message') }}</span>
                    {{ Session::put('message', null) }}
                @endif

                <div class="panel-body form-background">
                    <div class="position-center">
                        <form method="POST" action="{{ route('save-loan') }}" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="form-group" style="color: black">
                                <label for="reader_name">Reader Name</label>
                                <select name="reader_name" class="form-control" required>
                                    @foreach ($readers as $reader)
                                        <option value="{{ $reader->name }}">{{ $reader->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" style="color: black">
                                <label for="book_name">Book Name</label>
                                <select name="book_name" class="form-control" required>
                                    @foreach ($books as $book)
                                        <option value="{{ $book->book_name }}">{{ $book->book_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" style="color: black">
                                <label for="borrowed_day">Borrowed Day</label>
                                <input type="date" name="borrowed_day" class="form-control" required>
                            </div>
                            <div class="form-group" style="color: black">
                                <label for="return_day">Return Day</label>
                                <input type="date" name="return_day" class="form-control" required>
                            </div>
                            <div class="form-group" style="color: white">
                                <label for="num_books_on_loan">Num Books on Loan</label>
                                <input type="number" name="num_books_on_loan" class="form-control" required>
                            </div>
                            <div class="form-group" style="color: black">
                                <label for="author" class="col-sm-2 control-label">Status:</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly value="borrowing" name="status" id="status" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn " style="background: #00a6b2;">Add loan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
