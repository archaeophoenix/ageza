    <footer class="app-footer"> 
      <div class="row">
        <div class="col-xs-12">
          <div class="footer-copyright">
            <input type="hidden" id="base" value="<?php echo base_url(); ?>">
            <?php if (isset($link)){ ?>
            <input type="hidden" id="link" value="<?php echo $link; ?>">
            <?php } ?>
            <input type="hidden" id="page" value="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>">
            Copyright © 2017 Satuan Kerja Perangkat Daerah Kabupaten Lamongan <!-- - Powered by Laabana Lab.-->
          </div>
        </div>
      </div>
    </footer>
    </div>
  </div>
</body>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/daterangepicker.js"></script>

<!-- time-picker -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
</html>