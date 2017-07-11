<div class="row">
  
  <div class="col-md-12">
    <div class="card card-mini">
      <div class="card-header">Pengisian Temuan</div>
      <div class="card-body">
        <div class="row">
          <form class="form form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url().'temuan/submit/'.$data['id']; ?>">
            <div class="section">
              <div class="section-title">Realisasi Anggaran</div>
              <div class="section-body">
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">SKPD</label></div>
                  <div class="col-xs-9">
                    <select name="id_skpd" class="select2 rm-control">
                      <?php foreach ($skpd as $key => $value){ ?>
                        <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] == $data['id_skpd']) ? 'selected="selected"' : '' ; ?>><?php echo $value['nama']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">Undang-Undang</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="uu" value="<?php echo $data['uu']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">Tanggal</label></div>
                  <?php $tanggal = (empty($data['tanggal'])) ? date('d-m-Y') : $data['tanggal'] ; ?>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control datepicker text-capitalize" name="tanggal" value="<?php echo date("d-m-Y",strtotime($tanggal)); ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">Anggaran Pendapatan &amp; Belanja</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="pendapatan" value="<?php echo $data['pendapatan']; ?>" placeholder=""></div>
                </div>
              </div>
            </div>
            <div class="section">
              <div class="section-title">Belanja Tak Langsung</div>
              <div class="section-body">
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">uraian</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="btl_uraian" value="<?php echo $data['btl_uraian']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">anggaran</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="btl_anggaran" value="<?php echo $data['btl_anggaran']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">realisasi</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="btl_realisasi" value="<?php echo $data['btl_realisasi']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">SPJ</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="btl_spj" value="<?php echo $data['btl_spj']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">sisa SPJ</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="btl_sisa" value="<?php echo $data['btl_sisa']; ?>" placeholder=""></div>
                </div>
              </div>
            </div>
            <div class="section">
              <div class="section-title">Belanja Langsung</div>
              <div class="section-body">
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">uraian</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="bl_uraian" value="<?php echo $data['bl_uraian']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">anggaran</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="bl_anggaran" value="<?php echo $data['bl_anggaran']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">realisasi</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="bl_realisasi" value="<?php echo $data['bl_realisasi']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">SPJ</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="bl_spj" value="<?php echo $data['bl_spj']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">sisa SPJ</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="bl_sisa" value="<?php echo $data['bl_sisa']; ?>" placeholder=""></div>
                </div>
              </div>
            </div>
            <div class="section">
              <div class="section-title">PPTK</div>
              <div class="section-body">
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">jenis kegiatan</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="jenis" value="<?php echo $data['jenis']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">nama</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="nama" value="<?php echo $data['nama']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">nilai</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="nilai" value="<?php echo $data['nilai']; ?>" placeholder=""></div>
                </div>
              </div>
            </div>
            <div class="section">
              <div class="section-title">SPP</div>
              <div class="section-body">
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">tanggal</label></div>
                  <?php $spp_tanggal = (empty($data['spp_tanggal'])) ? date('d-m-Y') : $data['spp_tanggal'] ; ?>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize datepicker" name="spp_tanggal" value="<?php echo date("d-m-Y",strtotime($spp_tanggal)); ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">SPP UP</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="spp_up" value="<?php echo $data['spp_up']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">SPP GU</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="spp_gu" value="<?php echo $data['spp_gu']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">SPP TU</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="spp_tu" value="<?php echo $data['spp_tu']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">LS gaji</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="spp_gaji" value="<?php echo $data['spp_gaji']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">LS barang jasa</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="spp_barjas" value="<?php echo $data['spp_barjas']; ?>" placeholder=""></div>
                </div>
              </div>
            </div>
            <div class="section">
              <div class="section-title">SPM</div>
              <div class="section-body">
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">tanggal</label></div>
                  <?php $spm_tanggal = (empty($data['spm_tanggal'])) ? date('d-m-Y') : $data['spm_tanggal'] ; ?>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize datepicker" name="spm_tanggal" value="<?php echo date("d-m-Y",strtotime($spm_tanggal)); ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">SPM UP</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="spm_up" value="<?php echo $data['spm_up']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">SPM GU</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="spm_gu" value="<?php echo $data['spm_gu']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">SPM TU</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="spm_tu" value="<?php echo $data['spm_tu']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">LS gaji</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="spm_gaji" value="<?php echo $data['spm_gaji']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">LS barang jasa</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="spm_barjas" value="<?php echo $data['spm_barjas']; ?>" placeholder=""></div>
                </div>
              </div>
            </div>
            <div class="section">
              <div class="section-title">Penanggung Jawab</div>
              <div class="section-body">
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">tanggal</label></div>
                  <?php $tj_tanggal = (empty($data['tj_tanggal'])) ? date('d-m-Y') : $data['tj_tanggal'] ; ?>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize datepicker" name="tj_tanggal" value="<?php echo date("d-m-Y",strtotime($tj_tanggal)); ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">No SPJ</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="no_spj" value="<?php echo $data['no_spj']; ?>" placeholder=""></div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">jumlah</label></div>
                  <div class="col-xs-9"><input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="jumlah" value="<?php echo $data['jumlah']; ?>" placeholder=""></div>
                </div>
              </div>
            </div>
            <div class="form-footer">
              <div class="form-group">
                <div class="col-xs-8 col-xs-offset-4 text-right">
                  <button type="submit" class="btn btn-primary btn-xs" title="Simpan"><i class="fa fa-check"></i></button>
                  <?php //if (!is_null($id)){ ?>
                  <button type="reset" onclick="window.location='http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>'" class="btn btn-warning btn-xs" title="ReSet"><i class="fa fa-undo"></i></button>
                  <?php //} ?>
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