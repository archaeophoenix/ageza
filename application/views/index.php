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

  <div class="col-xs-12">
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
</div>