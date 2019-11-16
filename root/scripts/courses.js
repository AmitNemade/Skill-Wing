$(document).ready(function(){
  $(".search-result").hide();
  $("#courses").load("search.php", {
    find: "All",
    category: "",
    subcategory: ""
  });
});

function sortCourses(){
  $(".search-result").show(700);
  var x = $("#search-bar").val();
  console.log(x);
  if(x != ""){
    $("#display-result").text(x);
    $("#courses").load("search.php",{
    find: x,
    category: "",
    subcategory: ""
    });
  }
  else{
    $(".search-result").hide(700);
    $("#courses").load("search.php",{
      find: "All",
      category: "",
      subcategory: ""
      });
  }
}

$('a.allcategory').click(function(e) {
  $(".search-result").show(700);
  var x = $(e.target).text();
  console.log(x);
  if(x != ""){
    $("#courses").load("search.php", {
      find: "All",
      category: "",
      subcategory: ""
    });
  }
  else{
    $(".search-result").hide();
  }
  
});

$('a.category').click(function(e) {
  $(".search-result").show(700);
  var x = $(e.target).text();
  console.log(x);
  if(x != ""){
    $("#search-bar").val(x)
    $("#display-result").text(x);
    $("#courses").load("search.php",{
    find: "",
    category: x,
    subcategory: ""
    });
  }
  else{
    $(".search-result").hide();
  }
  
});
$('a.subcategory').click(function(e) {
  $(".search-result").show(700);
  var x = $(e.target).text();
  console.log(x);
  if(x != ""){
    $("#search-bar").val(x)
    $("#display-result").text(x);
    $("#courses").load("search.php",{
    find: "",
    category: "",
    subcategory: x
    });
  }
  else{
    $(".search-result").hide();
  }
  
});