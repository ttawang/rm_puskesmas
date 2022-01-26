/* BUATANKU */

//input pada text menjadi angka
function number_only(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

// pencarian pada select tanpa modal
$('.select-cari').select2({
	theme: 'bootstrap4'
});

// pencarian pada select dengan modal
$('.select-cari-modal').select2({
	theme: 'bootstrap4',
	dropdownParent : $('.modal'),
});

function formattanggal(oldDate)
{
   return oldDate.toString().split("-").reverse().join("/");
};
function no_regis(){
    var dt = new Date();
    var time = "REG-"+dt.getHours() + dt.getMinutes() + dt.getSeconds();

    return time;
};
function now_date(){
    var dt = new Date();
    var date =("0" + dt.getDate()).slice(-2) +"/"+ ("0" + (dt.getMonth() + 1)).slice(-2) +"/"+ dt.getFullYear();

    return date;
};
function no_regislab(){
    var dt = new Date();
    var time = "REGUTJ-"+dt.getHours() + dt.getMinutes() + dt.getSeconds();

    return time;
};
function no_regisrujuk(){
    var dt = new Date();
    var time = "0" + dt.getHours() + dt.getMinutes() + "B" + dt.getSeconds() + dt.getMinutes() + "0" + "0" + "0" + dt.getSeconds();

    return time;
};
