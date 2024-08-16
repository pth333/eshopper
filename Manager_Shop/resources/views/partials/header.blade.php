  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <div class="col-md-12" style="display: flex; justify-content: space-between;">
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                  <a href="index3.html" class="nav-link">Home</a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                  <a href="#" class="nav-link">Contact</a>
              </li>
          </ul>
          <ul class="navbar-nav" style="margin-right: 50px;">
              <div class="dropdown">
                  <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ Auth::user()->name}}
                  </a>

                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('profile.edit')}}">Profile</a></li>
                      <li>
                          <form method="POST" action="{{ route('logout') }}">
                              @csrf

                              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" style="display: inline-block; width: 100%; text-align: left; padding: 0.5rem 1rem; border: none; background: none; color: #212529; text-decoration: none;">Log Out</a>
                          </form>
                      </li>
                  </ul>
              </div>
          </ul>
      </div>
  </nav>

  <script>
      document.addEventListener("DOMContentLoaded", function() {
          document.querySelector('.dropdown-toggle').addEventListener('click', function() {
              const dropdownMenu = document.querySelector('.dropdown-menu');
              dropdownMenu.classList.toggle('show');
          });
      });
  </script>
