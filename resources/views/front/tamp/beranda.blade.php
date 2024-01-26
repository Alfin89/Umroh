@extends('front.app')

@section('content')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Pengalaman Umroh<br>bersama Arfa Travel & Tour</h1>
      <h2>Pusat informasi arfa travel & tour berkantor di pondok pesantren Miftahul ulum Al Baidhowiyah Bira timur Sokobanah sampang, memberikan pelayanan yang baik dan cocok untuk kelas menengah kebawah karena mempunyai visi dan misi membantu para calon tamu Allah dengan biaya yang sangat ekonomis, perjalan umroh dan haji ini di supported oleh SMH</h2>
      <a href="{{ route('home.pendaftran') }}" class="btn-get-started">Daftar Sekarang</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="{{ asset('assets/front/img/about.jpeg') }}" class="img-fluid img-thumbnail" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h2>Tentang Kami</h2>
            <h3>
                Sekilas mengenai Arfa Travel & Tour
            </h3>
            <p>            
              Pusat informasi Arfa Travel & Tour, berlokasi di Pondok Pesantren Miftahul Ulum Al Baidhowiyah, Bira Timur, Sokobanah, Sampang, menyediakan layanan perjalanan umroh dan haji dengan pelayanan yang baik. Cocok untuk kelas menengah ke bawah, kami memiliki visi dan misi membantu calon tamu Allah dengan biaya yang sangat ekonomis. Didukung oleh Solusi Mekkah Haromain (SMH), Arfa Travel & Tour berkomitmen menyelenggarakan perjalanan berkualitas tinggi, nyaman, dan aman. Visi dan misi kami mendorong menjadi mitra terpercaya dalam mewujudkan impian umat Islam menunaikan ibadah umroh dan haji. Dengan biaya yang ekonomis, Arfa Travel & Tour menjadikan perjalanan ke tanah suci lebih terjangkau bagi kelas menengah ke bawah, meneguhkan posisinya sebagai pilihan utama untuk layanan perjalanan yang terjangkau dan berkualitas.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
    <!--- fasilitas -->
    <section id="fasilitas">
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-12">
            <h2 class="font-weight-bold fc-grey">Fasilitas Kami</h2>
          </div>
        </div>
        <div class="row text-center my-5">
          <div class="col-lg-3 col-md-3 col-6">
            <div class="facility">
              <div class="img-facility py-3">
                <img src="{{ asset('assets/front/img/paket/air-freight.png') }}" class="img-fluid">
              </div>
              <div class="span-facility mt-2">
                <span>Tiket Pesawat</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-6">
            <div class="facility">
              <div class="img-facility py-3">
                <img src="{{ asset('assets/front/img/paket/hotel.png') }}" class="img-fluid">
              </div>
              <div class="span-facility mt-2">
                <span>Hotel Dekat Masjid</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-6">
            <div class="facility">
              <div class="img-facility py-3">
                <img src="{{ asset('assets/front/img/paket/dish.png') }}" class="img-fluid">
              </div>
              <div class="span-facility mt-2">
                <span>Makan 3x Sehari</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-6">
            <div class="facility">
              <div class="img-facility py-3">
                <img src="{{ asset('assets/front/img/paket/visa.png') }}" class="img-fluid">
              </div>
              <div class="span-facility mt-2">
                <span>Visa Umroh</span>
              </div>
            </div>
          </div>
          <!-- </div> -->
          <!-- <div class="row text-center my-5"> -->
          <div class="col-lg-3 col-md-3 col-6">
            <div class="facility">
              <div class="img-facility py-3">
                <img src="{{ asset('assets/front/img/paket/bus.png') }}" class="img-fluid">
              </div>
              <div class="span-facility mt-2">
                <span>Bus AC</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-6">
            <div class="facility">
              <div class="img-facility py-3">
                <img src="{{ asset('assets/front/img/paket/islamic-friday-prayer.png') }}" class="img-fluid">
              </div>
              <div class="span-facility mt-2">
                <span>Bimbingan Manasik</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-6">
            <div class="facility">
              <div class="img-facility py-3">
                <img src="{{ asset('assets/front/img/paket/hunter.png') }}" class="img-fluid">
              </div>
              <div class="span-facility mt-2">
                <span>Guide Handal</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-6">
            <div class="facility">
              <div class="img-facility py-3">
                <img src="{{ asset('assets/front/img/paket/water.png') }}" class="img-fluid">
              </div>
              <div class="span-facility mt-2">
                <span>Air Zam-Zam</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row text-center justify-content-center my-5">
  
          <div class="col-lg-3 col-md-4 col-6">
            <div class="facility">
              <div class="img-facility py-3">
                <img src="{{ asset('assets/front/img/paket/tax.png') }}" class="img-fluid">
              </div>
              <div class="span-facility mt-2">
                <span>Airport Tax</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <div class="facility">
              <div class="img-facility py-3">
                <img src="{{ asset('assets/front/img/paket/itinerary.png') }}" class="img-fluid">
              </div>
              <div class="span-facility mt-2">
                <span>City Tour</span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <div class="facility">
              <div class="img-facility py-3">
                <img src="{{ asset('assets/front/img/paket/luggage.png') }}" class="img-fluid">
              </div>
              <div class="span-facility mt-2">
                <span>Bagasi 20Kg</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- End #main -->
@endsection