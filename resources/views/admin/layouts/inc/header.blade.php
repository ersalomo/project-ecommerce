 <div class="navbar-expand-md">
     <div class="collapse navbar-collapse" id="navbar-menu">
         <div class="navbar navbar-light">
             <div class="container">
                 <ul class="navbar-nav">
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('admin.home-admin') }}#">
                             <span class="nav-link-icon d-md-none d-lg-inline-block">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                     <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                     <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                     <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                 </svg>
                             </span>
                             <span class="nav-link-title">
                                 Home
                             </span>
                         </a>
                     </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="{{ route('admin.home-admin') }}"
                             data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                             aria-expanded="false">
                             <span class="nav-link-icon d-md-none d-lg-inline-block">

                                 <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                     <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                     <rect x="4" y="4" width="16" height="16" rx="2" />
                                     <line x1="4" y1="10" x2="20" y2="10" />
                                     <line x1="10" y1="4" x2="10" y2="20" />
                                 </svg>
                             </span>
                             <span class="nav-link-title">
                                 All Tables
                             </span>
                         </a>
                         <div class="dropdown-menu">
                             <div class="dropdown-menu-columns">
                                 <div class="dropdown-menu-column">
                                     <a class="dropdown-item" href="{{ route('admin.list-products') }}">
                                         Products
                                     </a>
                                     <a class="dropdown-item" href="{{ route('admin.data-carts') }}">
                                         Cart
                                     </a>
                                     <a class="dropdown-item" href="{{ route('admin.data-transactions') }}">
                                         Transaction
                                     </a>
                                     <a class="dropdown-item" href="{{ route('admin.detail-transaction') }}">
                                         Detail Transaction
                                     </a>
                                 </div>

                             </div>
                         </div>
                     </li>

                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown"
                             data-bs-auto-close="outside" role="button" aria-expanded="false">
                             <span class="nav-link-icon d-md-none d-lg-inline-block">
                                 <!-- Download SVG icon from http://tabler-icons.io/i/users -->
                                 <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                     <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                     <circle cx="9" cy="7" r="4" />
                                     <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                     <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                     <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                 </svg>
                             </span>
                             <span class="nav-link-title">
                                 Data Users
                             </span>
                         </a>
                         <div class="dropdown-menu">
                             <a class="dropdown-item" href="{{ route('admin.all-users') }}">
                                 Users
                             </a>
                         </div>
                     </li>


                 </ul>
                 <div class="navbar-nav flex-row order-md-last">
                     <div class="nav-item dropdown">
                         <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                             aria-label="Open user menu">
                             <span class="avatar avatar-sm"
                                 style="background-image: url({{ asset('bootstrap/asset/admin.png') }})"></span>
                             <div class="d-none d-xl-block ps-2">
                                 <div>{{ Auth::guard('admin')->user()->name }}</div>
                                 <div class="mt-1 small text-muted">{{ Auth::guard('admin')->user()->email }}</div>
                             </div>
                         </a>
                         <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                             <a class="dropdown-item">Set status</a>
                             <a class="dropdown-item">Profile & account</a>
                             <a class="dropdown-item">Feedback</a>
                             <div class="dropdown-divider"></div>
                             <a class="dropdown-item">Settings</a>
                             <form action="{{ route('admin.logout') }}" method="post" class="dropdown-item">
                                 @csrf
                                 <input type="submit" class=" btn btn-danger btn-md" value="Logout" />
                             </form>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
