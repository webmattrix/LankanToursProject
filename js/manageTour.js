
function tourUpdate(t_id){

  var req = new XMLHttpRequest();
  req.onreadystatechange == function(){
     if(req.readyState == 4){
       var data1 = req.responseText;

       alert(data1);
     }
  };

  req.open("GET","tourUpdateProcess.php?tid="+t_id,true);
  req.send();
}