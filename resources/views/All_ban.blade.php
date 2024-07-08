@extends('Adminn')
@section('admin_content')
    <link rel="stylesheet" href="public/css/all.css">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading" style="color: black; font-weight: bold; background-color: #c3e6cd; border-radius: 10px; display: flex; align-items: center; padding: 10px;">
                    <a href="{{ route('add-ban') }}" style="text-decoration: none;">
                        <i class="fa fa-plus-square"></i>
                    </a>
                    <span style="flex-grow: 1; text-align: center;">Ban List</span>
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
                    <table class="table table-striped b-t b-light ">
                        <thead>
                        <tr>
                            <th style="color: #000;">Ban ID</th>
                            <th style="color: #000;">Ban Name</th>
                            <th style="color: #000;">Fines</th>
                            <th style="color: #000;">Borrowed Day</th>
                            <th style="color: #000;">Return Day</th>
                            <th style="color: #000;">Book Name</th>
                            <th style="color: #000;">Book Image</th>
                            <th style="color: #000;">Reader Name</th>
                            <th style="color: #000;">Birthday</th>
                            <th style="color: #000;">Email</th>
                            <th style="color: #000;">Edit</th>
                            <th style="color: #000;">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all_ban as $ban)
                            <tr>
                                <td style="color: #000;">{{ $ban->ban_id }}</td>
                                <td style="color: #000;">{{ $ban->ban_name }}</td>
                                <td style="color: #000;">{{ $ban->fines }}</td>
                                <td style="color: #000;">{{ $ban->loan->borrowed_day }}</td>
                                <td style="color: #000;">{{ $ban->loan->return_day }}</td>
                                <td style="color: #000;">{{ $ban->loan->book->book_name }}</td>
                                <td>
                                    <img style="height:100px;width:100px" src="{{ asset('/GD/' . $ban->loan->book->image) }}" alt="image">
                                </td>
                                <td style="color: #000;">{{ $ban->loan->reader->name }}</td>
                                <td  style="color: #000;">{{ $ban->loan->reader->birthday }}</td>
                                <td  style="color: #000;">{{ $ban->loan->reader->email }}</td>
                                <td>
                                    <a href="{{ route('edit-ban', $ban->ban_id) }}" class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active" style="font-size: 20px"></i>
                                    </a>
                                </td>
                                <td>
                                    <a onclick="return confirm('Are you sure to delete?')" href="{{ route('delete-ban', $ban->ban_id) }}" class="active styling-edit" ui-toggle-class="">
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
@endsection
