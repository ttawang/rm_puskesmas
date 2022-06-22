
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
function tgl_indo(string) {
	bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September' , 'Oktober', 'November', 'Desember'];

	// date = string.split(" ")[0];
	// time = string.split(" ")[1];
    date = string.split('-');
    tanggal = date[2];
    bulan = date[1];
    tahun = date[0];

    // tanggal = date.split("-")[2];
    // bulan = date.split("-")[1];
    // tahun = date.split("-")[0];

    // return tanggal + " " + bulanIndo[Math.abs(bulan)] + " " + tahun + " " + time;
    return tanggal + " " + bulanIndo[Math.abs(bulan)] + " " + tahun;
}
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
function now_date2(){
    var dt = new Date();
    var date = dt.getFullYear()+"-"+("0" + (dt.getMonth() + 1)).slice(-2)+"-"+("0" + dt.getDate()).slice(-2);
    return date;
};
function no_regislab(){
    var dt = new Date();
    var time = "UP-"+dt.getHours() + dt.getMinutes() + dt.getSeconds();

    return time;
};
function no_regisrujuk(noregis){
    var dt = new Date();
    var time = "RJ-"+noregis+"-" +dt.getFullYear()+("0" + (dt.getMonth() + 1)).slice(-2)+("0" + dt.getDate()).slice(-2)+"-" +dt.getHours() + dt.getMinutes() + dt.getSeconds();

    return time;
};
function umur(tgl_lahir){
    var now = now_date2();
    var temp = tgl_lahir;

    hasil = (new Date(now) - new Date(temp)) / 1000/60/60/24/365;
    // hasil = Math.ceil(Math.abs(now - otherDate) / (1000 * 60 * 60 * 24));

    return Math.round(hasil);
}
