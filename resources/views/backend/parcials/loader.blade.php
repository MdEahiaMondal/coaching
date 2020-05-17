{{--Loader CSS Code--}}
<style>

    #overlay{
        height:100%;
        width:100%;
    }
    .loader{
        width:100px;
        height:100px;
        border-top:5px solid #444444;
        border-bottom:5px solid #ffffff;
        border-radius:50%;
        background-color:transparent;
        position:fixed;
        left:50%;
        top:50%;
        margin-left:-50px;
        margin-top:-50px;
        z-index: 99999999;

        animation: spin 1.5s infinite linear;
    }

    @keyframes spin{
        from{
            transform: rotate(0deg);
        }to{
             transform: rotate(360deg);
         }
    }
</style>

<div id="overlay">
    <div class="loader"></div>
</div>

{{--Loader javaScript Code--}}
<script>
    var overlay = document.getElementById("overlay");
    window.addEventListener('load', function(){
        overlay.style.display = 'none';
    });
</script>
