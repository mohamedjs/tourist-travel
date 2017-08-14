@extends('layouts.admin')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
    @if(Session::has('success'))
        <div class="alter-box success">
          <h2><p class="bg-primary" >{!! Session::get('success') !!}</p></h2>
        </div>
    @endif

    <select id="touristType"  class="form-control" name="touristType">
        @if($tourist_types != null || $tourist_types > 0)
          @foreach($tourist_types as $tourist_type)
              <option value="{{$tourist_type->id}}"onclick="getTourist('tourist{{$tourist_type->id}}')" id="tourist{{$tourist_type->id}}">{{ $tourist_type->type_name }}</option>
          @endforeach
        @endif
    </select>

    <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'London')">اضافه</button>
      <button class="tablinks" onclick="openCity(event, 'Paris')">حذف و تعديل</button>
    </div>

    <div id="London" class="tabcontent">


        <form class="form-horizontal" method="post" action="storeoffer" enctype="multipart/form-data">
          {{csrf_field()}}

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">الفندق:</label>
          <div class="col-sm-10">
            <input name="hotel" type="text" class="form-control" id="email" placeholder="ادخل اسم الفندق" required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">عدد النجوم :</label>
          <div class="col-sm-10">
            <input type="number" name="stars_num" class="form-control" id="email" max="7" min="1" required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">عدد الأيام :</label>
          <div class="col-sm-10">
            <input type="number" name="days_num" class="form-control" max="7" min="1" required>
          </div>
        </div>

        <div class="form-group" id="priceContent">
          <label class="control-label col-sm-2" for="email">الاسعار :</label>
          <div class="col-sm-5">
            <input type="text" name="pricename[]" class="form-control" placeholder="نوع الغرفه" required>
          </div>
          <div class="col-sm-5">
            <input type="number" name="pricevalue[]" class="form-control" placeholder="السعر " required>
          </div>
        </div>
        <button class="btn btn-primary" type="button" onclick="addNewInputPrice()" name="button"> + </button><br />

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">المدينه :</label>
          <div class="row">
            <div class="col-xs-5">
              <div class="form-group">
                <select id="tuorist_citys" name="city" class="selectpicker form-control" data-live-search=true>
                  @if($citys != null)
                    @foreach ($citys as $city)
                      <option value="{{$city->id}}">{{$city->city_name}}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>
          </div>
        </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="email">وصف العرض :</label>
            <div class="col-sm-10">
              <textarea name="content" class="form-control" rows="8" cols="80" required></textarea>
            </div>
          </div>


          <div class="form-group">
            <label  class="control-label col-sm-2" for="pwd">العرض يحتوى على :</label>
            <div class="col-sm-10" id="content_of">
              <input type="text" name="content_of[]" class="form-control" required >
            </div>
          </div>
        <button class="btn btn-primary" type="button" onclick="addNewinput('content_of')" name="button"> + </button><br />

        <div class="form-group">
          <label  class="control-label col-sm-2" for="pwd">العرض لا يحتوى على :</label>
          <div class="col-sm-10" id="notContent_of">
            <input type="text" name="notContent_of[]" class="form-control" required>
          </div>
        </div>
      <button class="btn btn-primary" type="button" onclick="addNewinput('notContent_of')" name="button"> + </button><br />

      @if(Session::has('error'))
          <p>{!! Session::get('error') !!}</p>
      @endif

      <div class="form-group">
            <label class="col-md-3 control-label">Upload Images :</label>
                <div class="col-md-8">
                    <input type="file" id="file" class="btn btn-primary" name="images[]" multiple required min="7"/>
                </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
          </div>
        </div>
      </form>
    </div>

    <div id="Paris" class="tabcontent">
      <select id="tuorist_citys_Edit" name="city" class="selectpicker form-control" data-live-search=true>
        @if($citys !=null)
          @foreach ($citys as $city)
            <option value="{{$city->id}}">{{$city->city_name}}</option>
          @endforeach
        @endif
      </select>

      <table class="table table-hover">
        <thead>
          <tr>
            <th>م</th>
            <th>صوره</th>
            <th>السعر </th>
            <th>الفندق</th>
            <th> تعديل </th>
            <th> حذف </th>
          </tr>
        </thead>
        <tbody id="offerTable">
          @if($offers != null)
            @foreach($offers as $offer)
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><button onclick="popup(' $city->city_name }}' , $city->id}} )" class="btn btn-primary" type="button" name="button">تعديل</button></td>
                  <td><button onclick="deleteoffer({{$offer->id}})" class="btn btn-danger" type="button" name="button">حذف</button></td>
              </tr>
            @endforeach
          @endif

        </tbody>
      </table>
    </div>

    <!-- <select id="touristType"  class="form-control" name="touristType">
        @foreach($tourist_types as $tourist_type)
            <option value="{{$tourist_type->id}}"onclick="getTourist('tourist{{$tourist_type->id}}')" id="tourist{{$tourist_type->id}}">{{ $tourist_type->type_name }}</option>
        @endforeach
    </select>

    <form class="form-horizontal" method="post" action="/storeoffer" enctype="multipart/form-data">
      {{csrf_field()}}

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">الفندق:</label>
      <div class="col-sm-10">
        <input name="hotel" type="text" class="form-control" id="email" placeholder="ادخل اسم الفندق">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">عدد النجوم :</label>
      <div class="col-sm-10">
        <input type="number" name="stars_num" class="form-control" id="email" max="7" min="1">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">عدد الأيام :</label>
      <div class="col-sm-10">
        <input type="number" name="days_num" class="form-control" max="7" min="1">
      </div>
    </div>

    <div class="form-group" id="priceContent">
      <label class="control-label col-sm-2" for="email">الاسعار :</label>
      <div class="col-sm-5">
        <input type="text" name="pricename[]" class="form-control" placeholder="نوع الغرفه">
      </div>
      <div class="col-sm-5">
        <input type="number" name="pricevalue[]" class="form-control" placeholder="السعر ">
      </div>
    </div>
    <button class="btn btn-primary" type="button" onclick="addNewInputPrice()" name="button"> + </button><br />

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">المدينه :</label>
      <div class="row">
        <div class="col-xs-5">
          <div class="form-group">
            <select id="tuorist_citys" name="city" class="selectpicker form-control" data-live-search=true>
              @foreach ($citys as $city)
                <option value="{{$city->id}}">{{$city->city_name}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
    </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="email">وصف العرض :</label>
        <div class="col-sm-10">
          <textarea name="content" class="form-control" rows="8" cols="80"></textarea>
        </div>
      </div>


      <div class="form-group">
        <label  class="control-label col-sm-2" for="pwd">العرض يحتوى على :</label>
        <div class="col-sm-10" id="content_of">
          <input type="text" name="content_of[]" class="form-control" >
        </div>
      </div>
    <button class="btn btn-primary" type="button" onclick="addNewinput('content_of')" name="button"> + </button><br />

    <div class="form-group">
      <label  class="control-label col-sm-2" for="pwd">العرض لا يحتوى على :</label>
      <div class="col-sm-10" id="notContent_of">
        <input type="text" name="notContent_of[]" class="form-control" >
      </div>
    </div>
  <button class="btn btn-primary" type="button" onclick="addNewinput('notContent_of')" name="button"> + </button><br />

  @if(Session::has('error'))
      <p>{!! Session::get('error') !!}</p>
  @endif

  <div class="form-group">
        <label class="col-md-3 control-label">Upload Images :</label>
            <div class="col-md-8">
                <input type="file" id="file" class="btn btn-primary" name="images[]" multiple />
            </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form> -->

@endsection

@section('script')
    <script type="text/javascript">
    function addNewinput(parentId){
      console.log(parentId);
      var contentOf = document.getElementById(parentId);
      var input = document.createElement('input');

      /****** set input attribute  ********/
      input.setAttribute('name',parentId+'[]');
      input.setAttribute('type','text');
      input.setAttribute('class','form-control');
      input.setAttribute('style','margin-top:5px;');
      input.setAttribute('text-align','center');
      input.setAttribute('required','');

      contentOf.appendChild(input);
    }

    function addPriceInput(type,name){
      var input = document.createElement('input');

      /****** set input attribute  ********/
      input.setAttribute('name',name +'[]');
      input.setAttribute('type',type);
      input.setAttribute('class','form-control');
      input.setAttribute('style','margin-top:5px;');
      input.setAttribute('required','');

      return input ;
    }

    function addNewInputPrice(){
      var contentOf = document.getElementById('priceContent');
      var priceName = addPriceInput('text','pricename');
      var priceValue = addPriceInput('number','pricevalue');
      var nameContent = document.createElement('div') ;
      nameContent.setAttribute('class','col-sm-5');
      nameContent.appendChild(priceName);

      var valueContent = document.createElement('div') ;
      valueContent.setAttribute('class','col-sm-5');
      valueContent.appendChild(priceValue);

      contentOf.appendChild(nameContent);
      contentOf.appendChild(valueContent);
    }
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
            $('#tuorist_citys_Edit').html("");
            data = JSON.parse(data);
            for (var i = 0; i < data.length; i++) {
              var option = '<option value="'+data[i].id+'">'+data[i].city_name+'</option>' ;
              $('#tuorist_citys').append(option)
              $('#tuorist_citys_Edit').append(option);

            }
          }
        });
       }) ;

       $('#tuorist_citys_Edit').on('change', function() {
         alert('change') ;
         id = this.value ;
         $.ajax({
           type: "post" ,
           url : "\\admin\\getoffers" ,
           data : {
             "id":this.value
            },
            dataType: 'json' ,
           success : function(data){

             data = JSON.parse(data);
             $('#offerTable').html("");
             alert(data.length);
             for (var i = 0; i < data.length; i++) {
               var row = '<tr>' +
                   '<td> ' + i + ' </td>' +
                   '<td> فاضيه </td>' +
                   '<td>'+ data[i].hotel+'</td>' +
                   '<td>'+ data[i].stars_num+'</td>' +

                   '<td><button class="btn btn-primary" type="button" name="button">تعديل</button></td>' +
                   '<td><button onclick="deleteoffer('+data[i].id+')" class="btn btn-danger" type="button" name="button">حذف</button></td>' +
               '</tr>' ;
               $('#offerTable').append(row) ;

             }
           }
         });

        }) ;
    });

    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
  }

        //document.getElementById('ht').innerHTML = contentOf.getAttribute('id') ;



        function deleteoffer(id) {

         $.ajax({
           type: "post" ,
           url : "\\admin\\destoryoffer_" ,
           data : {
             "id": id
            },
           success : function(data){

             data = JSON.parse(data);
             $('#offerTable').html("");
             alert(data.length);
             for (var i = 0; i < data.length; i++) {
               var row = '<tr>' +
                   '<td> ' + i + ' </td>' +
                   '<td> فاضيه </td>' +
                   '<td>'+ data[i].hotel+'</td>' +
                   '<td>'+ data[i].stars_num+'</td>' +

                   '<td><button class="btn btn-primary" type="button" name="button">تعديل</button></td>' +
                   '<td><button onclick="deleteoffer('+data[i].id+')" class="btn btn-danger" type="button" name="button">حذف</button></td>' +
               '</tr>' ;
               $('#offerTable').append(row) ;

             }
             alert('تم المسح');

           }
         });
       }
    </script>
@endsection
<!-- end section script -->
