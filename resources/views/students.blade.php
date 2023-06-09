<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>all-students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
  <body>

    <section class="py-5">
        <div class="container">
            <table class="table" id="students-table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Action </th>
                  </tr>
                </thead>
                <tbody>



                </tbody>
              </table>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $.ajax({
                type: "GET",
                url: "{{ route('getStudents') }}",

                success: function (response) {
                    // console.log(response);
                    if(response.students.length > 0){
                        for(let i = 0; i < response.students.length; i++){
                           let img = response.students[i]['image'];
                            $('#students-table').append(`
                              <tr>
                                <td> `+(i+1)+` </td>
                                <td>`+(response.students[i]['name'])+`</td>
                                <td>`+(response.students[i]['email'])+`</td>
                                <td>Photo</td>
                                <td>
                                    <a href="editUser/`+(response.students[i]['id'])+`"> Edit </a>
                                    <a class="deleteData" data-id="deleteUser/`+(response.students[i]['id'])+`"> Delete </a>
                                </td>

                             </tr>

                            `);

                        }
                    }else{
                        $('#students-table').append("<tr> <td colspan='4'> Data not found </td> </tr>")
                    }
                },
                error: function(e){
                    console.log(e.responseText);
                }
            });

           $("#students-table").on("click",".deleteData", function(){
               var userID = $(this).attr('data-id');
               var obj = $(this);
               $.ajax({
                type: "GET",
                url: "delete-data/"+userID,

                success: function (response) {
                    $(obj).parent().parent().remove()
                    $('#message').show();
                    $('#message').text(response.result);
                },error:function(e){
                    console.log(e.responseText);
                }
               });
           })
        })
    </script>

</body>
</html>
