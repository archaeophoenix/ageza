$(function() {

	$('.select2-selection').attr('style','border-radius:50px;');
	$('.select2-dropdown').attr('style','border-radius:15px;');
	$('.select2-search').attr('style','border-radius:15px;');

	$(".datepicker").daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        format: 'DD-MM-YYYY'
	});

	$('.timepicker').timepicker({
		showInputs: false,
		minuteStep: 5,
		showMeridian : false
	});

	$("[rel='tooltip']").tooltip();    
    $('.thumbnail').hover(
      function(){
        $(this).find('.caption').fadeIn(250)
      },
      function(){
        $(this).find('.caption').fadeOut(205)
      }
    );

    if($('.skpd').val() == '4'){
    	$('#skpd').removeAttr('disabled');
    }

});

function spj(b){
	var a = ($('input[name|="'+b+'_anggaran"]').val()) ? parseInt($('input[name|="'+b+'_anggaran"]').val()) : 0 ;
	var r = ($('input[name|="'+b+'_realisasi"]').val()) ? parseInt($('input[name|="'+b+'_realisasi"]').val()) : 0 ;
	var s = (a && r) ? a - r : '' ;
	s = (s < 0) ? '' : s ;
	$('input[name|="'+b+'_sisa"]').val(s);
}

function dpks(param){
	var nilai = $('.'+param).val();
	console.log(nilai);
	if (nilai == 4) {
		$('#'+param).removeAttr('disabled');
	} else {
		$('#'+param).select2('val','0');
		$('#'+param+' option[val=0]').attr('selected','selected');
		$('#'+param).attr('disabled','disabled');
	}
}

function files(id){
	var file = $('#files'+id).html();
	var detail = $('#btl'+id).html();
	$('#files').html(file);
	$('#btl').html(detail);
	/*$('.detail').each(function(){
		console.log($(this).attr('rel'));
		console.log($(this).attr('id'));
	});*/
}

function bind(id,param){
	var val = $('#'+param+' option:selected').attr("rel");
	$('#'+id).val(val);
}

function persen(param){
	var total = 0;
	var persen = parseInt($('#'+param).val());
	var nilai = $('input[name|="nilai['+param+']"]').val();
	nilai = (nilai == '') ? 0 : parseInt(nilai) ;
	total = nilai + persen;
	if (total > 100) {
		$('.'+param).attr('class','col-xs-6 '+param+' has-error');
		$('button[title|="Simpan"]').attr('disabled','disabled');
	} else {
		$('.'+param).attr('class','col-xs-6 '+param+' has-success');
		$('button[title|="Simpan"]').removeAttr('disabled');
	}
}

function valid(param, id = null){
	var base = $('#base').val();
	var username = $('#'+param).val();
	var uri = (id) ? {'username':username, 'id':id} : {'username':username} ;
	if ($('#'+param).val().trim() == '') {
		$('#'+param).val(Math.random().toString(36).substr(2, 9));
		$('button[title|="Simpan"]').removeAttr('disabled');
		$('.'+param).attr('class','col-xs-12 '+param+' has-success');
	} else {
		$.post(base+'user/username', uri, function(data) {
			// $("#user-result").html(data);
			console.log(data);
			$('.'+param).attr('class','col-xs-12 '+param+' '+data);
			if(data == 'has-success'){
				$('button[title|="Simpan"]').removeAttr('disabled');
			} else {
				$('button[title|="Simpan"]').attr('disabled','disabled');
			}
		});
	}
}

function printpage(lru = null){
    var originalContents = document.body.innerHTML;
    var printReport= document.getElementById('print').innerHTML;
    document.body.innerHTML = printReport;
    /*if ($('#print').css('display') == 'none') {
    	$('#print').removeAttr('style');
    }*/
    window.print();
    /*if (!$('#print').attr('style')) {
    	$('#print').css('display','none');
    }*/
    document.body.innerHTML = originalContents;
    console.log(lru);
	window.location.href = 'http://' + lru ;
}

function periode(detail = null){
	var det = '';
	var url = $("#base").val();
	var link = $("#link").val();
	var bulan = $("#bulan").val();
	var tahun = $("#tahun").val();
	if(detail){
		det = '/'+$('#'+detail).val();
	}
	window.location = url+''+link+'/'+bulan+'/'+tahun+det; //Relative or absolute path to response.php file
}

function file(){
	var baris = $('.file').attr('rel');
	baris++;
	$('.file').attr('rel', baris);

	var d = new Date();
	var gen = d.getDate()+''+d.getHours()+''+d.getMinutes()+''+d.getSeconds()+''+d.getMilliseconds();

	$('.file').append('<div class="form-group" id="file'+gen+'"><div class="col-xs-11"><input style="border-radius: 50px;" type="file" class="form-control btn" name="file['+gen+']" placeholder=""></div><div class="col-xs-1"><button style="vertical-align: middle;" type="button" class="btn badge badge-danger badge-icon" onclick="elif('+gen+');" title="Hapus File"><i class="fa fa-close"></i></button></div></div>');
}

function elif(id){
	var baris = parseInt($('.file').attr('rel'));
	if (baris > 1) {
		baris--;
		$('.file').attr('rel',baris);
		$('#file'+id).remove();

	} else {
		alert('baris anda tinggal satu, anda tidak bisa menghapus baris lagi');
	}
}