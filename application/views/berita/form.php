<div class="row">
  
  <div class="col-xs-12">
    <div class="card">
      <div class="card-header text-capitalize"><?php echo $method; ?> Acara <?php echo $skpd['skpd'];?></div>
      <div class="card-body">
        <div class="row">
          <form class="form form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url().'berita/submit/'.$submit; ?>">
            <div class="section">
              <div class="section-body __indent">
              <?php if($type != 'post'){ ?><input type="hidden" name="id_temuan" value="<?php echo $data['id_temuan']; ?>"><?php } ?>
              
              <?php if ($method == 'berita'){ if($_SESSION['masuk']['status'] == 1 || $_SESSION['masuk']['status'] == 3){ ?>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">Penanggung Jawab</label></div>
                  <div class="col-xs-9">
                    <input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="tj" value="<?php echo $data['tj']; ?>" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">Ketua</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="ketua" value="<?php echo $data['ketua']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">Anggota</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="anggota" value="<?php echo $data['anggota']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">no surat</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="no" value="<?php echo $data['no']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">Tanggal Berita Acara</label></div>
                  <?php  $tgl = (empty($data['tgl'])) ? date('d-m-Y') : date("d-m-Y",strtotime($data['tgl'])) ; ?>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize datepicker" name="tgl" value="<?php echo $tgl; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">batas</label></div>
                  <?php  $batas = (empty($data['batas'])) ? date('d-m-Y') : date("d-m-Y",strtotime($data['batas'])) ; ?>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize datepicker" name="batas" value="<?php echo $batas ; ?>" placeholder=""></div>
                </div>
              <?php } else { redirect(''); }} ?>

              <?php if ($method != 'file'){ if($_SESSION['masuk']['status'] == 1 || $_SESSION['masuk']['status'] == 3 || $_SESSION['masuk']['status'] == 4){ ?>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">Temuan Sementara</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="ts" value="<?php echo $data['ts']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">Undang-undang</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="uu" value="<?php echo $data['uu']; ?>" placeholder=""></div>
                </div>
              <?php } else { redirect(''); }} ?>

              <?php if ($method == 'tindak'){ if($_SESSION['masuk']['status'] == 1 || $_SESSION['masuk']['status'] == 4){ ?>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">Tanggal Tindak Lanjut</label></div>
                  <?php  $tanggal = (empty($data['tanggal'])) ? date('d-m-Y') : date("d-m-Y",strtotime($data['tanggal'])) ; ?>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize datepicker" name="tanggal" value="<?php echo $tanggal ; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">saran</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="saran" value="<?php echo $data['saran']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">status</label></div>
                  <div class="col-xs-9">
                  <select name="status" class="select2 form-control">
                      <?php foreach ($status as $key => $value){ ?>
                        <option value="<?php echo $key; ?>" <?php echo ($data['status'] == $key) ? 'selected="selected"' : '' ; ?>><?php echo $value; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              <?php } else { redirect(''); }} ?>

              
              <?php if ($method == 'file'){ if($_SESSION['masuk']['status'] != 5){?>
                <div class="file" rel="1">
                  <div class="form-group" id="file1">
                    <div class="col-xs-11"><input style="border-radius: 50px;" type="file" class="form-control btn" name="file[1]" placeholder=""></div>
                    <div class="col-xs-1"><button style="vertical-align: middle;" type="button" class="btn badge badge-danger badge-icon" onclick="elif(1);" title="Hapus File"><i class="fa fa-close"></i></button></div>
                  </div>
                </div>
              <?php } else { redirect(''); }} ?>
              
              </div>
            </div>
            <div class="form-footer">
              <div class="form-group">
                <div class="col-xs-8 col-xs-offset-4 text-right">

                  <?php if ($method == 'file'){ ?>
                  <button type="button" class="btn btn-success btn-xs" title="Tambah File" onclick="file();"><i class="fa fa-plus"></i></button>
                  <?php } ?>
                  <button type="submit" class="btn btn-primary btn-xs" title="Simpan"><i class="fa fa-check"></i></button>
                  <?php if ($type == 'edit'){ ?>
                  <button type="reset" onclick="window.location='http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>'" class="btn btn-warning btn-xs" title="ReSet"><i class="fa fa-undo"></i></button>
                  <?php } ?>
                  <button type="button" class="btn btn-danger btn-xs" onclick="window.history.back();" title="Batal"><i class="fa fa-close"></i></button>
                </div>
              </div>
            </div>
          </form>
        </div>
        </div>
      </div>
    </div>
  </div>
  
</div>