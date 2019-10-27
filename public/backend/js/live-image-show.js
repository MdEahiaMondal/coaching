//Image Show Before Upload Start
$(document).ready(function(){
    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        if (fileName){
            $('#fileLabel').html(fileName);
        }
    });
});

function showImage(data, imgId){
    if(data.files && data.files[0]){
        var obj = new FileReader();

        obj.onload = function(d){
            var image = document.getElementById(imgId);
            image.src = d.target.result;
        };
        obj.readAsDataURL(data.files[0]);
    }
}
//Image Show Before Upload End


/*<tr> <td colspan="2"><img src="{{ asset('backend/images/avatar.png') }}" id="profile_photo" style="max-width: 400px;" alt=""> </td> </tr>
<tr>
<td>
<div class="input-group">
    <div class="custom-file">
    <input type="file" class="custom-file-input"  name="avatar" id="avatar" onchange="showImage(this, 'profile_photo')" value="">
    <label class="custom-file-label" for="inputGroupFile02" id="fileLabel"></label>
    </div>

    </div>
    </td>
    </tr>*/
