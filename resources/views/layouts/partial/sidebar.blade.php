{{-- <div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-381-networking"></i>
                <span class="nav-text">Category Setting</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('category') }}">Category</a></li>
                <li><a href="">Brand</a></li>
                <li><a href="">Category Trashed</a></li>
            </ul>
        </li>
        <li class="mm-active"><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
            <i class="flaticon-381-controls-3"></i>
            <span class="nav-text">Charts</span>
        </a>
        <ul aria-expanded="false" class="mm-collapse mm-show" style="">
            <li><a href="./chart-flot.html">Flot</a></li>
            <li><a href="./chart-morris.html">Morris</a></li>
            <li><a href="./chart-chartjs.html">Chartjs</a></li>
            <li><a href="./chart-chartist.html">Chartist</a></li>
            <li><a href="./chart-sparkline.html">Sparkline</a></li>
            <li><a href="./chart-peity.html">Peity</a></li>
        </ul>
    </li>
        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-381-networking"></i>
            <span class="nav-text">Subcategory Setting</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="">Subcategory</a></li>
            <li><a href="">Subcategory Trashed</a></li>
        </ul>
        </li>
        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-381-heart"></i>
            <span class="nav-text">Product Setting</span>
        </a>
        <ul aria-expanded="false" class="mm-collapse">
            <li><a href="">All Product</a></li>
            <li><a href="">Add New Product</a></li>
            <li><a href="">Add Size & Color</a></li>

        </ul>
    </li>
        </ul>

        <div class="copyright">
            <p><strong>Gymove Fitness Admin Dashboard</strong> © 2020 All Rights Reserved</p>
            <p>Made with <span class="heart"></span> by DexignZone</p>
        </div>
    </div>
</div> --}}
<div class="deznav">
    <div class="deznav-scroll mm-active ps ps--active-y">
        <ul class="metismenu mm-show" id="menu">
            <li class=""><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class=""><a class="" href="{{ route('newsletter') }}" aria-expanded="false">
                <i class="flaticon-381-networking"></i>
                <span class="nav-text">Subscriber</span>
            </a>
        </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-controls-3"></i>
                    <span class="nav-text">Manage Category</span>
                </a>
                <ul aria-expanded="false" class="mm-collapse">
                    <li><a href="{{ route('category') }}">Add New Category</a></li>
                    <li><a href="{{ route('brand') }}">Add Brand</a></li>
                    <li><a href="{{ route('subcategory') }}">Add New Subcategory</a></li>
                    <li><a href="{{ route('category.trash') }}">Trashed Category</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-internet"></i>
                    <span class="nav-text">Manage Product</span>
                </a>
                <ul aria-expanded="false" class="mm-collapse">
                    <li><a href="{{ route('product') }}">Add New Product</a></li>
                    <li><a href="{{ route('all.product') }}">All Product</a></li>
                    <li><a href="{{ route('color.size') }}">Add Size & Color</a></li>

                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-heart"></i>
                    <span class="nav-text">Upcomming Offer</span>
                </a>
                <ul aria-expanded="false" class="mm-collapse">
                    <li><a href="{{ route('upcomming.offer') }}">Offers</a></li>
                    <li><a href="{{ route('newyear.offer') }}">New Year Offer</a></li>

                </ul>
            </li>

            {{-- logo --}}
            <li>
                <a class="" href="{{ route('logo') }}" aria-expanded="false">
                    <i class="flaticon-381-heart"></i>
                    <span class="nav-text">Logo</span>
                </a>
            </li>


            <li><a href="{{ route('scoial') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Social Media</span>
                </a>
            </li>
             {{--  <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">Forms</span>
                </a>
                <ul aria-expanded="false" class="mm-collapse">
                    <li><a href="./form-element.html">Form Elements</a></li>
                    <li><a href="./form-wizard.html">Wizard</a></li>
                    <li><a href="./form-editor-summernote.html">Summernote</a></li>
                    <li><a href="form-pickers.html">Pickers</a></li>
                    <li><a href="form-validation-jquery.html">Jquery Validate</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-network"></i>
                    <span class="nav-text">Table</span>
                </a>
                <ul aria-expanded="false" class="mm-collapse">
                    <li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
                    <li><a href="table-datatable-basic.html">Datatable</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Pages</span>
                </a>
                <ul aria-expanded="false" class="mm-collapse">
                    <li><a href="./page-register.html">Register</a></li>
                    <li><a href="./page-login.html">Login</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                        <ul aria-expanded="false" class="mm-collapse">
                            <li><a href="./page-error-400.html">Error 400</a></li>
                            <li><a href="./page-error-403.html">Error 403</a></li>
                            <li><a href="./page-error-404.html">Error 404</a></li>
                            <li><a href="./page-error-500.html">Error 500</a></li>
                            <li><a href="./page-error-503.html">Error 503</a></li>
                        </ul>
                    </li>
                    <li><a href="./page-lock-screen.html">Lock Screen</a></li>
                </ul>
            </li> --}}
        </ul>

        <div class="copyright">
            <p><strong>Gymove Fitness Admin Dashboard</strong> © 2020 All Rights Reserved</p>
            <p>Made with <span class="heart"></span> by DexignZone</p>
        </div>
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 762px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 537px;"></div></div></div>
</div>
