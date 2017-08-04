<div class="row">
  <div class="col-xs-4 col-xs-6 col-xs-6 col-xs-12">
    <a class="card card-banner card-green-light" onclick="window.location='<?php echo url ?>temuan'">
      <div class="card-body">
        <i class="icon fa fa-list-alt fa-4x"></i>
        <div class="content">
          <div class="title">Temuan Bulan Ini</div>
          <div class="value"><span class="sign"></span><?php echo (empty($temuan['id'])) ? 0 : $temuan['id'] ; ?></div>
        </div>
      </div>
    </a>
  </div>

  <div class="col-xs-4 col-xs-6 col-xs-6 col-xs-12">
    <a class="card card-banner card-blue-light" onclick="window.location='<?php echo url ?>berita'">
      <div class="card-body">
        <i class="icon fa fa-file-text-o fa-4x"></i>
        <div class="content">
          <div class="title">Berita Bulan Ini</div>
          <div class="value"><span class="sign"></span><?php echo (empty($berita['id'])) ? 0 : $berita['id'] ; ?></div>
        </div>
      </div>
    </a>
  </div>

  <div class="col-xs-4 col-xs-6 col-xs-6 col-xs-12">
    <a class="card card-banner card-yellow-light" onclick="window.location='<?php echo url ?>skpd'">
      <div class="card-body">
      <i class="icon fa fa-bank fa-4x"></i>
        <div class="content">
          <div class="title">Total SKPD</div>
          <div class="value"><span class="sign"></span><?php echo (empty($skpd['id'])) ? 0 : $skpd['id'] ; ?></div>
        </div>
      </div>
    </a>
  </div>
</div>

