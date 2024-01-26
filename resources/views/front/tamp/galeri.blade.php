@extends('front.app')

@section('content')
<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Galeri</h2>
        <p>Selamat datang di Galeri Foto Umroh dan Haji, tempat di mana keindahan dan makna perjalanan spiritual terwujud dalam setiap frame. Jelajahi momen-momen suci dan pemandangan yang mengesankan selama pelaksanaan ibadah umroh dan haji. Dari tawaf di sekitar Kabah hingga saat-saat khusyuk di Raudhah, galeri ini menggambarkan kebesaran dan kekhusyukan di tanah suci. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
              @foreach ($galeri as $item)
              <div class="col-lg-3 col-md-12 mb-2"> <!-- modal menmapilkan detail gambar -->
                <div class="card bg-image hover-overlay ripple shadow-1-strong rounded border border-success tombol">
                  <img src="{{ asset('assets/uploads/galeri/'.$item->image) }} " class="card-img-top" alt="...">
                  <div class="card-body">
                    <h6 class="card-text fw-bold text-center text-white">{{ $item->deskripsi }}</h6>
                  </div>
                </div>
              </div>
              @endforeach
              <div class="d-flex justify-content-center mt-3">
                {{ $galeri->links('pagination::bootstrap-4') }}
              </div>
            </div>
    </section><!-- End Trainers Section -->

</main><!-- End #main -->
@endsection