 {{-- massage --}}
 @if (session('success'))
 <div id="alert" style="display: none">
   {{ session('success') }}
 </div>
    <script>
    var div = document.getElementById("alert");
    var myData = div.textContent;
    Swal.fire(
        'Berhasil!',
        myData,
        'success'
        )
    </script>
 @endif
 @if (session('error'))
 <div id="alert" style="display: none">
   {{ session('error') }}
 </div>
    <script>
    var div = document.getElementById("alert");
    var myData = div.textContent;
    Swal.fire(
        'Gagal!',
        myData,
        'error'
        )
    </script> 
 @endif
 @if (session('question'))
 <div id="alert" style="display: none">
   {{ session('question') }}
 </div>
    <script>
    var div = document.getElementById("alert");
    var myData = div.textContent;
    Swal.fire(
        'Yakin?',
        myData,
        'question'
        )
    </script> 
 @endif

 @if (count($errors) > 0) 
    <div id="alert" style="display: none">
        @foreach ($errors->all() as $error)
            {{$error}}<br/>
        @endforeach
    </div>
         <script>
         var div = document.getElementById("alert");
         var myData = div.textContent;
         Swal.fire(
             'Gagal!',
             myData,
             'error'
             )
         </script> 
 @endif

<script>
    $(document).on('click', '#confirm' , function (e) {
    e.preventDefault();
    var link = $(this).attr('href');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            cancelButton: 'btn btn-danger',
            confirmButton: 'btn btn-success'
        },
        buttonsStyling: false
        })

    swalWithBootstrapButtons.fire({
    title: 'Konfirmasi',
    text: 'Apakah Anda Yakin',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Ya, saya yakin!',
    cancelButtonText: 'Tidak',
    reverseButtons: false
    }).then((result) => {
    if (result.isConfirmed) {
        window.location = link;
    } else if (
        result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
        'Dibatalkan',
        'Data Tidak Proses',
        'error'
        )
    }
    }) 
    });
    
</script> 
{{-- massage --}}