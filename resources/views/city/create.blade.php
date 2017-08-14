@extends('layouts/admin')


@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style media="screen">
      table thead tr th ,
      table tbody tr td {
        text-align: center;
      }



    </style>
@endsection


@section('content')

    <form class="" action="\storecity" method="post">
        {{csrf_field()}}
        <label for="name"> اسم المدينه : </label>
        <input type="text" class="form-control" id="cityName" name="city_name" required>
        <br />
        <select id="touristType" class="form-control" id="touristType" name="tourist_type">
          @if($tourist_types != null)
              @foreach($tourist_types as $tourist_type)
                <option value="{{$tourist_type->id}}">{{$tourist_type->type_name}}</option>
              @endforeach
          @endif
        </select>
        <br />
        <input id="saveCity" class="btn" type="submit" name="submit" value="اضافه ">
    </form>
    <table class="table table-hover">
        <thead>
          <tr>
            <th>اسم المدينه </th>
            <th>تعديل </th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody id="cityData">
          @if($citys != null)
            @foreach($citys as $city)
                <tr>
                    <td>{{ $city->city_name }}</td>
                    <td><button onclick="popup('{{ $city->city_name }}' , {{$city->id}} )" class="btn btn-primary" type="button" name="button">تعديل</button></td>
                    <td><button onclick="deletecity({{$city->id}})" class="btn btn-danger" type="button" name="button">حذف</button></td>
                </tr>
            @endforeach
          @endif

        </tbody>
    </table>




    <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>تعديل اسم المدينه </h2>
    </div>
    <div id="modelBody" class="modal-body">

        <input class="form-control" type="text" id="name_" name="cityname" required>
        <input type="hidden" id="cityId" name="cityid">
        <button id="sub" class="btn btn-primary" name="" >تعديل</button>

    </div>
    <div class="modal-footer">
      <h3>دار الوعد للسياحه </h3>
    </div>
  </div>

</div>
@endsection

@section('script')
<script type="text/javascript">

    $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $(document).ready(function(){

      $('#touristType').on('change', function() {

        $.ajax({
          type: "post" ,
          url : "\\admin\\getcitys" ,
          data : {
            "id":this.value
           },
          success : function(data){
            $('#tuorist_citys').html("") ;
            data = JSON.parse(data);
            $('#cityData').html(" ");
            for (var i = 0; i < data.length; i++) {
              var row = '<tr><td>'+data[i].city_name +'</td>  <td><button class="btn btn-primary" type="button" name="button">تعديل</button></td><td><button onclick="deletecity('+ data[i].id + ')" class="btn btn-danger" type="button" name="button">حذف</button></td></tr>' ;

              $('#cityData').append(row) ;
          }
        }
       }) ;
     });

      $('#saveCity').click(function(event) {
        event.preventDefault();
        var cityName = $('#cityName').val() ;
        var touristType = $("#touristType").val() ;

        $.ajax({
          type: "post" ,
          url : "\\admin\\storecity" ,
          data : {
            "addCity" : 1 ,
            "city_name" : cityName ,
            "tourist_type" : touristType
           },
          success : function(data){
            data = JSON.parse(data);
            $('#cityData').html(" ");
            for (var i = 0; i < data.length; i++) {
              var row = '<tr><td>'+data[i].city_name +'</td>  <td><button onclick="popup(\''+ data[i].city_name+'\' ,'+data[i].id+' )"  class="btn btn-primary" type="button" name="button">تعديل</button></td><td><button onclick="deletecity('+ data[i].id + ')" class="btn btn-danger" type="button" name="button">حذف</button></td></tr>' ;

              $('#cityData').append(row) ;
            }
          }
        });
      });

      $("#sub").click(function(e) {
      var url = "\\admin\\updatecity"; // the script where you handle the form input.
      name = $('#name_').val() ;
      id = $("#cityId").val() ;

      $.ajax({
             type: "POST",
             url: url,
             data: {
               'id': id ,
               'name' : name
             }, // serializes the form's elements.
             success: function(data)
             {
               $('#cityData').html(" ");
               for (var i = 0; i < data.citys.length; i++) {
                 var row = '<tr><td>'+data.citys[i].city_name +'</td>  <td><button onclick="popup(\''+data.citys[i].city_name+'\' , '+data.citys[i].id+' )"  class="btn btn-primary" type="button" name="button">تعديل</button></td><td><button onclick="deletecity('+ data.citys[i].id + ')" class="btn btn-danger" type="button" name="button">حذف</button></td></tr>' ;
                 $('#cityData').append(row) ;
               }
                 alert(data.message); // show response from the php script.
                 document.getElementById('myModal').style.display = "none";
             }
           });

      e.preventDefault(); // avoid to execute the actual submit of the form.
  });



    }); //end jquery script

    function deletecity(id) {

     $.ajax({
       type: "post" ,
       url : "\\admin\\destorycity" ,
       data : {
         "id": id
        },
       success : function(data){

        if(data.delete)
        {
           $('#cityData').html(" ");
           for (var i = 0; i < data.citys.length; i++) {
             var row = '<tr><td>'+data.citys[i].city_name +'</td>  <td><button onclick="popup(\''+data.citys[i].city_name+'\' , '+data.citys[i].id+' )"  class="btn btn-primary" type="button" name="button">تعديل</button></td><td><button onclick="deletecity('+ data.citys[i].id + ')" class="btn btn-danger" type="button" name="button">حذف</button></td></tr>' ;
             $('#cityData').append(row) ;
           }

        }
          alert(data.message) ;

       }
     });
   }


   // Get the modal
   var modal = document.getElementById('myModal');

   // Get the button that opens the modal
   var btn = document.getElementById("myBtn");

   // Get the <span> element that closes the modal
   var span = document.getElementsByClassName("close")[0];

   // When the user clicks the button, open the modal
  function popup(cityName , cityId) {
      document.getElementById('name_').setAttribute('value' , cityName);
      document.getElementById('cityId').setAttribute('value' , cityId);
       modal.style.display = "block";
   }




   // When the user clicks on <span> (x), close the modal
   span.onclick = function() {
       modal.style.display = "none";
   }

   // When the user clicks anywhere outside of the modal, close it
   window.onclick = function(event) {
       if (event.target == modal) {
           modal.style.display = "none";
       }
   }


</script>
@endsection
