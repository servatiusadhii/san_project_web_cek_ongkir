<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Cek Ongkirmu</title>
  </head>
  <body>
      
    <div class="container my-4">
        <h2 class="text-center my-4">Tarif Kiriman Package 2021</h2>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center">Tarif Terbaru Ekpedisi per <b style="color: red"><?=date('d/M/Y')?></b>
                    <div class="card-body">
                        <form action="{{ url('/submit') }}" class="form-horizontal" method="post">
                            @csrf
                        <div class="form-group-sm">
                            <div class="row">

                                <div class="col-sm-12">
                                    <h6 class="text-left">Nama Anda</h6>
                                    <div class="form-group">
                                        <input name="name" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <h6 class="text-left">Nama Penerima</h6>
                                    <div class="form-group">
                                        <input name="rname" type="text" class="form-control" required>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h6>Origin Shipment</h6>
                                    <div class="form-group">
                                        <select name="province_origin" id="province" class="form-control">
                                            <option value="" selected="selected">Pilih Provinsi Asal</option>
                                            <option value="" disabled>--------------------</option>
                                            @foreach($provinces as $province => $value)
                                            <option value="{{$province}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
        
                                    <div class="form-group">
                                        <select name="origin" id="origin" class="form-control" required>
                                            <option value="" holder>Pilih Kota Asal</option>
                                        </select>
                                    </div>
                                </div>
        
                                <div class="col-sm-6">
                                    <h6>Destination Shipment</h6>
                                    <div class="form-group">
                                        <select name="province_destination" id="province" class="form-control">
                                            <option value="" selected="selected">Pilih Provinsi Tujuan</option>
                                            <option value="" disabled>--------------------</option>
                                            @foreach($provinces as $province => $value)
                                            <option value="{{$province}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
        
                                    <div class="form-group">
                                        <select name="destination" id="destination" class="form-control" required>
                                            <option value="" holder>Pilih Kota Tujuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
        
                            <div class="row">
                                <div class="col-sm-6">
                                    <h6>Weight Package</h6>
                                    <div class="form-group">
                                        <input name="weight" type="number" class="form-control" required>
                                        <small class="text-danger float-left mb-4">Berat Paket dalam Kilogram (Kg)</small>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h6>Pilih Kurir</h6>
                                    <select name="courier" required class="form-control">
                                        <option value="" selected="selected">Pilih Kurir</option>
                                        <option value="" disabled>--------------------</option>
                                        <option value="jne">JNE</option>
                                        <option value="tiki">TIKI</option>
                                        <option value="pos">POS</option>
                                    </select>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary dropright form-control rounded-pill">Submit</button>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    {{-- Ajak Skill Dropdown Selected Chained --}}
    <script>
        $(document).ready(function(){
            $('select[name="province_origin"]').on('change', function(){
                let provinceId = $(this).val();
                if(provinceId){
                    jQuery.ajax({
                        url: '/province/'+provinceId+'/cities',
                        type: "GET",
                        dataType: "json",
                        success:function(data){
                            $('select[name="origin"]').empty();
                            $.each(data, function(key,value){
                                $('select[name="origin"]').append('<option value="'+key+'">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="origin"]').empty();
                }
            });
            $('select[name="province_destination"]').on('change', function(){
                let provinceId = $(this).val();
                if(provinceId){
                    jQuery.ajax({
                        url: '/province/'+provinceId+'/cities',
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            console.log(data)
                            $('select[name="destination"]').empty();
                            $.each(data, function(key,value){
                                $('select[name="destination"]').append('<option value="'+key+'">' + value + '</option>');
                            });
                        },
                    })
                } else {
                    $('select[name="destination"]').empty();
                }
            });
        });
    </script>

</body>
</html>