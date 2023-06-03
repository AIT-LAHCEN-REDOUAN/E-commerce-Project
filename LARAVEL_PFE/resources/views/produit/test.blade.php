<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
</head>

<body>
    <form action="{{ route('product.store') }}" enctype="multipart/form-data" id="productForm" method="post">
    @csrf

    {{-- Name/Description fields, irrelevant for this article --}}

    <div class="form-group">
        <label for="document">Documents</label>
        <input type="file" name="images[]" id="" class="" multiple>
        </div>
    </div>
    <div>
        <input class="btn btn-danger" type="submit">
    </div>
</form>



</body>

</html>