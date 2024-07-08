@extends('Adminn')
@section('admin_content')
    <link rel="stylesheet" href="public/css/all.css">

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading" style="color: black; font-weight: bold; background-color: #c3e6cd; border-radius: 10px; display: flex; align-items: center; padding: 10px;">
                    <a href="{{ route('add-loan') }}" style="text-decoration: none;">
                        <i class="fa fa-plus-square"></i>
                    </a>
                    <span style="flex-grow: 1; text-align: center;">Loan List</span>
                </header>

                <br>
                <style>
                    .table-background {
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
                <div class="panel-body table-background">
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th style="color: #000;">Loan ID</th>
                            <th style="color: #000;">Borrowed Day</th>
                            <th style="color: #000;">Return Day</th>
                            <th style="color: #000;">Books borrowed</th>
                            <th style="color: #000;">Book Name</th>
                            <th style="color: #000;">Book Image</th>
                            <th style="color: #000;">Reader Name</th>
                            <th style="color: #000;">Phone Number</th>
                            <th style="color: #000;">Email</th>
                            <th style="color: #000;">Birthday</th>
                            <th style="color: #000;">Status</th>
                            <th style="color: #000;">Edit</th>
                            <th style="color: #000;">DL</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all_loan as $loan)
                            <tr>
                                <td style="color: #000;">{{ $loan->loan_id }}</td>
                                <td style="color: #000;">{{ $loan->borrowed_day }}</td>
                                <td style="color: #000;">{{ $loan->return_day }}</td>
                                <td style="color: #000;">{{ $loan->num_books_on_loan }}</td>
                                <td style="color: #000;">{{ $loan->book->book_name }}</td>
                                <td>
                                    <img style="height:50px;width:50px" src="{{ asset('/GD/'.$loan->book->image) }}" alt="image">
                                </td>
                                <td style="color: #000;">{{ $loan->reader->name }}</td>
                                <td style="color: #000;">{{ $loan->reader->phone }}</td>
                                <td style="color: #000;">{{ $loan->reader->email }}</td>
                                <td style="color: #000;">{{ $loan->reader->birthday }}</td>
                                <td>
                                    @if($loan->status === 'borrowing')
                                        <div>{{ $loan->status }}</div>
                                        <div>
                                            <button type="button" class="btn btn-primary change-status-btn" data-loan-id="{{ $loan->loan_id }}">Change Status</button>
                                            <form action="{{ route('save-status', $loan->loan_id) }}" method="POST" class="status-form" style="display: none;">
                                                @csrf
                                                <select name="status" class="form-control status-dropdown">
                                                    <option value="">Choice</option>
                                                    <option value="returned">Returned</option>
                                                    <option value="overdue">Overdue</option>
                                                </select>
                                            </form>
                                        </div>
                                    @else
                                        <div>{{ $loan->status }}</div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('edit-loan', $loan->loan_id) }}" class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active" style="font-size: 20px"></i>
                                    </a>
                                </td>
                                <td>
                                    <a onclick="return confirm('Are you sure to delete?')" href="{{ route('delete-loan', $loan->loan_id) }}" class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-trash text-danger text-active" style="font-size: 20px"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    <script>
        document.querySelectorAll('.change-status-btn').forEach(function(button) {
            button.addEventListener('click', function() {
                const loanId = this.getAttribute('data-loan-id');
                const form = this.nextElementSibling;
                const dropdown = form.querySelector('.status-dropdown');

                form.style.display = 'block';
                dropdown.addEventListener('change', function() {
                    form.submit();
                    button.style.display = 'none'; // Ẩn nút Change Status sau khi cập nhật
                });
            });
        });

    </script>
@endsection
