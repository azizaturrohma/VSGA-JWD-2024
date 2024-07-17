function validateForm() {
    // form name & input name
    let x = document.forms["bookForm"]["pengarang"].value;
    if (x == "") {
        alert("Kolom wajib diisi");
        return false;
    }
}

function updateTotal() {
    let harga = document.getElementById("harga").value;
    let jumlah = document.getElementById("jumlah").value;

    let total = harga * jumlah;

    document.getElementById("total").value = total;
}