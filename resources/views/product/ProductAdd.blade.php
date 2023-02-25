<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>

<body>

    <div class="container">
        <form method="POST" action="AddProduct" class="my-5">
            @csrf
            <h1>Add Product</h1>
            <hr> <br>
            <div class="d-flex">
                <label for="name">Name : &nbsp;</label>
                <input type="text" name="name" class="form-control w-75">
            </div>
            @if ($errors->has('name'))
                <div class="alert m-0 p-0 alert-danger">
                    <ul>
                        @foreach ($errors->get('name') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <br>
            <div class="d-flex">
                <label for="price">price : &nbsp;&nbsp;</label>
                <input type="number" name="price" class="form-control w-75">
            </div>
            @if ($errors->has('price'))
                <div class="alert m-0 p-0 alert-danger">
                    <ul>
                        @foreach ($errors->get('price') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <br>
            <div class="d-flex">
                <label for="detail">Detail : &nbsp;</label>
                <input type="text" name="detail" class="form-control w-75">
            </div>
            @if ($errors->has('detail'))
                <div class="alert m-0 p-0 alert-danger">
                    <ul>
                        @foreach ($errors->get('detail') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <br>
            <button type="submit" class="btn btn-dark">submit</button>
        </form>
    </div>
</body>

</html>
