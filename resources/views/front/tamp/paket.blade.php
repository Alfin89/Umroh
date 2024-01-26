@extends('front.app')

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Paket Umroh</h2>
        <p>Selamat datang di Layanan Paket Umroh kami, di mana keberkahan perjalanan spiritual Anda menjadi prioritas utama. Kami dengan bangga menyajikan paket umroh yang dirancang dengan cermat untuk memenuhi kebutuhan dan kenyamanan Anda selama menjalani ibadah suci di Tanah Suci.</p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Pricing Section ======= -->
    <main id="main">
            <section style="background-color: #eee;">
              <div class="container py-5" data-aos="fade-up">
                <div class="row justify-content-center">
                  
                  @foreach ($paket as $item)
                  <div class="col-md-8 col-lg-6 col-xl-4 mb-2">
                    <div class="card" style="border-radius: 8px;">
                      <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light"
                        data-mdb-ripple-color="light">
                        <img src="{{ asset('assets/uploads/paket/'.$item->image) }}"
                          style="border-top-left-radius: 8px; border-top-right-radius: 8px;" class="img-fluid"
                          alt="Laptop" />
                        <a href="#!">
                          <div class="mask"></div>
                        </a>
                      </div>
                      <hr class="my-0" />
                      <div class="card-body pb-0">
                        <div class="text-center">
                          <h5 class="card-title">{{ $item->title }}</h5>
                          <p class="text-muted mb-1">{{ $item->deskripsi }}</p>
                        </div>
                        <div class="d-flex justify-content-between text-sm">
                          <i class='bx bx-calendar'> Pemberangkatan</i>
                          <p class="text-dark small text-sm">{{ \Carbon\Carbon::parse($item->keberangkatan)->isoFormat('dddd, D MMMM Y') }}</p>
                        </div>
                        <div class="d-flex justify-content-between text-sm">
                          <i class='bx bx-purchase-tag-alt' > Harga Mulai</i>
                          <p class="text-dark small text-sm">{{ number_format($item->harga, 2, ',', '.') }} Juta</p>
                        </div>
                        <div class="d-flex justify-content-between text-sm">
                          <i class='bx bx-user-check'> Jumlah Jamaah</i>
                          <p class="text-dark small text-sm">{{ $item->jumlah }} Orang</p>
                        </div>
                        <p class="small text-muted">Arfa Travel & Tour</p>
                      </div>
                      <hr class="my-0" />
                      <div class="card-body " style="background-color: #7ed899">
                        <div class="d-flex justify-content-center align-items-center">
                          <a href="https://api.whatsapp.com/send/?phone=%2B19288513265&text=assalamu%27alaikum+saya+tertarik+mengikuti+umroh+dan+haji+bersama+Arfa&type=phone_number&app_absent=0" class="tombol btn text-white" style="font-size: 24px;">
                            <i class='bx bxl-whatsapp me-2'></i>Chat Sekarang
                          </a>                        
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
          </section>
    </main>
@endsection