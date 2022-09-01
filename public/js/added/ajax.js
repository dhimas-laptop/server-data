$(document).ready(function(){
    $("#formbibit").submit(function(e) {
    e.preventDefault();
    const params ={
        "nama" : $('#nama').val(),
        "jenis" : $('#jenis').val(),
        "jumlah" : $('#jumlah').val(),
        }

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "https://bibit.bpdas-sjd.id/API/bibit");
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(params);
        xhr.addEventListener("load", () => {
          console.log(xhr.responseText);
        });
    });
});
