<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ajax|CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
    <section class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-header"> Laravel CRUD with Ajax
                    <div id="message" class="bg-primary text-whitte p-2 text-center text-white"></div>
                </div>
                <div class="card-body">
                    <form action="" id="updateForm" enctype="multipart/form-data">
                      @csrf
                        <div class="form-group m-3">
                            <label for="name"> User Name </label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $student[0]->name }}">
                            {{-- <input type="text" class="form-control" name="name" id="name" value="{{ $student->name }}"> --}}
                        </div>
                        <div class="form-group m-3">
                            <label for="email"> User Email </label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ $student[0]->email }}">
                        </div>
                        <div class="form-group m-3">
                            <label for="image"> Photo </label>
                            <input type="file" class="form-control-file" name="image" id="image">
                        </div>
                        <div class="form-group m-3">
                            <label for="image">  </label>
                            <input type="hidden" class="form-control-file" name="id" vavalue="{{ $student[0]->id }}">
                        </div>
                        <div class="form-group m-3">
                         <input type="submit" value="Update Student" class="btn btn-primary" id="submitBtn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function(){

            $('#updateForm').submit(function (e) {
                e.preventDefault();
                var form = $('updateForm')[0];
                var data = new FormData(form);
              })

            $.ajax({
            type: "POST",
            url: "{{ route('updateUser') }}",
            data: "data",
            dataType: "dataType",
            processData: false,
            contentType:false,
            success: function (response) {
                $('#message').show();
                $('#message').text(response.result);
            },
            error: function(e){
                console.log(e.responseText);
            }
        });
        })

    </script>
</body>

</html>
