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
