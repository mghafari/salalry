  <!--**********************************
            Header start
        ***********************************-->
  <div class="header">
      <div class="header-content">
          <nav class="navbar navbar-expand">
              <div class="collapse navbar-collapse justify-content-between">


                  <ul class="navbar-nav header-right">
                      <li class="nav-item dropdown notification_dropdown">
                          <a class="nav-link bell dz-fullscreen" href="#">
                              <svg id="icon-full" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor"
                                  stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                  class="css-i6dzq1">
                                  <path
                                      d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                                  </path>
                              </svg>
                              <svg id="icon-minimize" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                  class="feather feather-minimize">
                                  <path
                                      d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3">
                                  </path>
                              </svg>
                          </a>
                      </li>

                      <li class="nav-item dropdown header-profile">
                          <a class="nav-link" href="#" role="button" data-toggle="dropdown">

                              <div class="header-info">


                              </div>
                          </a>

                      </li>

                      <li class="nav-item right-sidebar">
                          <a class="nav-link bell ai-icon" href="#">
                              <svg id="icon-menu" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                  stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                  class="css-i6dzq1">
                                  <rect x="3" y="3" width="7" height="7"></rect>
                                  <rect x="14" y="3" width="7" height="7"></rect>
                                  <rect x="14" y="14" width="7" height="7"></rect>
                                  <rect x="3" y="14" width="7" height="7"></rect>
                              </svg>
                          </a>
                      </li>
                      <li>
                      </li>
                  </ul>
              </div>
          </nav>
          <span>سلام, <strong style="color: darkblue"> {{  \Illuminate\Support\Facades\Auth::user()->name() ?? ''}} </strong></span>

      </div>
  </div>
