<div class="main-sidebar" style="background: #191970 !important" class="warna">        
  <aside id="sidebar-wrapper">
          <div class="sidebar-brand">

         <center><img src="{{asset('assets/img/logo.jpg')}}" class="img-responsive" style="margin-left: auto;width:30%;">
          <p href="index.html" class="text-white" style="font-size: 20px;"><bold>Akta Kematian Kota Payakumbuh</p></bold>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"></a>
          </div>

          <ul class="sidebar-menu">
              <li class="nav-item">
                <a href="{{ route('kecamatan.index') }}" class="nav-link"><i class="fas fa-columns"></i> <span>Data Kecamatan</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kelurahan.index') }}" class="nav-link"><i class="fas fa-columns"></i> <span>Data Kelurahan</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('datakematian.index') }}" class="nav-link"><i class="fas fa-columns"></i> <span>Data Kematian</span></a>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Rekap Data Kematian</span></a>
                <ul class="dropdown-menu">
                  @php
                    $kecamatans = \App\Kecamatan::get();    
                  @endphp
                  @foreach($kecamatans as $kecamatan)
                    <li>
                      <a href="{{ route('rekap.kematian.index', $kecamatan->id) }}" class="nav-link"><span>Data {{ $kecamatan->nama }}</span></a>
                    </li>
                  @endforeach
                </ul
              </li>
          </ul>
            </div>
        </aside>
      </div>