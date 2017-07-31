<div class="row">
  
  <div class="col-xs-<?php echo ($_SESSION['masuk']['status'] == 1) ? 4 : 12 ; ?>">
    <div class="card card-mini">
      <div class="card-header"><?php echo (empty($id)) ? 'Tambah' : 'Edit' ; ?> User</div>
      <div class="card-body">
        <form class="form form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url().'user/submit/'.$data['id']; ?>">
          <div class="section">
            <div class="section-body">
              <div class="form-group">
                <div class="col-xs-12">
                  <input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="user[nama]" value="<?php echo $data['nama']; ?>" placeholder="Nama Pengguna">
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-12">
                  <input style="border-radius: 50px;" type="text" class="form-control text-capitalize" name="user[telpon]" value="<?php echo $data['telpon']; ?>" placeholder="+966378">
                </div>
              </div>
                
              <?php if($_SESSION['masuk']['status'] == 1){ ?>
              <div class="form-group">
                <div class="col-xs-12">
                  <select class="form-control select2" name="user[status]">
                    <?php foreach ($status as $key => $value){ ?>
                      <option value="<?php echo $key; ?>" <?php echo ($data['status'] == $key) ? 'selected="selected"' : '' ; ?>><?php echo $value; ?></option>
                      <?php } ?>
                  </select>
                </div>
              </div>

             <!--  <div class="form-group">
                <div class="col-xs-12">
                  <select class="form-control select2" name="user[id_skpd]">
                    <option value="">&nbsp;</option>
                    <?php foreach ($skpd as $key => $value){ ?>
                      <option value="<?php echo $value['id']; ?>" <?php echo ($data['id_skpd'] == $value['id']) ? 'selected="selected"' : '' ; ?>><?php echo $value['nama']; ?></option>
                      <?php } ?>
                  </select>
                </div>
              </div> -->
              <?php } ?>
              
              <div class="form-group">
                <div class="col-xs-12 username">
                  <input style="border-radius: 50px;" type="text" required="required" onchange="valid('username'<?php echo (empty($id)) ? '' : ','.$id ; ?>);" class="form-control" name="user[username]" value="<?php echo $data['username']; ?>" placeholder="username" id="username">
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-12">
                  <input style="border-radius: 50px;" type="password" class="form-control" name="user[password]" placeholder="password">
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

<?php if($_SESSION['masuk']['status'] == 1){ ?>
  <div class="col-xs-8">
    <div class="card">
      <div class="card-header">
        <div class="card-title">User</div>
      </div>
      <div class="card-body no-padding">
        <div class="table-responsive">
          <table class="datatable card-table table table-striped primary" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center text-capitalize">nama</th>
                <th class="text-center text-capitalize">username</th>
                <!-- <th class="text-center text-capitalize">SKPD</th> -->
                <th class="text-center text-capitalize">status</th>
                <th class="text-center text-capitalize" style="">opsi</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $key => $value){ ?>
              <tr>
                <td style="<?php echo ($value['status'] == 0 ) ? 'color: #E74C3C;' : '' ; ?> <?php echo ($value['status'] == 1 ) ? 'color: #20A3B9;' : '' ; ?> vertical-align: middle;" id="no<?php echo $key;?>"><?php echo $key+1; ?></td>
                <td style="<?php echo ($value['status'] == 0 ) ? 'color: #E74C3C;' : '' ; ?> <?php echo ($value['status'] == 1 ) ? 'color: #20A3B9;' : '' ; ?> vertical-align: middle;" class="text-capitalize"><?php echo $value['nama']; ?></td>
                <td style="<?php echo ($value['status'] == 0 ) ? 'color: #E74C3C;' : '' ; ?> <?php echo ($value['status'] == 1 ) ? 'color: #20A3B9;' : '' ; ?> vertical-align: middle;" class="text-capitalize"><?php echo $value['username']; ?></td>
                <!-- <td style="vertical-align: middle;" class="text-capitalize"><?php echo $value['skpd']; ?></td> -->
                <td style="<?php echo ($value['status'] == 0 ) ? 'color: #E74C3C;' : '' ; ?> <?php echo ($value['status'] == 1 ) ? 'color: #20A3B9;' : '' ; ?> vertical-align: middle;" class="text-capitalize"><?php echo $status[$value['status']]; ?></td>
                <td style="vertical-align: middle;">
                  <?php if (is_null($id)){ ?>
                  <p class="text-center">
                    <button type="button" onclick="window.location='<?php echo base_url().'user/field/'.$value['id'];?>'" title="Edit" class="btn badge badge-info badge-icon"><i class="fa fa-edit" aria-hidden="true"></i></button>
                  </p>
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
<?php } ?>

</div>