<div class="main-sidebar" style="background: #191970 !important" class="warna">        
  <aside id="sidebar-wrapper">
          <div class="sidebar-brand">

         <center><img src="{{asset('public/assets/img/logo.jpg')}}" class="img-responsive" style="margin-left: auto;width:30%;">
          <p href="index.html" class="text-white" style="font-size: 20px;"><bold>Akta Kematian Kota Payakumbuh</p></bold>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"></a>
          </div>

          <ul class="sidebar-menu">
              <li class="nav-item dropdown">
                <br></br>
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data kematian</span></a>
                <ul class="dropdown-menu">
                  
                  <a href="{{ route('baratkecamatan.index')}}" class="nav-link"><i class="fas fa-list"></i> <span>Kecamatan barat</span></a>
                  <a href="{{ route('Utarakecamatan.index')}}" class="nav-link"><i class="fas fa-list"></i> <span>Kecamatan utara</span></a>
                  <a href="{{ route('Timurkecamatan.index')}}" class="nav-link"><i class="fas fa-list"></i> <span>Kecamatan timur</span></a>
                  <a href="{{ route('latinakecamatan.index')}}" class="nav-link"><i class="fas fa-list"></i> <span>Kecamatan latina</span></a>
                  <a href="{{ route('selatankecamatan.index')}}" class="nav-link"><i class="fas fa-list"></i> <span>Kecamatan selatan</span></a>



                       </ul>

              </li>
                </ul>
              </li>
            </div>
        </aside>
      </div>