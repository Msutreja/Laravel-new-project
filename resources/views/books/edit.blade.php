<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Book</title>
</head>

<body>
    <style>
    body {
        font-family: 'Lato', sans-serif;
    }

    h1 {
        margin-bottom: 40px;
    }

    label {
        color: #333;
    }

    .btn-send {
        font-weight: 300;
        text-transform: uppercase;
        letter-spacing: 0.2em;
        width: 80%;
        margin-left: 3px;
    }

    .help-block.with-errors {
        color: #ff5050;
        margin-top: 5px;

    }

    .card {
        margin-left: 10px;
        margin-right: 10px;
    }
    </style>
    <div class="container">
        <div class=" text-center mt-5 ">

            <h1>Update Book</h1>


        </div>


        <div class="row ">
            <div class="col-lg-7 mx-auto">
                <div class="card mt-2 mx-auto p-4 bg-light">
                    <div class="card-body bg-light">

                        <div class="container">
                        <form action="{{ route('books.update', ['book' => $book->id]) }}" method="post">
                            @csrf
                            @method('PUT')

                                


                                <div class="controls">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" name="title" class="form-control"
                                                    placeholder="Please enter book title" value="{{ $book->title }}">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Author </label>
                                                <input type="text" name="author" class="form-control"
                                                    placeholder="Please enter author name" value="{{ $book->author }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Published Year</label>
                                                <input type="number" name="published_year" class="form-control"
                                                    placeholder="Please enter published year" value="{{ $book->published_year }}">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Author </label>
                                                <label>Genre</label>
                                                <input type="text" name="genre" class="form-control"
                                                    placeholder="Please enter author name" value="{{ $book->genre }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        
                                        <div class="col-md-12 mt-4">

                                            <input type="submit" class="btn btn-success btn-send  pt-2 btn-block" value="Update Book">

                                        </div>

                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>


                </div>
                

            </div>
           

        </div>
    </div>

</body>

</html>