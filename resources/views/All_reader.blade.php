
@extends('Adminn')
@section('admin_content')
    <link rel="stylesheet" href="public/css/all.css">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading" style="color: black; font-weight: bold; background-color: #c3e6cd; border-radius: 10px; display: flex; align-items: center; padding: 10px;">
                    <a href="{{ route('add-reader') }}" style="text-decoration: none;">
                        <i class="fa fa-plus-square"></i>
                    </a>
                    <span style="flex-grow: 1; text-align: center;">Reader List</span>
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
                if($message){
                    echo '<span class="text-alert alert-pink">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <div class="panel-body table-background">
                    <table class="table table-striped b-t b-light ">
                        <thead>
                        <tr style="color: #C26D6D;">
                            <th style="color: #000;">Id</th>
                            <th style="color: #000;">Name</th>
                            <th style="color: #000;">Email</th>
                            <th style="color: #000;">Address</th>
                            <th style="color: #000;">Phone</th>
                            <th style="color: #000;">Gender</th>
                            <th style="color: #000;">Total num books borrowed</th>
                            <th style="color: #000;">birthday</th>
                            <th style="color: #000;">Edit</th>
                            <th style="color: #000;">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all_reader as $key => $reader_pro)
                            <tr>
                                <td style="color: #000;">{{$reader_pro->reader_id}}</td>
                                <td style="color: #000;">{{$reader_pro->name}}</td>
                                <td style="color: #000;">{{$reader_pro->email}}</td>
                                <td style="color: #000;">{{$reader_pro->address}}</td>
                                <td style="color: #000;">{{$reader_pro->phone}}</td>
                                <td style="color: #000;">{{$reader_pro->gender}}</td>
                                <td style="color: #000;">{{$reader_pro->total_num_books_borrowed}}</td>
                                <td style="color: #000;">{{$reader_pro->birthday}}</td>
                                <td>
                                    <a href="{{ route('edit-reader', $reader_pro->reader_id) }}" class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active" style="font-size: 20px"></i>
                                    </a>
                                </td>
                                <td>
                                    <a onclick="return confirm('Are you sure to delete?')" href="{{ route('delete-reader', $reader_pro->reader_id) }}" class="active styling-edit"   ui-toggle-class="">
                                        <i class="fa fa-trash text-danger  text-active "  style="font-size: 20px"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </section>
        </div>
@endsection
