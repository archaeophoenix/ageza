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

});

function files(id){
	var file = $('#'+id).html();
	$('#files').html(file);
}

function bind(id,param){
	var val = $('#'+param+' option:selected').attr("rel");
	$('#'+id).val(val);
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

function periode(){
	var url = $("#base").val();
	var link = $("#link").val();
	var bulan = $("#bulan").val();
	var tahun = $("#tahun").val();

	window.location = url+''+link+'/'+bulan+'/'+tahun; //Relative or absolute path to response.php file
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