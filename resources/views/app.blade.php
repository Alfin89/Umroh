<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard | Umroh</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
      
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
  </head>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Sidebar -->
        @include('includes.sidebar')
        <!-- / Sidebar -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Header -->
            @include('includes.header')
          <!-- / Header -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            

            @yield('content')
            <!-- / Content -->

            <!-- Footer -->
            @include('includes.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('assets/vendor/js/sweatealert.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <script>
      (() => {
      'use strict'
    
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')
    
      // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
    
          form.classList.add('was-validated')
        }, false)
      })
    })()
    </script>
    {{-- User Delete --}}
    <script type="text/javascript">
      $(document).ready(function () {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
        
          $('body').on('click', '#delete-user', function () {
            var galeriURL = $(this).data('url');
            var trObj = $(this);

            swal({
              title: "Apakah Anda yakin?",
              text: "User ini akan dihapus secara permanen!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
                  url: galeriURL,
                  type: 'DELETE',
                  dataType: 'json',
                  success: function(data) {
                    swal("Data User Berhasil dihapus!", {
                      icon: "success",
                    });
                    trObj.parents("tr").remove();
                  },
                  error: function(data) {
                    swal("Oops!", "Terjadi kesalahan!", "error");
                  }
                });
              } else {
                swal("Penghapusan user dibatalkan!", {icon: "info"});
              }
            });

          });
      });
    </script>
    {{-- Galeri Delete --}}
    <script type="text/javascript">
      $(document).ready(function () {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
        
          $('body').on('click', '.delete-galeri', function () {
            var galeriURL = $(this).data('url');
            var anchorObj = $(this);
    
            swal({
              title: "Apakah Anda yakin?",
              text: "Gambar ini akan dihapus secara permanen!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
                  url: galeriURL,
                  type: 'DELETE',
                  dataType: 'json',
                  success: function(data) {
                    swal("Gambar berhasil dihapus!", {
                      icon: "success",
                    });
                    anchorObj.parents(".gal").remove();
                  },
                  error: function(data) {
                    swal("Oops!", "Terjadi kesalahan!", "error");
                  }
                });
              } else {
                swal("Penghapusan Gambar dibatalkan!", {icon: "info"});
              }
            });
    
          });
      });
    </script>
    {{-- Paket  Delete --}}
    <script type="text/javascript">
      $(document).ready(function () {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
        
          $('body').on('click', '#delete-paket', function () {
            var galeriURL = $(this).data('url');
            var anchorObj = $(this);
    
            swal({
              title: "Apakah Anda yakin?",
              text: "Gambar ini akan dihapus secara permanen!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
                  url: galeriURL,
                  type: 'DELETE',
                  dataType: 'json',
                  success: function(data) {
                    swal("Gambar berhasil dihapus!", {
                      icon: "success",
                    });
                    anchorObj.parents("tr").remove();
                  },
                  error: function(data) {
                    swal("Oops!", "Terjadi kesalahan!", "error");
                  }
                });
              } else {
                swal("Penghapusan Gambar dibatalkan!", {icon: "info"});
              }
            });
    
          });
      });
    </script>
    {{-- Umroh Delete --}}
    <script type="text/javascript">
      $(document).ready(function () {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
        
          $('body').on('click', '#delete-umroh', function () {
            var umrohURL = $(this).data('url');
            var anchorObj = $(this);
    
            swal({
              title: "Apakah Anda yakin?",
              text: "Data Umroh ini akan dihapus secara permanen!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
                  url: umrohURL,
                  type: 'DELETE',
                  dataType: 'json',
                  success: function(data) {
                    swal("Data Umroh berhasil dihapus!", {
                      icon: "success",
                    });
                    anchorObj.parents("tr").remove();
                  },
                  error: function(data) {
                    swal("Oops!", "Terjadi kesalahan!", "error");
                  }
                });
              } else {
                swal("Penghapusan Data Umroh dibatalkan!", {icon: "info"});
              }
            });
    
          });
      });
    </script>
    {{-- Pendaftran Delete --}}

    <script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('body').on('click', '#delete-daftar', function () {
            var daftarURL = $(this).data('url');
            var anchorObj = $(this);

            swal({
                title: "Apakah Anda yakin?",
                text: "Data Pendaftar ini akan dihapus secara permanen!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: daftarURL,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function(data) {
                            swal("Data Pendaftar berhasil dihapus!", {
                                icon: "success",
                            }).then((result) => {
                                // Refresh halaman setelah menghapus pendaftar
                                location.reload();
                            });
                        },
                        error: function(data) {
                            swal("Oops!", "Terjadi kesalahan!", "error");
                        }
                    });
                } else {
                    swal("Penghapusan Data Pendaftar dibatalkan!", {icon: "info"});
                }
            });

        });
    });
    </script>

    <!-- Place this tag in your head or just before your close body tag. --> 
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
