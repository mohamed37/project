
@php $title =null; @endphp
<!-- content -->
<div class="app-content content">
      <!-- right content -->
      <div class="sidebar-right sidebar-sticky">
        <div class="sidebar">
         <div class="pt-2 pr-2">
          <div class="sidebar-content p-1" data-spy="affix" data-offset-top="-77">
           <div class="card">
            <div class="card-header">
                <h6 class="card-title">{{$title}}</h6>
            </div>
            <div class="card-content" aria-expanded="true">
                <div class="card-body">
                    <nav id="sidebar-page-navigation">
                        <ul id="page-navigation-list" class="nav">
                            <li class="nav-item"><a class="nav-link" href="#columns-2-css">{{Route::currentRouteName()}}</a></li>
                            <li class="nav-item"><a class="nav-link" href="#columns-2-html">HTML Markup</a></li>
                            <li class="nav-item"><a class="nav-link" href="#columns-2-pug">Configuration</a></li>
                        </ul>
                    </nav>
                </div>
                <h6 class="border-top-grey border-top-lighten-2 p-1 mt-1 mb-0">
                    <a class="nav-link display-block text-muted" href="#top">Back to top
                        <i class="float-right la la-arrow-circle-o-up font-medium-3"></i>
                    </a>
                </h6>
            </div>
           </div>
          </div>
         </div>

        </div>
      </div>
      <!--end right content -->

      <!--left content -->
      <div class="content-left">
        <div class="content-wrapper">
          <!-- header title -->
          <div class="content-header row">
            
            <div class="content-header-left col-md-6 col-12 mb-1">
              <h2 class="content-header-title">{{$title}}</h2>
            </div>
            
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">{{__('main.home')}}</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">{{request()->segment(2)}}</a>
                  </li>
                  <li class="breadcrumb-item active">{{Route::currentRouteName()}}
                  </li>
                </ol>
              </div>
            </div>
          
          </div>
         <!--end header title -->

         <!-- header content-->
          <div class="content-body">
            <section id="columns-2">
              <!-- CSS Classes -->
              <section id="columns-2-css" class="card">
                  <div class="card-header">
                      <h4 class="card-title">@yield('title')</h4>
                  </div>
                  <div class="card-content" aria-expanded="true">
                      <div class="card-body">
                          <div class="card-text">
                              @yield('explain')
                              <div class="table-responsive">
                                  <table class="table table-hover">
                                     @yield('table')
                                  </table>
                              </div>

                          </div>
                      </div>
                  </div>
              </section>
              <!--/ CSS Classes -->
            </section>
          </div>
         <!--end header content-->
        </div>
      </div>
      <!-- end left content-->
    </div>
<!-- end content -->
