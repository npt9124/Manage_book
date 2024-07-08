<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* CSS styles here */
    </style>
</head>

<body>
<div class="row" style="color: #C26D6D">
    <div class="col-lg-12">
        <section class="panel">
            <a href="{{ URL::to('all-book') }}" class="btn btn-primary" style="margin-top: 20px;margin-left: 20px">Return </a>
            <header class="panel-heading" style="text-align: center;font-size: 40px;margin-top: 30px">
                Update book
            </header>

            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span class="text-danger">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>

            <div class="panel-body">
                @if ($edit_book)
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/update-book/'.$edit_book->book_id) }}" method="post"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="book_name" style="margin-left: 600px;font-size: 30px">Book name</label>
                                <textarea name="book_name" class="form-control textarea-short"
                                          id="book_name" placeholder="book_name"
                                          style="margin-left: 600px">{{ $edit_book->book_name }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="author_id" style="margin-left: 600px;font-size: 30px">Author</label>
                                <select name="author_id" class="form-control" id="author_id"
                                        style="margin-left: 600px">
                                    @foreach($authors as $author)
                                        <option value="{{ $author->author_id }}"
                                            {{ $author->author_id == $edit_book->author_id ? 'selected' : '' }}>
                                            {{ $author->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price" style="margin-left: 600px;font-size: 30px">Price</label>
                                <textarea name="price" class="form-control textarea-short"
                                          id="price" placeholder="price"
                                          style="margin-left: 600px">{{ $edit_book->price }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="num_of_prints"
                                       style="margin-left: 600px;font-size: 30px">Num of prints</label>
                                <textarea name="num_of_prints" class="form-control textarea-short"
                                          id="num_of_prints" placeholder="num_of_prints"
                                          style="margin-left: 600px">{{ $edit_book->num_of_prints }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="publisher_year"
                                       style="margin-left: 600px;font-size: 30px">Publisher year</label>
                                <textarea name="publisher_year" class="form-control textarea-short"
                                          id="publisher_year" placeholder="publisher_year"
                                          style="margin-left: 600px">{{ $edit_book->publisher_year }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image" style="margin-left: 600px;font-size: 30px">Image</label>
                                <textarea name="image" class="form-control textarea-short"
                                          id="image" placeholder="image"
                                          style="margin-left: 600px">{{ $edit_book->image }}</textarea>
                                <input type="file" name="image" id="image" style="margin-left: 600px">
                            </div>
                            <button type="submit" name="update_reader" class="btn btn-info"
                                    style="margin-left: 600px;font-size: 20px">Update</button>
                        </form>
                    </div>
                @endif
            </div>
        </section>
    </div>
</div>
</body>

</html>
