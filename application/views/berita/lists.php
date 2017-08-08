<div class="row">

  <div class="col-xs-12">
    <div class="card card-mini">
      <div class="card-header">
        <?php if ($_SESSION['masuk']['status'] != 4){ ?>
        <div class="col-xs-2">
          <select class="form-control select2" id="skpd" onchange="periode('skpd');">
            <?php foreach ($skpd as $key => $value){ ?>
              <option value="<?php echo $value['id']; ?>" <?php echo ($value['id'] == $param['id']) ? 'selected="selected"' : '' ; ?>><?php echo $value['nama']; ?></option>
            <?php } ?>
          </select>
        </div>
        <?php } ?>
        <div class="col-xs-2">
          <select class="form-control select2" id="bulan" onchange="periode(<?php echo ($_SESSION['masuk']['status'] == 4) ? '' : "'skpd'" ; ?>);">
            <?php foreach ($bulan as $key => $value){ ?>
              <option value="<?php echo $key; ?>" <?php echo ($key == $param['bulan']) ? 'selected="selected"' : '' ; ?>><?php echo $value; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-xs-2">
          <select class="form-control select2" id="tahun" onchange="periode(<?php echo ($_SESSION['masuk']['status'] == 4) ? '' : "'skpd'" ; ?>);">
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
              <div class="table-responsive">
                <table style="width: 100%;" class="datatable card-table table-striped table-bordered table-hover table">
                  <thead>
                    <tr>
                      <th width="5%" style="vertical-align: middle;" class="text-capitalize text-center">#</th>
                      <th width="15%" style="vertical-align: middle;" class="text-capitalize text-center">SKPD</th>
                      <th width="5%" style="vertical-align: middle;" class="text-capitalize text-center">Code</th>
                      <th width="10%" style="vertical-align: middle;" class="text-capitalize text-center">Penanggung Jawab</th>
                      <th width="10%" style="vertical-align: middle;" class="text-capitalize text-center">Tanggal</th>
                      <th width="5%" style="vertical-align: middle;" class="text-capitalize text-center">No Surat</th>
                      <th width="10%" style="vertical-align: middle;" class="text-capitalize text-center">Batas</th>
                      <th width="5%" style="vertical-align: middle;" class="text-capitalize text-center"><i class="fa fa-cogs" title="Opsi"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data as $key => $value){ ?>
                    <tr>
                      <td width="5%" style="vertical-align: middle;" class="text-capitalize"><?php echo ($key+1); ?></td>
                      <td width="15%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['skpd']; ?></td>
                      <td width="5%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['code']; ?></td>
                      <td width="10%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['tj']; ?></td>
                      <td width="10%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['tgl']; ?></td>
                      <td width="5%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['no']; ?></td>
                      <td width="10%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['batas']; ?></td>
                      <td width="5%" style="vertical-align: middle;" class="text-capitalize">

                        <div style="display: none;" id="btl<?php echo $key; ?>">
                          <div class="form-group">
                            <div class="col-xs-4 text-left"><label style="vertical-align: middle;" class="form-label text-left text-capitalize">skpd</label></div>
                            <div class="col-xs-8 text-left"><?php echo $value['skpd']; ?></div>
                          </div>
                          <div class="form-group">
                            <div class="col-xs-4 text-left"><label style="vertical-align: middle;" class="form-label text-left text-capitalize">penanggung jawab</label></div>
                            <div class="col-xs-8 text-left"><?php echo $value['tj']; ?></div>
                          </div>
                          <div class="form-group">
                            <div class="col-xs-4 text-left"><label style="vertical-align: middle;" class="form-label text-left text-capitalize">ketua</label></div>
                            <div class="col-xs-8 text-left"><?php echo $value['ketua']; ?></div>
                          </div>
                          <div class="form-group">
                            <div class="col-xs-4 text-left"><label style="vertical-align: middle;" class="form-label text-left text-capitalize">anggota</label></div>
                            <div class="col-xs-8 text-left"><?php echo $value['anggota']; ?></div>
                          </div>
                          <div class="form-group">
                            <div class="col-xs-4 text-left"><label style="vertical-align: middle;" class="form-label text-left text-capitalize">tanggal berita acara</label></div>
                            <div class="col-xs-8 text-left"><?php echo $value['tgl']; ?></div>
                          </div>
                          <div class="form-group">
                            <div class="col-xs-4 text-left"><label style="vertical-align: middle;" class="form-label text-left text-capitalize">no surat</label></div>
                            <div class="col-xs-8 text-left"><?php echo $value['no']; ?></div>
                          </div>
                          <div class="form-group">
                            <div class="col-xs-4 text-left"><label style="vertical-align: middle;" class="form-label text-left text-capitalize">temuan sementara</label></div>
                            <div class="col-xs-8 text-left"><?php echo $value['ts']; ?></div>
                          </div>
                          <div class="form-group">
                            <div class="col-xs-4 text-left"><label style="vertical-align: middle;" class="form-label text-left text-capitalize">undang undang</label></div>
                            <div class="col-xs-8 text-left"><?php echo $value['uu']; ?></div>
                          </div>
                          <div class="form-group">
                            <div class="col-xs-4 text-left"><label style="vertical-align: middle;" class="form-label text-left text-capitalize">code</label></div>
                            <div class="col-xs-8 text-left"><?php echo $value['code']; ?></div>
                          </div>
                          <div class="form-group">
                            <div class="col-xs-4 text-left"><label style="vertical-align: middle;" class="form-label text-left text-capitalize">tanggal tindak lanjut</label></div>
                            <div class="col-xs-8 text-left"><?php echo $value['tanggal']; ?></div>
                          </div>
                          <div class="form-group">
                            <div class="col-xs-4 text-left"><label style="vertical-align: middle;" class="form-label text-left text-capitalize">saran</label></div>
                            <div class="col-xs-8 text-left"><?php echo $value['saran']; ?></div>
                          </div>
                          <div class="form-group">
                            <div class="col-xs-4 text-left"><label style="vertical-align: middle;" class="form-label text-left text-capitalize">batas</label></div>
                            <div class="col-xs-8 text-left"><?php echo $value['batas']; ?></div>
                          </div>
                          <div class="form-group">
                            <div class="col-xs-4 text-left"><label style="vertical-align: middle;" class="form-label text-left text-capitalize">status</label></div>
                            <div class="col-xs-8 text-left"><?php echo $status[$value['status']]; ?></div>
                          </div>
                          <div class="form-group">
                            <div class="col-xs-4 text-left"><label style="vertical-align: middle;" class="form-label text-left text-capitalize">protl</label></div>
                            <div class="col-xs-8 text-left"><div class="progress" style="background-color: transparent; border-radius: 50px;"><div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo (empty($data['probl'])) ? 0 : $data['probl'] ; ?>" aria-valuemin="0" aria-valuemax="100" style="border-radius: 50px; border: none; width: <?php echo (empty($data['probl'])) ? 0 : $data['probl'] ; ?>%"></div></div></div>
                          </div>
                          <div class="form-group">
                            <div class="col-xs-4 text-left"><label style="vertical-align: middle;" class="form-label text-left text-capitalize">probl</label></div>
                            <div class="col-xs-8 text-left"><div class="progress" style="background-color: transparent; border-radius: 50px;"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo (empty($data['protl'])) ? 0 : $data['protl'] ; ?>" aria-valuemin="0" aria-valuemax="100" style="border-radius: 50px; border: none; width: <?php echo (empty($data['protl'])) ? 0 : $data['protl'] ; ?>%"></div></div></div>
                          </div>
                        </div>

                        <div style="display: none;" id="files<?php echo $key; ?>">
                          <?php if (array_key_exists('file', $value)){foreach ($value['file'] as $k => $val) { ?>
                          <div class="col-xs-4"><a target="_blank" href="<?php echo base_url().$val; ?>"><span class="badge badge-info badge-icon"><i class="fa fa-file" aria-hidden="true"></i><span>File <?php echo $value['waktu'][$k] ?></span></span></a></div>
                          <?php }} ?>
                        </div>
                        
                        <div class="btn-group">
                          <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                          <ul class="dropdown-menu pull-right" role="menu" style="right:100%;bottom:-100% !important; top:auto !important;">
                            <li><a  data-toggle="modal" style="cursor: pointer;" data-target="#myModal" onclick="files(<?php echo $key; ?>);"><i class="fa fa-file" aria-hidden="true"></i> Detail</a></li>
                          <?php if ($_SESSION['masuk']['status'] == 1 || $_SESSION['masuk']['status'] == 3){ ?>
                            <li><a style="cursor:pointer;" onclick="window.location='<?php echo base_url().'berita/form/berita/'.$value['id'].'-edit';?>'" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
                          <?php } if ($_SESSION['masuk']['status'] != 5){ ?>
                            <li><a style="cursor:pointer;" onclick="window.location='<?php echo base_url().'berita/form/file/'.$value['id'].'-edit';?>'" title="Upload File"><i class="fa fa-file-text" aria-hidden="true"></i> Upload File</a></li>
                          <?php } ?>
                            <li><a style="cursor:pointer;" onclick="window.location='<?php echo base_url().'berita/progres/'.$value['id'];?>'" title="Progres"><i class="fa fa-line-chart" aria-hidden="true"></i> Progres</a></li>
                          </ul>
                        </div>
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
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Detail</h4>
        </div>
        <div class="modal-body row text-center">
          <div role="tabpanel">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#ra" aria-controls="ra" role="tab" data-toggle="tab">Berita Acara &amp; Tindak Lanjut</a></li>
              <li role="presentation"><a href="#bl" aria-controls="bl" role="tab" data-toggle="tab">Files</a></li>
            </ul>

            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="ra"><div id="btl" class="form form-horizontal"></div></div>
              <div role="tabpanel" class="tab-pane" id="bl"><div id="files" class="row"></div></div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button style="vertical-align: middle;" type="button" class="btn badge badge-danger badge-icon" data-dismiss="modal"><i aria-hidden="true" class="fa fa-close"></i></button>
        </div>
      </div>
    </div>
  </div>
</div>