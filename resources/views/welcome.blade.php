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
                        <form action="{{ url('/') }}" class="form-horizontal" method="post">
                            @csrf
                        <div class="form-group-sm">

                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="provinsi" class="float-left">Provinsi Asal</label>
                                     <select name="province_origin" class="form-control">
                                         <option value="" selected="selected">--Pilih Provinsi Pengiriman--</option>
                                         <option value="" disabled>---------------------------</option>
                                         @foreach ($provinces as $provinsi => $value)
                                             <option value="{{ $provinsi }}">{{ $value }}</option>
                                         @endforeach
                                     </select>
                                </div>
                            </div>

                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="kota" class="float-left">Kota Asal</label>
                                     <select name="city_origin" class="form-control">
                                         <option value="" selected="selected">--Pilih Kota Pengiriman--</option>
                                     </select>
                                </div>
                            </div>

                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="provinsi" class="float-right">Provinsi Tujuan</label>
                                    <select name="province_destination" class="form-control">
                                        <option value="" selected="selected">--Pilih Provinsi Tujuan--</option>
                                        <option value="" disabled>---------------------------</option>
                                        @foreach ($provinces as $provinsi => $value)
                                             <option value="{{ $provinsi }}">{{ $value }}</option>
                                         @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="city"class="float-right">Kota Tujuan</label>
                                    <select name="city_destination" class="form-control">
                                        <option value="">--Pilih Kota Tujuan--</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="courier">Courier Pilihan</label>
                                     <select name="courier" id="courier" class="form-control">
                                         <option value="" selected="selected">--Pilih Courier Pengiriman--</option>
                                         <option value="" disabled>---------------------------</option>
                                         @foreach ($couriers as $courier => $value)
                                            <option value="{{ $courier }}">{{ $value }}</option>
                                        @endforeach
                                     </select>
                                </div>
                            </div>

                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="berat">Berat Package (Kg)</label>
                                     <input type="number" name="weight" id="" class="form-control" placeholder="Dalam Kg">
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
                            $('select[name="city_origin"]').empty();
                            $.each(data, function(key,value){
                                $('select[name="city_origin"]').append('<option value="'+key+'">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="city_origin"]').empty();
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
                            $('select[name="city_destination"]').empty();
                            $.each(data, function(key,value){
                                $('select[name="city_destination"]').append('<option value="'+key+'">' + value + '</option>');
                            });
                        },
                    })
                } else {
                    $('select[name="city_destination"]').empty();
                }
            });
        });
    </script>

</body>
</html>