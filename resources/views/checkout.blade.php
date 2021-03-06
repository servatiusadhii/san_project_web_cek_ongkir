<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Tarif Kiriman Package</title>
  </head>
  <body>
    <h3 class="text-center my-4">Hallo Kawand, Ini Dia Estimasi Tarif Kiriman Paket Mu.</h3>

    <div class="container">
      <div class="card-header text-center rounded-top">Tarif Layanan Ekpedisi per <b style="color: red"><?=date('d/M/Y')?></b></div>
    </div>

    <div class="container">
    <section class="content">
        <div class="row">
              <div class="col-12">
                
                <div class="box">
                  <div class="box-grey" style="background-color: #f3f3f3;
                  -webkit-border-radius: 10px;
                  -moz-border-radius: 10px;
                  border-radius: 10px;
                  padding: 30px;
                  margin: 40px 0px;
              }">
                    <table width="100%" border="0">
                        <tbody>
                          <tr>
                            <td width="100"><strong>Shipper </strong></td>
                            <td><strong>:</strong> {{ $name }}</td>

                            <td width="50"><strong>Consignee </strong></td>
                            <td><strong>:</strong> {{ $rname }}</td>

                            <td width="50"><strong>Ekpedisi </strong></td>
                            <td style="text-transform: uppercase"><strong>:</strong> {{ $courier}}</td>
                          </tr>
                          
                          <tr >
                            <td width="130"><strong>Provinsi<br>Pengiriman </strong></td>
                            <td><strong>:</strong> {{ $provinsi }} </strong></td>

                            <td width="130"><strong>Provinsi<br>Tujuan </strong></td>
                            <td><strong>:</strong> {{ $provinsi }} </strong></td>

                            <td width="100"><strong>Berat (Kg)</strong></td>
                            <td><strong>:</strong> {{ $weight }}</td>
                        </tr>

                        <tr>
                            <td width="130"><strong>Kota<br>Pengiriman </strong></td>
                            <td><strong>:</strong> {{ $origin }} </strong></td>

                            <td width="130"><strong>Kota<br>Tujuan </strong></td>
                            <td><strong>:</strong> {{ $origin }} </strong></td>

                            <td width="130"><strong>Checked At</strong></td>
                            <td><strong>:</strong> <?=date('l, d-m-Y ')?><br>
                            <?php date_default_timezone_set('Asia/Jakarta'); 
                            echo '&nbsp;'.date('h:i:s A') ?></td>
                            
                        </tr>
                        
                        
                    </tbody></table>
                </div>
                  <div class="box-body">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>Nama Layanan</th>
                        <th>Tarif</th>
                        <th>ETD (Estimates Days)</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php for($i=0; $i<count($array["rajaongkir"]["results"][0]["costs"]); $i++){ ?>
                          <tr>
                            <td><?php echo $array["rajaongkir"]["results"][0]["costs"][$i]["service"] ?> </td>
                            <td><?php echo $array["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["value"] ?></td>
                            <td><?php echo $array["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["etd"].' Hari'?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
      </section>

      <br>
        <div class="card-header text-center rounded-top">All <span style="color: orangered;">Data Provided </span> By <span style="color: green">&copy; RajaOngkir.com &copy;</span> Starter Pack</div>
      

    </div>
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> </body>
</html>