<div class="row">

  <div class="col-xs-5">
    <div class="card card-mini">
      <div class="card-header">Kinerja Bulan <?php echo date('F Y'); ?></div>
      <div class="card-body">
        <div class="row">
          <div class="col-xs-8" style="max-height: 300px;">
            <div style="max-height: 250px;" class="chart ct-chart-browser ct-perfect-fourth"></div>
          </div>
          <div class="col-xs-4">
            <ul class="chart-label">
              <?php foreach ($polling as $key => $value){ ?>
              <li class="ct-label ct-series-<?php echo $abjad[$key]; ?> bulanan" rel="<?php echo $value['nilai']; ?>"><?php echo $value['skpd']; ?></li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xs-7">
    <div class="card card-mini">
      <div class="card-header">&nbsp;</div>
      <div class="card-body">
        <div class="row">
          <div role="tabpanel">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#ra" aria-controls="ra" role="tab" data-toggle="tab">Dalam Progres</a></li>
              <li role="presentation"><a href="#btl" aria-controls="btl" role="tab" data-toggle="tab">Terlewat Batas</a></li>
            </ul>

            <div class="tab-content">
              <div role="tabpanel" class="tab-pane table-responsive active" id="ra" style="width: 100%;">
                <table style="width: 100%;" class="datatable card-table table-striped table-hover table">
                  <thead>
                    <tr>
                      <th width="5%" style="vertical-align: middle;" class="text-capitalize text-center">#</th>
                      <th width="20%" style="vertical-align: middle;" class="text-capitalize text-center">SKPD</th>
                      <th width="20%" style="vertical-align: middle;" class="text-capitalize text-center">Batas</th>
                      <th width="55%" style="vertical-align: middle;" class="text-capitalize text-center">Progres</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($progres as $key => $value){ ?>
                    <tr>
                      <td width="5%" style="vertical-align: middle;" class="text-capitalize text-center"><?php echo ($key + 1); ?></td>
                      <td width="20%" style="vertical-align: middle;" class="text-capitalize text-center"><?php echo $value['skpd']; ?></td>
                      <td width="20%" style="vertical-align: middle;" class="text-capitalize text-center"><?php echo $value['batas']; ?></td>
                      <td width="55%" style="vertical-align: middle;" class="text-capitalize text-center">
                        <div class="progress" style="background-color: transparent; border-radius: 50px;" title="Belanja Langsung <?php echo (empty($value['probl'])) ? '' : $value['probl'].' %' ; ?>"><div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $value['probl'] ?>" aria-valuemin="0" aria-valuemax="100" style="border-radius: 50px; border: none; width: <?php echo $value['probl'] ?>%"></div></div>
                        <div class="progress" style="background-color: transparent; border-radius: 50px;" title="Tindak Lanjut <?php echo (empty($value['protl'])) ? '' : $value['protl'].' %' ; ?>"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $value['protl'] ?>" aria-valuemin="0" aria-valuemax="100" style="border-radius: 50px; border: none; width: <?php echo $value['protl'] ?>%"></div></div>
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
                      <th width="5%" style="vertical-align: middle;" class="text-capitalize text-center">#</th>
                      <th width="20%" style="vertical-align: middle;" class="text-capitalize text-center">SKPD</th>
                      <th width="20%" style="vertical-align: middle;" class="text-capitalize text-center">Batas</th>
                      <th width="55%" style="vertical-align: middle;" class="text-capitalize text-center">Progres</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($ended as $key => $value){ ?>
                    <tr>
                      <td width="5%" style="vertical-align: middle;" class="text-capitalize text-center"><?php echo ($key + 1); ?></td>
                      <td width="20%" style="vertical-align: middle;" class="text-capitalize text-center"><?php echo $value['skpd']; ?></td>
                      <td width="20%" style="vertical-align: middle;" class="text-capitalize text-center"><?php echo $value['batas']; ?></td>
                      <td width="55%" style="vertical-align: middle;" class="text-capitalize text-center">
                      <div class="progress" style="background-color: transparent; border-radius: 50px;" title="Belanja Langsung <?php echo (empty($value['probl'])) ? '' : $value['probl'].' %' ; ?>"><div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $value['probl'] ?>" aria-valuemin="0" aria-valuemax="100" style="border-radius: 50px; border: none; width: <?php echo $value['probl'] ?>%"></div></div>
                        <div class="progress" style="background-color: transparent; border-radius: 50px;" title="Tindak Lanjut <?php echo (empty($value['protl'])) ? '' : $value['protl'].' %' ; ?>"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $value['protl'] ?>" aria-valuemin="0" aria-valuemax="100" style="border-radius: 50px; border: none; width: <?php echo $value['protl'] ?>%"></div></div>
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

  <div class="col-xs-12">
    <div class="card card-mini">
      <div class="card-header">&nbsp;</div>
      <div class="card-body">
        <div class="row">
          <div role="tabpanel">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#ra" aria-controls="ra" role="tab" data-toggle="tab">Dalam Progres</a></li>
              <li role="presentation"><a href="#btl" aria-controls="btl" role="tab" data-toggle="tab">Terlewat Batas</a></li>
            </ul>

            <div class="tab-content">
              <div role="tabpanel" class="tab-pane table-responsive active" id="ra" style="max-width: auto; overflow-x: scroll;">
                <div style="width: 200%;">
                  <table class="datatable card-table table-striped table-hover table">
                    <thead>
                      <tr>
                        <th width="5%" style="vertical-align: middle;" class="text-capitalize text-center">#</th>
                        <th width="20%" style="vertical-align: middle;" class="text-capitalize text-center">SKPD</th>
                        <th width="20%" style="vertical-align: middle;" class="text-capitalize text-center">Batas</th>
                        <th width="55%" style="vertical-align: middle;" class="text-capitalize text-center">Progres</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($progres as $key => $value){ ?>
                      <tr>
                        <td width="5%" style="vertical-align: middle;" class="text-capitalize text-center"><?php echo ($key + 1); ?></td>
                        <td width="20%" style="vertical-align: middle;" class="text-capitalize text-center"><?php echo $value['skpd']; ?></td>
                        <td width="20%" style="vertical-align: middle;" class="text-capitalize text-center"><?php echo $value['batas']; ?></td>
                        <td width="55%" style="vertical-align: middle;" class="text-capitalize text-center">
                          <div class="progress" style="background-color: transparent; border-radius: 50px;" title="Belanja Langsung <?php echo (empty($value['probl'])) ? '' : $value['probl'].' %' ; ?>"><div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $value['probl'] ?>" aria-valuemin="0" aria-valuemax="100" style="border-radius: 50px; border: none; width: <?php echo $value['probl'] ?>%"></div></div>
                          <div class="progress" style="background-color: transparent; border-radius: 50px;" title="Tindak Lanjut <?php echo (empty($value['protl'])) ? '' : $value['protl'].' %' ; ?>"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $value['protl'] ?>" aria-valuemin="0" aria-valuemax="100" style="border-radius: 50px; border: none; width: <?php echo $value['protl'] ?>%"></div></div>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane table-responsive" id="btl" style="max-width: auto; overflow-x: scroll;">
                <div style="width: 200%;">
                  <table class="datatable card-table table-striped table-hover table">
                    <thead>
                      <tr>
                        <th width="5%" style="vertical-align: middle;" class="text-capitalize text-center">#</th>
                        <th width="20%" style="vertical-align: middle;" class="text-capitalize text-center">SKPD</th>
                        <th width="20%" style="vertical-align: middle;" class="text-capitalize text-center">Batas</th>
                        <th width="55%" style="vertical-align: middle;" class="text-capitalize text-center">Progres</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($ended as $key => $value){ ?>
                      <tr>
                        <td width="5%" style="vertical-align: middle;" class="text-capitalize text-center"><?php echo ($key + 1); ?></td>
                        <td width="20%" style="vertical-align: middle;" class="text-capitalize text-center"><?php echo $value['skpd']; ?></td>
                        <td width="20%" style="vertical-align: middle;" class="text-capitalize text-center"><?php echo $value['batas']; ?></td>
                        <td width="55%" style="vertical-align: middle;" class="text-capitalize text-center">
                        <div class="progress" style="background-color: transparent; border-radius: 50px;" title="Belanja Langsung <?php echo (empty($value['probl'])) ? '' : $value['probl'].' %' ; ?>"><div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $value['probl'] ?>" aria-valuemin="0" aria-valuemax="100" style="border-radius: 50px; border: none; width: <?php echo $value['probl'] ?>%"></div></div>
                          <div class="progress" style="background-color: transparent; border-radius: 50px;" title="Tindak Lanjut <?php echo (empty($value['protl'])) ? '' : $value['protl'].' %' ; ?>"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $value['protl'] ?>" aria-valuemin="0" aria-valuemax="100" style="border-radius: 50px; border: none; width: <?php echo $value['protl'] ?>%"></div></div>
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
  </div>

</div>