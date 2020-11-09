<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admistrative Unit</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body class="p-4">
    <div>

      <button class="btn btn-outline-primary" onclick="location.href='{{route('AddressComponent',)}}'">Address Component</button>
      <button class="btn btn-outline-primary" onclick="location.href='{{route('UserInput',)}}'">User Input</button>

      <p style="text-transform: uppercase; font-size: 1.2em; font-weight: bold; padding-top: 1rem;">
        Danh sách đơn vị hành chính
      </p>
      </hr>
      <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">Thêm mới</button>
      </div>
      </hr>
      <div class="d-flex">Tổng số đơn vị hành chính: <p class="pl-2" id="countTable"></p>  </div>
      </hr>
      <table id="table" class="table table-bordered ">
        <thead class="thead-light">
          <tr>
            <th scope="col">Stt</th>
            <th scope="col">Thuộc quốc gia</th>
            <th scope="col">Mã đơn vị hành chính</th>
            <th scope="col">Tên đơn vị hành chính</th>
            <th scope="col">Cấp bậc</th>
            <th scope="col">Loại</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Quản lý</th>
          </tr>
        </thead>
        <tbody>
          
          @if($address !=null)
          <?php foreach($address as $item) :?>
            <tr>
              <th scope="row">1</th>
              <td>{{$item->admistrative_unit_country_code}}</td>
              <td>{{$item->admistrative_unit_code}}</td>
              <td>{{$item->admistrative_unit_name}}</td>
              <td>{{$item->admistrative_unit_address_component_level}}</td>
              <td>{{$item->admistrative_unit_type}}</td>
              <td>{{$item->admistrative_unit_status}}</td>
            </tr>
          <?php endforeach ;?>
          @endif
          
        </tbody>
      </table>
    </div>


    <!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm đơn vị hành chính</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{route('addNewAdmistrativeUnit')}}">
      {{ csrf_field() }}
      <div class="modal-body">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="">Tên đơn vị hành chính: </span>
          </div>
          <input name="admistrative_unit_name" type="text" class="form-control" placeholder="" >
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="">Mã đơn vị hành chính: </span>
          </div>
          <input name="admistrative_unit_code" type="text" class="form-control" placeholder="" >
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="">Mã quốc gia: </span>
          </div>
          <input name="admistrative_unit_country_code" type="text" class="form-control" placeholder="" >
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="">Loại đơn vị hành chính: </span>
          </div>
          <input name="admistrative_unit_type" type="text" class="form-control" placeholder="" >
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="">Cấp bậc đơn vị hành chính: </span>
          </div>
          <select name="admistrative_unit_address_component_level" class="custom-select" id="">
            <option selected value="1">COUNTRY</option>
            <option value="2">PROVINCE</option>
            <option value="3">CITY</option>
            <option value="4">DISTRICT</option>
            <option value="5">TOWNSHIP</option>
            <option value="6">ROUTE</option>
            <option value="7">STREET_NUMBER</option>
          </select>
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="">Thứ tự sắp xếp: </span>
          </div>
          <input name="admistrative_unit_order" type="text" class="form-control" placeholder="" >
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="">Trạng thái: </span>
          </div>
          <select name="unit_status" class="custom-select" id="">
            <option selected value="1">ACTIVE</option>
            <option value="0">UNACTIVE</option>
          </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
<script src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>

<script type="text/javascript">
  var iRowCount = document.getElementById('table').rows.length -1;
  document.getElementById('countTable').innerHTML = iRowCount;
</script>
