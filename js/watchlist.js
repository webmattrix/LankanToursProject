var select_text = document.getElementById("select_text");
var openList = document.getElementById("openList");
var iconShow = document.getElementById("iconShow");
var textInc = document.getElementById("textInc");
var search_field = document.getElementById("search_field");
var listItems = document.querySelectorAll(".selectItem");

select_text.onclick = function(){
    if(openList.classList.contains("show")){
        iconShow.style.rotate = "0deg";
    }else{
        iconShow.style.rotate = "-180deg";
    }
    openList.classList.toggle("show");
};

window.onclick = function(e){
    if(e.target.id !== "select_text" && e.target.id !== "textInc" && e.target.id !== "iconShow"){
        openList.classList.remove("show");
       iconShow.style.rotate = "0deg";
    }
};

for(item of listItems){
   item.onclick = function(e){
      textInc.innerText = e.target.innerText;
 
      if(e.target.innerText == "Places"){
        search_field.placeholder = "search here...";
      }else{
        search_field.placeholder = "search in " + e.target.innerText + "...";
      }
   };
}