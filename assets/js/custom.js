/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";

var x = $('#hasilTransaksi').val()

if(x == 1){
    swal('Success', 'Data Berhasil Disimpan', 'success');
}
if(x == 2){
    swal('Success', 'Data Berhasil Dihapus', 'warning');
}



