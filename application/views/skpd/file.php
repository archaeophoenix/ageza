<div class="row">
  
  <div class="col-xs-6">
    <div class="card">
    <div class="card-header text-capitalize">Upload Berkas <?php echo $data['nama'];?></div>
      <div class="card-body">
        <div class="row">
          <form class="form form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url().'skpd/subfile/'.$id; ?>">
            <div class="section">
              <div class="section-body __indent">
                <div class="file" rel="1">
                  <div class="form-group" id="file1">
                    <div class="col-xs-11"><input style="border-radius: 50px;" type="file" class="form-control btn" name="file[1]" placeholder=""></div>
                    <div class="col-xs-1"><button style="vertical-align: middle;" type="button" class="btn badge badge-danger badge-icon" onclick="elif(1);" title="Hapus File"><i class="fa fa-close"></i></button></div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="form-footer">
              <div class="form-group">
                <div class="col-xs-8 col-xs-offset-4 text-right">

                  <button type="button" class="btn btn-success btn-xs" title="Tambah File" onclick="file();"><i class="fa fa-plus"></i></button>
                  <button type="submit" class="btn btn-primary btn-xs" title="Simpan"><i class="fa fa-check"></i></button>
                  <button type="button" class="btn btn-danger btn-xs" onclick="window.history.back();" title="Batal"><i class="fa fa-close"></i></button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-xs-6">
    <div class="card">
    <div class="card-header text-capitalize">Berkas <?php echo $data['nama'];?></div>
      <div class="card-body">
        <div class="row">
          <div class="table-responsive">
            <table class="datatable card-table table table-striped primary" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>File</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($files as $key => $value){ ?>
                <tr>
                  <td><a target="_blank" href="<?php echo base_url().'assets/'.$id.'/'.$value; ?>"><span class="badge badge-info badge-icon"><i class="fa fa-file" aria-hidden="true"></i><span>File <?php echo $value; ?></span></span></a></td>
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