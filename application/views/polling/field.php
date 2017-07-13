<div class="row">
  
  <div class="col-xs-6">
    <div class="card card-mini">
      <div class="card-header">Polling</div>
      <div class="card-body">
        <form class="form form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url().'polling/submit/'; ?>">
          <div class="section">
            <div class="section-body">
                
              <div class="form-group">
                <div class="col-xs-12">
                  <select class="form-control select2" name="id_skpd">
                    <?php foreach ($skpd as $key => $value){ ?>
                      <option value="<?php echo $value['id']; ?>"><?php echo $value['nama']; ?></option>
                      <?php } ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-12">
                  <input style="border-radius: 50px;" type="number" class="form-control text-capitalize" name="nilai" min="1" max="10" step="5" placeholder="nilai 1-10">
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
      <div class="card-header">Polling</div>
      <div class="card-body">
        <div class="row">
          <div class="col-xs-8">
            <div class="chart ct-chart-browser ct-perfect-fourth"></div>
          </div>
          <div class="col-xs-4">
            <ul class="chart-label">
              <?php foreach ($bulan as $key => $value){ ?>
              <li class="ct-label ct-series-<?php echo $abjad[$key]; ?> bulanan" rel="<?php echo number_format($value['nilai'] / $sum['nilai'] * 100,2); ?>"><?php echo $value['skpd']; ?></li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>