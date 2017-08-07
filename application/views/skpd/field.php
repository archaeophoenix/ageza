<div class="row">

  <?php if($_SESSION['masuk']['status'] == 1){ ?>
  <div class="col-xs-4">
    <div class="card card-mini">
      <div class="card-header"><?php echo (empty($id)) ? 'Tambah' : 'Edit' ; ?> SKPD</div>
      <div class="card-body">
        <form class="form form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url().'skpd/submit/'.$data['id']; ?>">
          <div class="section">
            <div class="section-body">
              <div class="form-group">
                <div class="col-xs-12">
                  <input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="nama" value="<?php echo $data['nama']; ?>" placeholder="nama skpd">
                </div>
              </div>
            </div>
          </div>
          <div class="form-footer">
            <div class="form-group">
              <div class="col-xs-8 col-xs-offset-4 text-right">
                <button type="submit" class="btn btn-primary btn-xs" title="Simpan"><i class="fa fa-check"></i></button>
                <?php if (!is_null($id)){ ?>
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
  <?php } ?>

  <div class="col-xs-<?php echo ($_SESSION['masuk']['status'] == 1) ? 8 : 12 ;?>">
    <div class="card">
      <div class="card-header">
        <div class="card-title">SKPD</div>
      </div>
      <div class="card-body no-padding">
        <div class="table-responsive">
          <table class="datatable card-table table table-striped primary" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th width="10%" class="text-center">#</th>
                <th width="60%" class="text-center text-capitalize">nama skpd</th>
                <th width="30%" class="text-center text-capitalize">opsi</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $key => $value){ ?>
              <tr>
                <td width="10%" style="vertical-align: middle;" id="no<?php echo $key;?>"><?php echo $key+1; ?></td>
                <td width="60%" style="vertical-align: middle;" class="text-capitalize"><?php echo $value['nama']; ?></td>
                <td width="30%" style="vertical-align: middle;" class="text-center">
                  <?php if (is_null($id)){ ?>
                  <div class="btn-group">
                    <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                    <ul class="dropdown-menu pull-right pull-bottom" role="menu">
                      <?php if($_SESSION['masuk']['status'] == 1){ ?>
                      <li><a style="cursor: pointer;" onclick="window.location='<?php echo base_url().'skpd/field/'.$value['id'];?>'" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
                      <?php } ?>
                      <li><a style="cursor: pointer;" onclick="window.location='<?php echo base_url().'temuan/datas/'.date('m').'/'.date('Y').'/'.$value['id'];?>'" title="Temuan"><i class="fa fa-list-alt" aria-hidden="true"></i> Temuan</a></li>
                      <li><a style="cursor: pointer;" onclick="window.location='<?php echo base_url().'berita/datas/'.date('m').'/'.date('Y').'/'.$value['id'];?>'" title="Berita"><i class="fa fa-file-text-o" aria-hidden="true"></i> Berita</a></li>
                    </ul>
                  </div>
                  <button style="cursor:pointer;" class="btn badge badge-info badge-icon" onclick="window.location='<?php echo base_url().'skpd/file/'.$value['id'];?>'" title="Berkas"><i class="fa fa-file-text" aria-hidden="true"></i> Berkas</button>
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

</div>