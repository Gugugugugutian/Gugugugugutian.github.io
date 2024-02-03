// 显示所有元素
function displayAll(){
    var nimp = document.getElementById("nimp");
    var imp = document.getElementById("imp");

    imp.style.display = "inline-block"; 
    nimp.style.display = "inline-block"; 
}

// 仅显示重要元素
function displayImportant(){
    var nimp = document.getElementById("nimp");
    var imp = document.getElementById("imp");

    imp.style.display = "inline-block"; 
    nimp.style.display = "none"; 
}