<div class="row">
  
  <div class="col-xs-6">
    <div class="card card-mini">
      <div class="card-header">Progress</div>
      <div class="card-body">
        <form class="form form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url().'berita/subpro/'.$data['id']; ?>">
          <div class="section">
            <div class="section-body">
              <div class="form-group">
                <div class="col-xs-6"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">Progress</label></div>
                <div class="col-xs-6"><label style="vertical-align: middle;" class="form-label text-center text-capitalize"><?php echo $data['skpd']; ?></label></div>
              </div>
              <div class="form-group">
                <div class="col-xs-6"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">Batas</label></div>
                <div class="col-xs-6"><label style="vertical-align: middle;" class="form-label text-center text-capitalize"><?php echo $data['batas']; ?></label></div>
              </div>
              <div class="form-group">
                <div class="col-xs-6"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">Belanja Langsung </label>&nbsp;<span class="badge badge-success badge-icon"><?php echo $data['probl'] ?>%</span></div>
                <div class="col-xs-6">
                  <div class="progress" style="background-color: transparent; border-radius: 50px;"><div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $data['probl'] ?>" aria-valuemin="0" aria-valuemax="100" style="border-radius: 50px; border: none; width: <?php echo $data['probl'] ?>%"></div></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-6"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">Tindak Lanjut </label>&nbsp;<span class="badge badge-info badge-icon"><?php echo $data['protl'] ?>%</span></div>
                <div class="col-xs-6">
                  <div class="progress" style="background-color: transparent; border-radius: 50px;"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $data['protl'] ?>" aria-valuemin="0" aria-valuemax="100" style="border-radius: 50px; border: none; width: <?php echo $data['protl'] ?>%"></div></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-6"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">Progress Belanja Langsung</label></div>
                <div class="col-xs-6 probl">
                  <input type="hidden" id="probl" value="<?php echo $data['probl']; ?>">
                  <input style="border-radius: 50px;" type="text" required="required" class="form-control" name="nilai[probl]" oninput="persen('probl');" placeholder="Progress Belanja Langsung">
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-6"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">Progress Tindak Lanjut</label></div>
                <div class="col-xs-6 protl">
                  <input type="hidden" id="protl" value="<?php echo $data['protl']; ?>">
                  <input style="border-radius: 50px;" type="text" required="required" class="form-control" name="nilai[protl]" oninput="persen('protl');" placeholder="Progress Tindak Lanjut">
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-6"><label style="vertical-align: middle;" class="form-label text-center text-capitalize">Status</label></div>
                <div class="col-xs-6">
                  <select name="berita[status]" class="select2 form-control">
                    <?php foreach ($status as $key => $value){ ?>
                      <option value="<?php echo $key; ?>" <?php echo ($data['status'] == $key) ? 'selected="selected"' : '' ; ?>><?php echo $value; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-footer">
            <div class="form-group">
              <div class="col-xs-8 col-xs-offset-4 text-right">
                <button type="submit" class="btn btn-primary btn-xs" title="Simpan"><i class="fa fa-check"></i></button>
                <button type="button" class="btn btn-danger btn-xs" onclick="window.history.back();" title="Batal"><i class="fa fa-close"></i></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-xs-6">
    <div class="card card-mini">
      <div class="card-header">History Progress</div>
      <div class="card-body">
        <div class="section">
          <div class="section-body">
            <div role="tabpanel">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tl" aria-controls="tl" role="tab" data-toggle="tab">Tindak Lanjut</a></li>
                <li role="presentation"><a href="#bl" aria-controls="bl" role="tab" data-toggle="tab">Belanja Langsung</a></li>
              </ul>

              <div class="tab-content">
                <div role="tabpanel" class="tab-pane table-responsive active" id="tl" style="width: 100%;">
                  <table style="width: 100%;" class="datatable card-table table-striped table-bordered table-hover table">
                    <thead>
                      <tr>
                        <th style="vertical-align: middle;" class="text-capitalize text-center" width="10%">#</th>
                        <th style="vertical-align: middle;" class="text-capitalize text-center" width="45%">Progress</th>
                        <th style="vertical-align: middle;" class="text-capitalize text-center" width="45%">Tanggal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $pre = 0; foreach ($protl as $key => $value){ $pre += $value['nilai']; ?>
                      <tr>
                        <td style="vertical-align: middle;" class="text-capitalize text-center" width="10%"><?php echo ($key + 1); ?></td>
                        <td style="vertical-align: middle;" class="text-capitalize text-center" width="45%"><?php echo $pre; ?>%</td>
                        <td style="vertical-align: middle;" class="text-capitalize text-center" width="45%"><?php echo $value['waktu']; ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>

                <div role="tabpanel" class="tab-pane table-responsive" id="bl" style="width: 100%;">
                  <table style="width: 100%;" class="datatable card-table table-striped table-bordered table-hover table">
                    <thead>
                      <tr>
                        <th style="vertical-align: middle;" class="text-capitalize text-center" width="10%">#</th>
                        <th style="vertical-align: middle;" class="text-capitalize text-center" width="45%">Progress</th>
                        <th style="vertical-align: middle;" class="text-capitalize text-center" width="45%">Tanggal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $pre = 0; foreach ($probl as $key => $value){ $pre += $value['nilai']; ?>
                      <tr>
                        <td style="vertical-align: middle;" class="text-capitalize text-center" width="10%"><?php echo ($key + 1); ?></td>
                        <td style="vertical-align: middle;" class="text-capitalize text-center" width="45%"><?php echo $pre; ?>%</td>
                        <td style="vertical-align: middle;" class="text-capitalize text-center" width="45%"><?php echo $value['waktu']; ?></td>
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