<div class="row">

  <div class="col-xs-12">
    <div class="card card-mini">
      <div class="card-header">
        <div class="col-xs-2">List Temuan Tindak Lanjut</div>
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
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#ra" aria-controls="ra" role="tab" data-toggle="tab">Berita Acara</a></li>
                  <li role="presentation"><a href="#btl" aria-controls="btl" role="tab" data-toggle="tab">Tindak Lanjut</a></li>
                </ul>

                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane table-responsive active" id="ra" style="width: 100%;">
                    <table style="width: 100%;" class="datatable2 card-table table-striped table-bordered table-hover table">
                      <thead>
                        <tr>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">SKPD</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">Penanggung Jawab</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">Ketua</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">Anggota</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">Temuan</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">Undang-Undang</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">Tanggal</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">No Surat</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center"><i class="fa fa-cogs" title="Opsi"></i></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $key => $value){ ?>
                        <tr>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['skpd']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['tj']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['ketua']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['anggota']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['ts']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['uu']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['no']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize">
                          <?php if (!empty($value['file'])) { ?>
                            <a data-toggle="modal" style="cursor: pointer;" data-target="#myModal" onclick="files('file<?php echo $key; ?>');"><span class="badge badge-info badge-icon"><i class="fa fa-file" aria-hidden="true"></i><span>File</span></span></a>
                            <div style="display: none;" id="file<?php echo $key; ?>">
                            <?php foreach ($value['file'] as $k => $val) { ?>
                              <div class="col-xs-3"><a target="_blank" href="<?php echo base_url().$val; ?>"><span class="badge badge-info badge-icon"><i class="fa fa-file" aria-hidden="true"></i><span>File</span></span></a></div>
                            <?php } ?>
                            </div>
                          <?php } ?>
                          </td>
                          <td style="vertical-align: middle;" class="text-capitalize"><a href="<?php echo base_url().'berita/form/'.$value['id'].'-edit'; ?>"><i class="fa fa-edit" title="Edit"></i></a></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>

                  <div role="tabpanel" class="tab-pane table-responsive" id="btl" style="width: 100%;">
                    <table style="width: 100%;" class="datatable2 card-table table-striped table-bordered table-hover table">
                      <thead>
                        <tr>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">SKPD</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">Undang-Undang</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">Tanggal</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">Batas</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">Temuan</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">Saran</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">Status</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center">File</th>
                          <th style="vertical-align: middle;" class="text-capitalize text-center"><i class="fa fa-cogs" title="Opsi"></i></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $key => $value){ ?>
                        <tr>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['skpd']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['uu']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['tanggal']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['batas']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['ts']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['saran']; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize"><?php echo $status[$value['status']]; ?></td>
                          <td style="vertical-align: middle;" class="text-capitalize">
                          <?php if (!empty($value['file'])) { ?>
                            <a data-toggle="modal" style="cursor: pointer;" data-target="#myModal" onclick="files('file<?php echo $key; ?>');"><span class="badge badge-info badge-icon"><i class="fa fa-file" aria-hidden="true"></i><span>File</span></span></a>
                            <div style="display: none;" id="file<?php echo $key; ?>">
                            <?php foreach ($value['file'] as $k => $val) { ?>
                              <div class="col-xs-3"><a target="_blank" href="<?php echo base_url().$val; ?>"><span class="badge badge-info badge-icon"><i class="fa fa-file" aria-hidden="true"></i><span>File</span></span></a></div>
                            <?php } ?>
                            </div>
                          <?php } ?>
                          </td>
                          <td style="vertical-align: middle;" class="text-capitalize"><a href="<?php echo base_url().'berita/form/'.$value['id'].'-edit'; ?>"><i class="fa fa-edit" title="Edit"></i></a></td>
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