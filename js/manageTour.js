
function tourUpdate(tid){

  var req = new XMLHttpRequest();
  req.onreadystatechange == function(){
     if(req.readyState == 4){
       var data1 = req.responseText;

       alert(data1);
     }
  };

  req

}