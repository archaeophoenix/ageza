<div class="row">
  
  <div class="col-xs-12">
    <div class="card">
      <div class="card-header">Paket Makanan &amp; AddOn T-SEL</div>
      <div class="card-body">
        <div class="section">
          <div class="section-body">
            <div role="tabpanel">
              <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Paket Makanan</a></li>
                  <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">AddOn T-SEL</a></li>
              </ul>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                  <div class="card">
                    <div class="card-header">
                      <label class="control-label col-xs-3">Paket</label>
                      <div class="col-xs-3"></div>
                      <div class="col-xs-3">
                        <select id="limit" class="form-control select2" onchange="paging('limit');">
                          <?php foreach ($limit as $key => $value){ ?>
                          <option rel="index/limit" value="<?php echo $value; ?>" <?php echo (isset($_SESSION['limit']) && $_SESSION['limit'] == $value) ? 'selected="selected"' : '' ; ?>><?php echo $value; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="col-xs-3">
                        <select id="param" class="form-control select2" onchange="paging('param');">
                          <option rel="index/sortir" value="0" >Semua</option>
                          <?php foreach ($resto as $key => $value) { ?>
                            <option rel="index/sortir" value="<?php echo $value['id']; ?>" <?php echo (isset($_SESSION['sort_resto']) && $_SESSION['sort_resto'] == $value['id']) ? 'selected="selected"' : '' ; ?>><?php echo ucwords($value['nama']); ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="card-body no-padding row">
                      <div class="row">
                        <div class="col-xs-12">
                          <?php if (empty($paket)) { ?>
                            <div class="section">
                              <div class="section-body">
                                <div class="col-xs-4">&nbsp;</div><div class="col-xs-6"><h1 class="text-capitalize">Data Belum Ada</h1></div>
                              </div>
                            </div>
                          <?php } ?>
                          <?php foreach ($paket as $key => $value){ ?>
                          <div class="col-xs-3">
                            <div class="thumbnail">
                              <div class="caption" style="background:rgba(66, 139, 202, 0.75);">
                                <?php echo ($value['status'] == 1) ? '' : '<h4 class="text-capitalize">Tidak Tersedia</h4>' ; ?>
                                <h4 class="text-capitalize detail<?php echo $key;?>" rel="nama" val="<?php echo $value['nama']; ?>" id="nama<?php echo $key;?>" ><?php echo $value['nama']; ?></h4>
                                <small><p class="text-capitalize detail<?php echo $key;?>" rel="detail" val="<?php echo $value['detail']; ?>" id="detail<?php echo $key;?>" ><?php echo $value['detail']; ?></p></small>
                                <small class="col-xs-4"><p class="text-capitalize detail<?php echo $key;?>" rel="resto" val="<?php echo $value['resto']; ?>" id="resto<?php echo $key;?>" ><?php echo $value['resto']; ?></p></small>
                                <small class="col-xs-4"><p class="text-capitalize detail<?php echo $key;?>" rel="harga" val="<?php echo number_format($value['harga']); ?>" id="harga<?php echo $key;?>" ><?php echo number_format($value['harga']); ?></p></small>
                                <small class="col-xs-4"><p class="text-capitalize detail<?php echo $key;?>" rel="jenis" val="<?php echo $jenis[$value['jenis']]; ?>" id="jenis<?php echo $key;?>" ><?php echo $jenis[$value['jenis']]; ?></p></small>
                                <p class="col-xs-12">
                                <button type="button" data-toggle="modal" data-target="#myModal" onclick="detail(<?php echo $key;?>);jadwal(<?php echo $value['id']; ?>);" title="Tambahkan Keranjang" class="btn btn-warning btn-xs"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                                </p>
                              </div>
                              <img alt="<?php echo $value['nama']; ?>" rel="foto" val="<?php echo base_url().'assets/images/paket/'.$value['foto']; ?>" id="foto<?php echo $key;?>" class="detail<?php echo $key;?>" title="<?php echo $value['nama']; ?>" style="border-radius: 15px; max-height: 200px; max-width: 200px; height: auto; width: auto;" src="<?php echo base_url().'assets/images/paket/'.$value['foto']; ?>">
                                <input type="hidden" rel="id" val="<?php echo $value['id'] ?>" id="id<?php echo $key;?>" class="detail<?php echo $key;?>" value="<?php echo $value['id'] ?>">
                                <input type="hidden" rel="nm" val="<?php echo $value['nama'] ?>" id="hrg<?php echo $key;?>" class="detail<?php echo $key;?>" value="<?php echo $value['nama'] ?>">
                                <input type="hidden" rel="hrg" val="<?php echo $value['harga'] ?>" id="hrg<?php echo $key;?>" class="detail<?php echo $key;?>" value="<?php echo $value['harga'] ?>">
                                <input type="hidden" rel="jns" val="<?php echo $value['jenis'] ?>" id="jns<?php echo $key;?>" class="detail<?php echo $key;?>" value="<?php echo $value['jenis'] ?>">
                                <input type="hidden" rel="rst" val="<?php echo $value['resto'] ?>" id="hrg<?php echo $key;?>" class="detail<?php echo $key;?>" value="<?php echo $value['resto'] ?>">
                                <input type="hidden" rel="img" val="<?php echo base_url().'assets/images/paket/'.$value['foto']; ?>" id="hrg<?php echo $key;?>" class="detail<?php echo $key;?>" value="<?php echo base_url().'assets/images/paket/'.$value['foto']; ?>">
                                <input type="hidden" rel="dtl" val="<?php echo $value['detail']; ?>" class="detail<?php echo $key;?>" value="<?php $value['detail']; ?>">
                            </div>
                          </div>
                          <?php } ?>
                        </div>
                        <div class="card-footer text-center col-xs-12">
                          <nav>
                            <ul class="pagination">
                              <?php
                                if ($start > 1){ echo '<li><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';}
                                for($i=$start; $i<=$end; $i++){
                                  $active = ($i == $page) ? 'class="active"' : '' ;
                                  echo '<li '.$active.'><a href="'.base_url().'paket/field/'.$i.'">'.$i.'</a></li>';
                                }
                                if ($end < $total){ echo '<li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>'; }
                              ?>
                            </ul>
                          </nav>
                        </div>
                        <div class="col-xs-12"></div>
                      </div>
                    </div>
                  </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="profile">
                  <div class="card">
                    <div class="card-header control-label">AddOn T-SEL</div>
                      <div class="card-body no-padding">
                        <div class="table-responsive">
                          <table class="table card-table datatable">
                            <thead>
                              <tr>
                                <th class="text-center text-capitalize">Nama</th>
                                <th class="text-center text-capitalize">Harga</th>
                                <th class="text-center text-capitalize">Masa Aktiv</th>
                                <th class="text-center text-capitalize">Keterangan</th>
                                <th>&nbsp;</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($addon as $key => $value) { ?>
                              <tr>
                                <td class="addon<?php echo $key; ?> text-capitalize" rel="addnama"><?php echo $value['nama']; ?></td>
                                <td class="addon<?php echo $key; ?> text-right text-capitalize" rel="addharga"><?php echo number_format($value['harga']); ?></td>
                                <td class="addon<?php echo $key; ?> text-center text-capitalize" rel="addaktiv"><?php echo $value['aktiv']; ?> Hari</td>
                                <td class="addon<?php echo $key; ?> text-capitalize" rel="addketerangan"><?php echo $value['keterangan']; ?></td>
                                <td class="text-center">
                                  <button class="btn badge badge-warning badge-icon" onclick="addetail(<?php echo $key; ?>);" data-toggle="modal" data-target="#AddOn" title="Pesan" alt="Pesan"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                                  <p class="addon<?php echo $key; ?>" rel="addid" style="display: none;"><?php echo $value['id']; ?></p>
                                  <p class="addon<?php echo $key; ?>" rel="addnm" style="display: none;"><?php echo $value['nama']; ?></p>
                                  <p class="addon<?php echo $key; ?>" rel="addhrg" style="display: none;"><?php echo $value['harga']; ?></p>
                                </td>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="AddOn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="col-xs-6 text-capitalize"><h4 class="modal-title control-label">AddOn T-SEL</h4></div>
      </div>
      <form class="form form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>pesan/addon/">
        <div class="modal-body">
          <div class="row">
            <div class="col-xs-6">
              <div class="card-body no-padding">
                <table>
                  <table class="table">
                    <tr>
                      <th class="text-capitalize">Paket AddOn</th>
                      <th class="text-capitalize" id="addnama"></th>
                    </tr>
                    <tr>
                      <th class="text-capitalize">Harga</th>
                      <th class="text-capitalize" id="addharga"></th>
                    </tr>
                    <tr>
                      <th class="text-capitalize">Masa Aktiv</th>
                      <th class="text-capitalize" id="addaktiv"></th>
                    </tr>
                    <tr>
                      <th class="text-capitalize">Keterangan</th>
                      <th class="text-capitalize" id="addketerangan"></th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="card-body no-padding">
                <div class="form-group" id="jamaddon" rel="1">
                  <div class="col-xs-12"><input style="border-radius: 50px;" type="text" class="form-control datepicker" name="tanggal" placeholder="Tanggal Pesan"></div>
                  <div id="jamaddon1">
                    <div class="col-xs-10"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="msisdn[1]" placeholder="+62812345678"></div>
                    <div class="col-xs-2"><button type="button" class="btn badge badge-danger badge-icon" onclick="nodda(1);" title="Hapus Jam"><i class="fa fa-close"></i></button></div>
                  </div>
                </div>
                <input type="hidden" id="addid" name="id">
                <input type="hidden" id="addnm" name="nama">
                <input type="hidden" id="addhrg" name="harga">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success btn-xs" title="Tambah MSISDN" onclick="addon();"><i class="fa fa-clock-o"></i></button>
          <button type="submit" class="btn btn-xs btn-primary" title="Simpan"><i class="fa fa-check"></i></button>
          <button type="button" class="btn btn-xs btn-danger" title="Batal" data-dismiss="modal"><i class="fa fa-close"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="col-xs-6 text-capitalize"><h4 class="modal-title" id="nama"></h4></div>
      </div>
      <form class="form form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>pesan/addcart/">
        <div class="modal-body">
          <div class="row">
            <div class="col-xs-4">
              <a href="#"><img class="img-circle" id="foto" style="border-radius: 15px; max-height: 180px; max-width: 180px; height: auto; width: auto;" src="<?php echo base_url(); ?>assets/images/text.png" alt="Paket"></a>
            </div>
            <div class="col-xs-8">
              <div class="card-header">
                <select class="form-control select2" required="required" style="width: 100%;" name="id_travel" id="id_travel" onload="bind('travel','id_travel');" onchange="bind('travel','id_travel');">
                  <option value="" >Untuk Travel</option>
                  <?php foreach ($travel as $key => $value){ ?>
                  <option rel="<?php echo $value['nama']; ?>" value="<?php echo $value['id'] ?>" ><?php echo $value['nama']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="card-body no-padding">
                <table class="table">
                  <tbody>
                    <tr><td><span class="small text-left text-capitalize" id="jenis"></span></td></tr>
                    <tr><td><span class="small text-left text-capitalize" id="resto"></span></td></tr>
                    <tr><td><span class="small text-left text-capitalize" id="detail"></span></td></tr>
                    <tr><td><span class="small text-left text-capitalize" id="harga"></span></td></tr>
                  </tbody>
                </table>
                <input type="hidden" id="id" name="id">
                <input type="hidden" id="nm" name="nama">
                <input type="hidden" id="hrg" name="harga">
                <input type="hidden" id="jns" name="jenis">
                <input type="hidden" id="rst" name="resto">
                <input type="hidden" id="img" name="foto">
                <input type="hidden" id="dtl" name="detail">
                <input type="hidden" id="travel" name="travel">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-3 jam"></div>
              <div class="col-xs-9">
                <div class="section">
                  <div class="section-title">Pesan Berdasarkan Hari</div>
                  <div class="section-body">
                    <div class="form-group" id="jampesan" rel="1">
                      <div id="jampesan1" class="form-group">
                        <div class="col-xs-4"><input style="border-radius: 50px;" type="text" class="form-control datepicker" name="pesan[1][tanggal]" required="required" placeholder="Tanggal Pesan"></div>
                        <div class="col-xs-3"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="pesan[1][jumlah]" required="required" placeholder="Jumlah Pesan"></div>
                        <div class="col-xs-3">
                          <select name="pesan[1][jenis]" class="form-control select2">
                            <option value="1">Datang</option>
                            <option value="0">Pulang</option>
                          </select>
                        </div>
                        <div class="col-xs-2"><button type="button" class="btn badge badge-danger badge-icon" onclick="nasep(1);" title="Hapus Jam"><i class="fa fa-close"></i></button></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success btn-xs" title="Tambah Jam" onclick="pesan();"><i class="fa fa-clock-o"></i></button>
          <button type="submit" class="btn btn-xs btn-primary" title="Simpan"><i class="fa fa-check"></i></button>
          <button type="button" class="btn btn-xs btn-danger" title="Batal" data-dismiss="modal"><i class="fa fa-close"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>