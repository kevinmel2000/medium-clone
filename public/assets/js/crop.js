$("#browsePict").change(function(){
	var reader = new FileReader();
	reader.onload = function(e){
		$('img#crop').attr('src', e.target.result);
	}
	reader.readAsDataURL($(this).prop('files')[0]);
	crop();
});

function crop()
{
	var $image = $('img#crop'),
	canvasData,
	cropBoxData;

	$image.cropper({
	autoCropArea: 0.5,
	aspectRatio: 1 / 1,
	built: function () {
	  $image.cropper('setCanvasData', canvasData);
	  $image.cropper('setCropBoxData', cropBoxData);
	}
	});
}