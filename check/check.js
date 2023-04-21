//通过提示窗口完成报错
function falseReport(text = "") {
    if (text == "") text = "Coming soon..."
    alert(text);
}

//读取最近五条打卡记录
function loadRecentRecords(){

}

//更多功能对应的对话框显示和关闭
function showEnquiry() {
    const dialogEnquire = document.getElementById("d_enquire");
    dialogEnquire.showModal();
}
function showAccount() {
    const dialogAccount = document.getElementById("d_account");
    dialogAccount.showModal();
}
function showSign() {
    const dialogSign = document.getElementById("d_sign");
    dialogSign.showModal();
}
function closeEnquire() {
    const dialogEnquire = document.getElementById("d_enquire");
    dialogEnquire.close();
}
function closeAccount() {
    const dialogAccount = document.getElementById("d_account");
    dialogAccount.close();
}
function closeSign() {
    const dialogSign = document.getElementById("d_sign");
    dialogSign.close();
}