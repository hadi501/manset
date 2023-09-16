<aside class="sidebar">
      <div class="toggle">
        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
              <span></span>
            </a>
      </div>
      <div class="side-inner">

        <div class="profile">
          <img src="{{ asset('images/sock.jpg') }}" alt="Image" class="img-fluid">
          <h3 class="name">CV. Ibun</h3>
          <span class="country">Makloon Kaos Kaki</span>
        </div>

        
        <div class="nav-menu">
          <ul>
            <li><a href="{{ route('homeView') }}"><span class="icon-home mr-3"></span>Home</a></li>
            <li><a href="#"><span class="icon-bar-chart mr-3"></span>Dashboard</a></li>

            <li class="accordion">
              <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsible">
                <span class="icon-shopping-cart mr-3"></span>Pre-Order
              </a>
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
                <div>
                  <ul>
                    <li><a href="{{ route('order.index') }}">Home</a></li>
                    <li><a href="{{ route('order.create') }}">Input</a></li>
                    <li><a href="{{ route('order.detail') }}">Detail</a></li>
                    <li><a href="{{ route('order.history') }}">History</a></li>
                  </ul>
                </div>
              </div>
            </li>

            <li class="accordion">
              <a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapsible">
                <span class="icon-gear mr-3"></span>Produksi
              </a>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingOne">
                <div>
                  <ul>
                    <li><a href="{{ route('production.create') }}">Input</a></li>
                    <li><a href="{{ route('production.get.detail') }}">Detail</a></li>
                  </ul>
                </div>
              </div>
            </li>

            <li class="accordion">
              <a href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="collapsible">
                <span class="icon-scissors mr-3"></span>Finishing
              </a>
              <div id="collapseThree" class="collapse" aria-labelledby="headingOne">
                <div>
                  <ul>
                    <li><a href="{{ route('finishing.create') }}">Input</a></li>
                    <li><a href="{{ route('finishing.get.detail') }}">Detail</a></li>
                  </ul>
                </div>
              </div>
            </li>

            <li class="accordion">
              <a href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" class="collapsible">
                <span class="icon-folder mr-3"></span>Data
              </a>
              <div id="collapseFour" class="collapse" aria-labelledby="headingOne">
                <div>
                  <ul>
                    <li><a href="{{ route('employe.create') }}">Karyawan</a></li>
                    <li><a href="{{ route('sock.create') }}">Kaos Kaki</a></li>
                    <li><a href="{{ route('color.create') }}">Warna</a></li>
                  </ul>
                </div>
              </div>
            </li>

            <li><a href="#"><span class="icon-error mr-3"></span>Info</a></li>
            <!-- <li><a href="#"><span class="icon-location-arrow mr-3"></span>Direct</a></li>
            <li><a href="#"><span class="icon-pie-chart mr-3"></span>Stats</a></li>
            <li><a href="#"><span class="icon-sign-out mr-3"></span>Sign out</a></li> -->
          </ul>
        </div>
      </div>
      
    </aside>