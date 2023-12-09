      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
          <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
              <i class="fe fe-x"><span class="sr-only"></span></i>
          </a>
          <nav class="vertnav navbar navbar-light">
              <!-- nav bar -->
              <div class="w-100 mb-4 d-flex">
                  <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="/studentdashboard">
                      <img src="<?= base_url() ?>dashboard/assets/images/logo1.png" alt="...">
                  </a>
              </div>
              <div class="border-bottom"></div>

              <ul class="navbar-nav flex-fill w-100 mb-2">
                  <li class="nav-item dropdown">
                      <a href="/studentdashboard" aria-expanded="false" class="nav-link">
                          <i class="fe fe-home fe-16"></i>
                          <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
                      </a>
                  </li>
              </ul>
              <ul class="navbar-nav flex-fill w-100 mb-2">
                  <li class="nav-item w-100">
                      <a class="nav-link" href="/studentprofile">
                          <i class="fe fe-user fe-16"></i>
                          <span class="ml-3 item-text">My Profile</span>
                      </a>
                  </li>
              </ul>
              <ul class="navbar-nav flex-fill w-100 mb-2">
                  <li class="nav-item w-100">
                      <a class="nav-link" href="/researchpapers">
                          <i class="fe fe-book-open fe-16"></i>
                          <span class="ml-3 item-text">Research Papers</span>
                      </a>
                  </li>
              </ul>
              <ul class="navbar-nav flex-fill w-100 mb-2">
                  <li class="nav-item w-100">
                      <a class="nav-link" href="bookmarks">
                          <i class="fe fe-bookmark"></i>
                          <span class="ml-3 item-text">Bookmarks</span>
                      </a>
                  </li>
              </ul>
              <ul class="navbar-nav flex-fill w-100 mb-2">
                  <li class="nav-item w-100">
                      <a class="nav-link" href="archive">
                          <i class="fe fe-archive fe-16"></i>
                          <span class="ml-3 item-text">Archive</span>
                      </a>
                  </li>
              </ul>
              <div class="btn-box w-100 mt-4 mb-1">
                  <a href="/insertresearch" style="background-color: #b06dff; color: white; border: none;" class="btn mb-2 btn-lg btn-block">
                      <i class="fe fe-shopping-cart fe-12 mx-2"></i><span class="small">Add a Paper</span>
                  </a>
              </div>

          </nav>
      </aside>