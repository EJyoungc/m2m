<x-layout.load>
<p></p>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
    
    <center><p >Please Wait!</p></center>
    
    <div class="container">  


<div  class="progress">  
<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:0%" id="myBar">

  70%  
</div>  
</div>  
</div> 

     



    <script>function move(){
        console.log('working');
        var elem = document.getElementById("myBar");
        var width = 1;
        var id =setInterval(frame, 100);
        function frame(){

            if (width >= 100){
                clearInterval(id);
                window.location = "https://edo.test/home";
            }else{
                width++;
                elem.style.width = width +'%';
                elem.innerHTML = width * 1 + '%';
            } 
        }
    } 
            
        </script>

</x-layout.load>
