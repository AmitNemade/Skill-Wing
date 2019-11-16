$(document).ready(function(){
    var url = window.location.href;
    console.log(url);
    console.log(getAllUrlParams(url));
    $("#course-content").load("updateinfo.php",
        getAllUrlParams(url));
});



function addCourse(c_id){
  var url = window.location.href;
  console.log(url);
  $("#course-content").load("updateinfo.php",{
    cid: c_id,
    opr:"add"
  });
}

// function editCourse(c_id){
//   var url = window.location.href;
//   console.log(url);
//   $("#course-content").load("updateinfo.php",{
//     cid: c_id
//   });
// }
function deletelecture(c_id){
  var url = window.location.href;
  console.log(url);
  var txt =  $("#delete_lecture_no").val();
  console.log(txt);
  $("#course-content").load("updateinfo.php",{
    cid: c_id,
    opr: "delete",
    lno: txt
  });
}


function getAllUrlParams(url) {
    var queryString = url ? url.split('?')[1] : window.location.search.slice(1);
    var obj = {};
  
    if (queryString) {
      queryString = queryString.split('#')[0];
      var arr = queryString.split('&');
  
      for (var i = 0; i < arr.length; i++) {
        var a = arr[i].split('=');
        var paramName = a[0];
        var paramValue = typeof (a[1]) === 'undefined' ? true : a[1];
  
        paramName = paramName.toLowerCase();
        if (typeof paramValue === 'string') paramValue = paramValue.toLowerCase();
  
        if (paramName.match(/\[(\d+)?\]$/)) {
          var key = paramName.replace(/\[(\d+)?\]/, '');
          if (!obj[key]) obj[key] = [];
  
          if (paramName.match(/\[\d+\]$/)) {
            var index = /\[(\d+)\]/.exec(paramName)[1];
            obj[key][index] = paramValue;
          } else {
            obj[key].push(paramValue);
          }
        } else {
          if (!obj[paramName]) {
            obj[paramName] = paramValue;
          } else if (obj[paramName] && typeof obj[paramName] === 'string'){
            obj[paramName] = [obj[paramName]];
            obj[paramName].push(paramValue);
          } else {
            obj[paramName].push(paramValue);
          }
        }
      }
    }
  
    return obj;
  }
