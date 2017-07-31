<div class="row">

  <div class="col-xs-12">
    <div class="card card-mini">
      <div class="card-header">
        <div class="col-xs-2">List Temuan Sementara</div>
        <div class="col-xs-2">
          <select class="form-control select2" id="bulan" onchange="periode();">
            <?php foreach ($bulan as $key => $value){ ?>
              <option value="<?php echo $key; ?>" <?php echo ($key == $param['bulan']) ? 'selected="selected"' : '' ; ?>><?php echo $value; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-xs-2">
          <select class="form-control select2" id="tahun" onchange="periode();">
            <?php foreach ($tahun as $key => $value){ ?>
              <option value="<?php echo $value['tahun']; ?>" <?php echo ($value['tahun'] == $param['tahun']) ? 'selected  ="selected"' : '' ; ?>><?php echo $value['tahun']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="section">
            <div class="section-body">
              <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#ra" aria-controls="ra" role="tab" data-toggle="tab">Realisasi Anggaran</a></li>
                  <li role="presentation"><a href="#btl" aria-controls="btl" role="tab" data-toggle="tab">Belanja Tak Langsung</a></li>
                  <li role="presentation"><a href="#bl" aria-controls="bl" role="tab" data-toggle="tab">Belanja Langsung</a></li>
                  <li role="presentation"><a href="#pptk" aria-controls="pptk" role="tab" data-toggle="tab">PPTK</a></li>
                  <li role="presentation"><a href="#spp" aria-controls="spp" role="tab" data-toggle="tab">SPP</a></li>
                  <li role="presentation"><a href="#spm" aria-controls="spm" role="tab" data-toggle="tab">SPM</a></li>
                  <li role="presentation"><a href="#pj" aria-controls="pj" role="tab" data-toggle="tab">Penanggung Jawab</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane table-responsive active" id="ra" style="width: 100%;">
                    <table style="width: 100%;" class="datatable2 card-table table-striped table-hover table">
                      <thead>
                        <tr>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">#</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">SKPD</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">Undang-Undang</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">Tanggal</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">Anggaran <br> Pendapatan <br> Belanja</th>
                          <th style="vertical-align: middle;" class="text-center text-capitalize text-center"><i class="fa fa-cogs" title="Opsi"></i></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $key => $value){ ?>
                        <tr>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo ($key+1); ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['skpd']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['uu']; ?></td>
                          <td style="vertical-align: middle;" class="text-center text-capitalize"><?php echo $value['tanggal']; ?></td>
                          <td style="vertical-align: middle;" class="text-right text-capitalize"><?php echo $value['pendapatan']; ?></td>
                          <td style="vertical-align: middle;" class="text-center text-capitalize">
                            <?php if ($_SESSION['masuk']['status'] == 1 || $_SESSION['masuk']['status'] == 2){ ?>
                            <button type="button" onclick="window.location='<?php echo base_url().'temuan/form/'.$value['id'];?>'" title="Edit" class="btn badge badge-info badge-icon"><i class="fa fa-edit" aria-hidden="true"></i></button>
                            <?php } if ($_SESSION['masuk']['status'] == 1 || $_SESSION['masuk']['status'] == 3){ ?>
                            <button type="button" onclick="window.location='<?php echo base_url().'berita/form/berita/'.$value['id'].'-post';?>'" title="Berita Acara" class="btn badge badge-success badge-icon"><i class="fa fa-newspaper-o" aria-hidden="true"></i></button>
                            <?php } ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div role="tabpanel" class="tab-pane table-responsive" id="btl" style="width: 100%;">
                    <table style="width: 100%;" class="datatable card-table table-striped table-hover table">
                      <thead>
                        <tr>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">#</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">uraian</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">anggaran</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">realisasi</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">SPJ</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">sisa SPJ</th>
                          <th style="vertical-align: middle;" class="text-center text-capitalize text-center"><i class="fa fa-cogs" title="Opsi"></i></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $key => $value){ ?>
                        <tr>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo ($key+1); ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['btl_uraian']; ?></td>
                          <td style="vertical-align: middle;" class="text-right text-capitalize"><?php echo $value['btl_anggaran']; ?></td>
                          <td style="vertical-align: middle;" class="text-right text-capitalize"><?php echo $value['btl_realisasi']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['btl_spj']; ?></td>
                          <td style="vertical-align: middle;" class="text-right text-capitalize"><?php echo $value['btl_sisa']; ?></td>
                          <td style="vertical-align: middle;" class="text-center text-capitalize">
                            <?php if ($_SESSION['masuk']['status'] == 1 || $_SESSION['masuk']['status'] == 2){ ?>
                            <button type="button" onclick="window.location='<?php echo base_url().'temuan/form/'.$value['id'];?>'" title="Edit" class="btn badge badge-info badge-icon"><i class="fa fa-edit" aria-hidden="true"></i></button>
                            <?php } if ($_SESSION['masuk']['status'] == 1 || $_SESSION['masuk']['status'] == 3){ ?>
                            <button type="button" onclick="window.location='<?php echo base_url().'berita/form/berita/'.$value['id'].'-post';?>'" title="Berita Acara" class="btn badge badge-success badge-icon"><i class="fa fa-newspaper-o" aria-hidden="true"></i></button>
                            <?php } ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div role="tabpanel" class="tab-pane table-responsive" id="bl" style="width: 100%;">
                    <table style="width: 100%;" class="datatable card-table table-striped table-hover table">
                      <thead>
                        <tr>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">#</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">uraian</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">anggaran</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">realisasi</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">SPJ</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">sisa SPJ</th>
                          <th style="vertical-align: middle;" class="text-center text-capitalize text-center"><i class="fa fa-cogs" title="Opsi"></i></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $key => $value){ ?>
                        <tr>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo ($key+1); ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['bl_uraian']; ?></td>
                          <td style="vertical-align: middle;" class="text-right text-capitalize"><?php echo $value['bl_anggaran']; ?></td>
                          <td style="vertical-align: middle;" class="text-right text-capitalize"><?php echo $value['bl_realisasi']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['bl_spj']; ?></td>
                          <td style="vertical-align: middle;" class="text-right text-capitalize"><?php echo $value['bl_sisa']; ?></td>
                          <td style="vertical-align: middle;" class="text-center text-capitalize">
                            <?php if ($_SESSION['masuk']['status'] == 1 || $_SESSION['masuk']['status'] == 2){ ?>
                            <button type="button" onclick="window.location='<?php echo base_url().'temuan/form/'.$value['id'];?>'" title="Edit" class="btn badge badge-info badge-icon"><i class="fa fa-edit" aria-hidden="true"></i></button>
                            <?php } if ($_SESSION['masuk']['status'] == 1 || $_SESSION['masuk']['status'] == 3){ ?>
                            <button type="button" onclick="window.location='<?php echo base_url().'berita/form/berita/'.$value['id'].'-post';?>'" title="Berita Acara" class="btn badge badge-success badge-icon"><i class="fa fa-newspaper-o" aria-hidden="true"></i></button>
                            <?php } ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div role="tabpanel" class="tab-pane table-responsive" id="pptk" style="width: 100%;">
                    <table style="width: 100%;" class="datatable card-table table-striped table-hover table">
                      <thead>
                        <tr>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">#</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">jenis kegiatan</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">nama</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">nilai</th>
                          <th style="vertical-align: middle;" class="text-center text-capitalize text-center"><i class="fa fa-cogs" title="Opsi"></i></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $key => $value){ ?>
                        <tr>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo ($key+1); ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['jenis']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['nama']; ?></td>
                          <td style="vertical-align: middle;" class="text-right text-capitalize"><?php echo $value['nilai']; ?></td>
                          <td style="vertical-align: middle;" class="text-center text-capitalize">
                            <?php if ($_SESSION['masuk']['status'] == 1 || $_SESSION['masuk']['status'] == 2){ ?>
                            <button type="button" onclick="window.location='<?php echo base_url().'temuan/form/'.$value['id'];?>'" title="Edit" class="btn badge badge-info badge-icon"><i class="fa fa-edit" aria-hidden="true"></i></button>
                            <?php } if ($_SESSION['masuk']['status'] == 1 || $_SESSION['masuk']['status'] == 3){ ?>
                            <button type="button" onclick="window.location='<?php echo base_url().'berita/form/berita/'.$value['id'].'-post';?>'" title="Berita Acara" class="btn badge badge-success badge-icon"><i class="fa fa-newspaper-o" aria-hidden="true"></i></button>
                            <?php } ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div role="tabpanel" class="tab-pane table-responsive" id="spp" style="width: 100%;">
                    <table style="width: 100%;" class="datatable card-table table-striped table-hover table">
                      <thead>
                        <tr>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">#</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">tanggal</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">SPP UP</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">SPP GU</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">SPP TU</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">LS gaji</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">LS barang jasa</th>
                          <th style="vertical-align: middle;" class="text-center text-capitalize text-center"><i class="fa fa-cogs" title="Opsi"></i></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $key => $value){ ?>
                        <tr>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo ($key+1); ?></td>
                          <td style="vertical-align: middle;" class="text-center text-capitalize"><?php echo $value['spp_tanggal']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['spp_up']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['spp_gu']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['spp_tu']; ?></td>
                          <td style="vertical-align: middle;" class="text-right text-capitalize"><?php echo $value['spp_gaji']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['spp_barjas']; ?></td>
                          <td style="vertical-align: middle;" class="text-center text-capitalize">
                            <?php if ($_SESSION['masuk']['status'] == 1 || $_SESSION['masuk']['status'] == 2){ ?>
                            <button type="button" onclick="window.location='<?php echo base_url().'temuan/form/'.$value['id'];?>'" title="Edit" class="btn badge badge-info badge-icon"><i class="fa fa-edit" aria-hidden="true"></i></button>
                            <?php } if ($_SESSION['masuk']['status'] == 1 || $_SESSION['masuk']['status'] == 3){ ?>
                            <button type="button" onclick="window.location='<?php echo base_url().'berita/form/berita/'.$value['id'].'-post';?>'" title="Berita Acara" class="btn badge badge-success badge-icon"><i class="fa fa-newspaper-o" aria-hidden="true"></i></button>
                            <?php } ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div role="tabpanel" class="tab-pane table-responsive" id="spm" style="width: 100%;">
                    <table style="width: 100%;" class="datatable card-table table-striped table-hover table">
                      <thead>
                        <tr>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">#</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">tanggal</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">SPP UP</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">SPP GU</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">SPP TU</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">LS gaji</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">LS barang jasa</th>
                          <th style="vertical-align: middle;" class="text-center text-capitalize text-center"><i class="fa fa-cogs" title="Opsi"></i></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $key => $value){ ?>
                        <tr>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo ($key+1); ?></td>
                          <td style="vertical-align: middle;" class="text-center text-capitalize"><?php echo $value['spm_tanggal']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['spm_up']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['spm_gu']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['spm_tu']; ?></td>
                          <td style="vertical-align: middle;" class="text-right text-capitalize"><?php echo $value['spm_gaji']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['spm_barjas']; ?></td>
                          <td style="vertical-align: middle;" class="text-center text-capitalize">
                            <?php if ($_SESSION['masuk']['status'] == 1 || $_SESSION['masuk']['status'] == 2){ ?>
                            <button type="button" onclick="window.location='<?php echo base_url().'temuan/form/'.$value['id'];?>'" title="Edit" class="btn badge badge-info badge-icon"><i class="fa fa-edit" aria-hidden="true"></i></button>
                            <?php } if ($_SESSION['masuk']['status'] == 1 || $_SESSION['masuk']['status'] == 3){ ?>
                            <button type="button" onclick="window.location='<?php echo base_url().'berita/form/berita/'.$value['id'].'-post';?>'" title="Berita Acara" class="btn badge badge-success badge-icon"><i class="fa fa-newspaper-o" aria-hidden="true"></i></button>
                            <?php } ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div role="tabpanel" class="tab-pane table-responsive" id="pj" style="width: 100%;">
                    <table style="width: 100%;" class="datatable card-table table-striped table-hover table">
                      <thead>
                        <tr>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">#</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">tanggal</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">No SPJ</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">jumlah</th>
                          <th style="vertical-align: middle;" class="text-center text-capitalize text-center"><i class="fa fa-cogs" title="Opsi"></i></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $key => $value){ ?>
                        <tr>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo ($key+1); ?></td>
                          <td style="vertical-align: middle;" class="text-center text-capitalize"><?php echo $value['tj_tanggal']; ?></td>
                          <td style="vertical-align: middle;" class="text-right text-capitalize"><?php echo $value['no_spj']; ?></td>
                          <td style="vertical-align: middle;" class="text-right text-capitalize"><?php echo $value['jumlah']; ?></td>
                          <td style="vertical-align: middle;" class="text-center text-capitalize">
                            <?php if ($_SESSION['masuk']['status'] == 1 || $_SESSION['masuk']['status'] == 2){ ?>
                            <button type="button" onclick="window.location='<?php echo base_url().'temuan/form/'.$value['id'];?>'" title="Edit" class="btn badge badge-info badge-icon"><i class="fa fa-edit" aria-hidden="true"></i></button>
                            <?php } if ($_SESSION['masuk']['status'] == 1 || $_SESSION['masuk']['status'] == 3){ ?>
                            <button type="button" onclick="window.location='<?php echo base_url().'berita/form/berita/'.$value['id'].'-post';?>'" title="Berita Acara" class="btn badge badge-success badge-icon"><i class="fa fa-newspaper-o" aria-hidden="true"></i></button>
                            <?php } ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
             <div class="form-footer">
              <div class="form-group">
                <div class="col-xs-8 col-xs-offset-4 text-right">
                  <button type="button" class="btn btn-success btn-xs" title="Tambah Temuan" onclick="window.location='<?php echo base_url(); ?>temuan/form'"><i class="fa fa-list"></i></button>
                  <button type="button" class="btn btn-danger btn-xs" onclick="window.history.back();" title="Batal"><i class="fa fa-close"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>