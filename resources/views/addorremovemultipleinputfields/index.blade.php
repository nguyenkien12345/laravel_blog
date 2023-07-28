<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Or Remove Multiple Input Fields In Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container d-flex justify-content-center pt-5">
        <div class="col-md-12">

            <h2 class="text-center pb-3 text-danger">Add Or Remove Multiple Input Fields In Laravel</h2>

            <form action="{{route('add-remove-multiple-input-fields.post')}}" method="POST">
                @csrf
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(Session::has('success'))
                <div class="alert alert-success text-center">
                    <p>{{ Session::get('success') }}</p>
                </div>
                @endif

                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Description</th>
                            <th>Product Sales</th>
                            <th>Product Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td><input type="text" name="inputs[0][name]" class="form-control"
                                    placeholder="Enter product name: "></td>
                            <td><input type="text" name="inputs[0][price]" class="form-control"
                                    placeholder="Enter product price: "></td>
                            <td><input type="text" name="inputs[0][description]" class="form-control"
                                    placeholder="Enter product description: ">
                            </td>
                            <td><input type="text" name="inputs[0][sales]" class="form-control"
                                    placeholder="Enter product sales: "></td>
                            <td><input type="text" name="inputs[0][stock]" class="form-control"
                                    placeholder="Enter product stock: "></td>
                            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                        </tr>
                    </tbody>
                </table>

                <button type="submit" class="btn btn-primary col-md-2">Save</button>
            </form>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script>
        let i = 0;
        $('#add').click(function() {
            ++i;
            $('#table tbody').append(
                ` <tr>
                    <td><input type="text" name="inputs[${i}][name]" class="form-control" placeholder="Enter product name: "></td>
                    <td><input type="text" name="inputs[${i}][price]" class="form-control" placeholder="Enter product price: "></td>
                    <td><input type="text" name="inputs[${i}][description]" class="form-control" placeholder="Enter product description: ">
                    </td>
                    <td><input type="text" name="inputs[${i}][sales]" class="form-control" placeholder="Enter product sales: "></td>
                    <td><input type="text" name="inputs[${i}][stock]" class="form-control" placeholder="Enter product stock: "></td>
                    <td><button type="button" class="btn btn-danger remove-selected-row">Remove</button></td>
                </tr>`
            )
        });

        $(document).on('click', '.remove-selected-row' ,function() {
            $(this).parents('tr').remove();
        })
    </script>
</body>

</html>