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
              <div role="tabpanel">
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#ra" aria-controls="ra" role="tab" data-toggle="tab">Berita Acara</a></li>
                  <li role="presentation"><a href="#btl" aria-controls="btl" role="tab" data-toggle="tab">Tindak Lanjut</a></li>
                  <li role="presentation"><a href="#bl" aria-controls="bl" role="tab" data-toggle="tab">Belanja Langsung</a></li>
                </ul>

                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane table-responsive active" id="ra" style="max-width: auto; overflow-x: scroll;">
                    <div style="width: 150%;">
                      <table style="width: 100%;" class="datatable card-table table-striped table-bordered table-hover table">
                        <thead>
                          <tr>
                            <th width="5%" style="vertical-align: middle;" class="text-capitalize text-center">#</th>
                            <th width="15%" style="vertical-align: middle;" class="text-capitalize text-center">SKPD</th>
                            <th width="5%" style="vertical-align: middle;" class="text-capitalize text-center">Code</th>
                            <th width="10%" style="vertical-align: middle;" class="text-capitalize text-center">Penanggung Jawab</th>
                            <th width="10%" style="vertical-align: middle;" class="text-capitalize text-center">Ketua</th>
                            <th width="10%" style="vertical-align: middle;" class="text-capitalize text-center">Anggota</th>
                            <th width="10%" style="vertical-align: middle;" class="text-capitalize text-center">Temuan</th>
                            <th width="5%" style="vertical-align: middle;" class="text-capitalize text-center">Undang-Undang</th>
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
                            <td width="10%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['ketua']; ?></td>
                            <td width="10%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['anggota']; ?></td>
                            <td width="10%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['ts']; ?></td>
                            <td width="5%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['uu']; ?></td>
                            <td width="10%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['tgl']; ?></td>
                            <td width="5%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['no']; ?></td>
                            <td width="10%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['batas']; ?></td>
                            <td width="5%" style="vertical-align: middle;" class="text-capitalize">
                              <div class="btn-group">
                                <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                <?php if ($_SESSION['masuk']['status'] == 1 || $_SESSION['masuk']['status'] == 3){ ?>
                                  <li><a style="cursor:pointer;" onclick="window.location='<?php echo base_url().'berita/form/berita/'.$value['id'].'-edit';?>'" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
                                <?php } if ($_SESSION['masuk']['status'] == 1 || $_SESSION['masuk']['status'] == 4){ ?>
                                  <li><a style="cursor:pointer;" onclick="window.location='<?php echo base_url().'berita/form/tindak/'.$value['id'].'-edit';?>'" title="Tindak Lanjut"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Tindak Lanjut</a></li>
                                <?php } ?>
                                </ul>
                              </div>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div role="tabpanel" class="tab-pane table-responsive" id="btl" style="max-width: auto; overflow-x: scroll;">
                    <div style="width: 150%;">
                      <table style="width: 100%;" class="datatable card-table table-striped table-bordered table-hover table">
                        <thead>
                          <tr>
                            <th width="5%" style="vertical-align: middle;" class="text-capitalize text-center">#</th>
                            <th width="20%" style="vertical-align: middle;" class="text-capitalize text-center">SKPD</th>
                            <th width="5%" style="vertical-align: middle;" class="text-capitalize text-center">Code</th>
                            <th width="10%" style="vertical-align: middle;" class="text-capitalize text-center">Undang-Undang</th>
                            <th width="10%" style="vertical-align: middle;" class="text-capitalize text-center">Tanggal</th>
                            <th width="10%" style="vertical-align: middle;" class="text-capitalize text-center">Temuan</th>
                            <th width="10%" style="vertical-align: middle;" class="text-capitalize text-center">Saran</th>
                            <th width="10%" style="vertical-align: middle;" class="text-capitalize text-center">Batas</th>
                            <th width="5%" style="vertical-align: middle;" class="text-capitalize text-center">Progres</th>
                            <th width="10%" style="vertical-align: middle;" class="text-capitalize text-center">Status</th>
                            <th width="5%" style="vertical-align: middle;" class="text-capitalize text-center"><i class="fa fa-cogs" title="Opsi"></i></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($data as $key => $value){ if (!empty($value['tanggal'])) { ?>
                          <tr>
                            <td width="5%" style="vertical-align: middle;" class="text-capitalize"><?php echo ($key+1); ?></td>
                            <td width="20%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['skpd']; ?></td>
                            <td width="5%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['code']; ?></td>
                            <td width="10%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['uu']; ?></td>
                            <td width="10%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['tanggal']; ?></td>
                            <td width="10%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['ts']; ?></td>
                            <td width="10%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['saran']; ?></td>
                            <td width="10%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['batas']; ?></td>
                            <td width="5%" style="vertical-align: middle;" class="text-capitalize"><?php echo (empty($value['probl'])) ? '' : $value['probl'].' %' ; ?></td>
                            <td width="10%" style="vertical-align: middle;" class="text-capitalize"><?php echo $status[$value['status']]; ?></td>
                            <td width="5%" style="vertical-align: middle;" class="text-capitalize">
                              <div class="btn-group">
                                <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                <?php if ($_SESSION['masuk']['status'] == 1 || $_SESSION['masuk']['status'] == 4){ ?>
                                  <li><a style="cursor:pointer;" onclick="window.location='<?php echo base_url().'berita/form/tindak/'.$value['id'].'-edit';?>'" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
                                <?php } if ($_SESSION['masuk']['status'] != 5){ ?>
                                  <li><a style="cursor:pointer;" onclick="window.location='<?php echo base_url().'berita/form/file/'.$value['id'].'-edit';?>'" title="Upload File"><i class="fa fa-file-text" aria-hidden="true"></i> Upload File</a></li>
                                <?php } ?>
                                  <li><a style="cursor:pointer;" onclick="window.location='<?php echo base_url().'berita/progres/'.$value['id'];?>'" title="Progres"><i class="fa fa-line-chart" aria-hidden="true"></i> Progres</a></li>
                                </ul>
                              </div>
                            </td>
                          </tr>
                          <?php }} ?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div role="tabpanel" class="tab-pane table-responsive" id="bl" style="width: 100%;">
                    <table style="width: 100%;" class="datatable card-table table-striped table-bordered table-hover table">
                      <thead>
                        <tr>
                          <th width="5%" style="vertical-align: middle;" class="text-capitalize text-center">#</th>
                          <th width="35%" style="vertical-align: middle;" class="text-capitalize text-center">SKPD</th>
                          <th width="5%" style="vertical-align: middle;" class="text-capitalize text-center">Code</th>
                          <th width="20%" style="vertical-align: middle;" class="text-capitalize text-center">Tanggal</th>
                          <th width="20%" style="vertical-align: middle;" class="text-capitalize text-center">Batas</th>  
                          <th width="5%" style="vertical-align: middle;" class="text-capitalize text-center">Progres</th>
                          <th width="10%" style="vertical-align: middle;" class="text-capitalize text-center">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $key => $value){ if(!empty($value['file'])) { ?>
                        <tr>
                          <td width="5%" style="vertical-align: middle;" class="text-capitalize"><?php echo ($key+1); ?></td>
                          <td width="35%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['skpd']; ?></td>
                          <td width="5%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['code']; ?></td>
                          <td width="20%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['tgl']; ?></td>
                          <td width="20%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['batas']; ?></td> 
                          <td width="5%" style="vertical-align: middle;" class="text-capitalize"><?php echo (empty($value['protl'])) ? '' : $value['protl'].' %' ; ?></td>
                          <td width="10%" style="vertical-align: middle;" class="text-capitalize">
                            <div class="btn-group">
                              <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                              <ul class="dropdown-menu pull-right" role="menu">
                                <li><a style="cursor: pointer;" onclick="window.location='<?php echo base_url().'berita/progres/'.$value['id'];?>'" title="Progres"><i class="fa fa-line-chart" aria-hidden="true"></i> Progres</a></li>
                                <li><a  data-toggle="modal" style="cursor: pointer;" data-target="#myModal" onclick="files('file<?php echo $key; ?>');"><i class="fa fa-file" aria-hidden="true"></i> File</a></li>
                              </ul>
                            </div>

                            <div style="display: none;" id="file<?php echo $key; ?>">
                            <?php if (array_key_exists('file', $value)){foreach ($value['file'] as $k => $val) { ?>
                              <div class="col-xs-3"><a target="_blank" href="<?php echo base_url().$val; ?>"><span class="badge badge-info badge-icon"><i class="fa fa-file" aria-hidden="true"></i><span>File <?php echo $value['waktu'][$k] ?></span></span></a></div>
                            <?php }} ?>
                            </div>

                          </td>
                        </tr>
                        <?php }} ?>
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
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">File</h4>
        </div>
        <div class="modal-body row text-center" id="files"></div>
        <div class="modal-footer">
          <button style="vertical-align: middle;" type="button" class="btn badge badge-danger badge-icon" data-dismiss="modal"><i aria-hidden="true" class="fa fa-close"></i></button>
        </div>
      </div>
    </div>
  </div>
</div>