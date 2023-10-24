function switchSearchEngine() {
    var searchForm = document.getElementById("searchForm");
    var googleRadio = document.getElementById("googleRadio");
    var bingRadio = document.getElementById("bingRadio");
    var baiduRadio = document.getElementById("baiduRadio");

    if (googleRadio.checked) {
      searchForm.action = "https://www.google.hk/search";
    } else if (bingRadio.checked) {
      searchForm.action = "https://www.bing.com/search";
    } else if (baiduRadio.checked) {
      searchForm.action = "https://www.baidu.com/search";
    }
}

function mail() {
  window.location.href = "mailto:gugugugugutian@outlook.com?subject=Mail%20from%20personal%20Github%20website";
}

function showSideBar() {
  var sidebar = document.getElementById("sidebar");
  if (sidebar.style.display != "block"){
    sidebar.style.display = "block";
  } 
  else {
    sidebar.style.display = "none";
  }
}
