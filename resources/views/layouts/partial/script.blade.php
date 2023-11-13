{{-- jquery cdn  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- toaster cdn  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- sweetalert cdn  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
           swal({
             title: "Are you Want to delete?",
             text: "Once Delete, This will be Permanently Delete!",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
           .then((willDelete) => {
             if (willDelete) {
                  window.location.href = link;
             } else {
               swal("Safe Data!");
             }
           });
       });
</script>
{{-- before  logout showing alert message --}}
<script>
    $(document).on("click", "#logout", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
           swal({
             title: "Are you Want to logout?",
             text: "",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
           .then((willDelete) => {
             if (willDelete) {
                  window.location.href = link;
             } else {
               swal("Not Logout!");
             }
           });
       });
</script>
<script>
@if(Session::has('messege'))
 var type="{{Session::get('alert-type','info')}}"
 switch(type){
     case 'info':
          toastr.info("{{ Session::get('messege') }}");
          break;
     case 'success':
         toastr.success("{{ Session::get('messege') }}");
         break;
     case 'warning':
        toastr.warning("{{ Session::get('messege') }}");
         break;
     case 'error':
         toastr.error("{{ Session::get('messege') }}");
         break;
       }
@endif
</script>

  <!-- Required vendors -->
  <script src="{{ asset('backend') }}/vendor/global/global.min.js"></script>
  <script src="{{ asset('backend') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
  <script src="{{ asset('backend') }}/vendor/chart.js/Chart.bundle.min.js"></script>
  <script src="{{ asset('backend') }}/js/custom.min.js"></script>
  <script src="{{ asset('backend') }}/js/deznav-init.js"></script>
  <script src="{{ asset('backend') }}/vendor/owl-carousel/owl.carousel.js"></script>

  <!-- Chart piety plugin files -->
  <script src="{{ asset('backend') }}/vendor/peity/jquery.peity.min.js"></script>

  <!-- Apex Chart -->
  <script src="{{ asset('backend') }}/vendor/apexchart/apexchart.js"></script>

  <!-- Dashboard 1 -->
  <script src="{{ asset('backend') }}/js/dashboard/dashboard-1.js"></script>
      <!-- Datatable -->
      <script src="{{ asset('backend') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
      <script src="{{ asset('backend') }}/js/plugins-init/datatables.init.js"></script>
  <script>
      function carouselReview(){
          /*  testimonial one function by = owl.carousel.js */
          jQuery('.testimonial-one').owlCarousel({
              loop:true,
              autoplay:true,
              margin:30,
              nav:false,
              dots: false,
              left:true,
              navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
              responsive:{
                  0:{
                      items:1
                  },
                  484:{
                      items:2
                  },
                  882:{
                      items:3
                  },
                  1200:{
                      items:2
                  },

                  1540:{
                      items:3
                  },
                  1740:{
                      items:4
                  }
              }
          })
      }
      jQuery(window).on('load',function(){
          setTimeout(function(){
              carouselReview();
          }, 1000);
      });
  </script>
  {{-- select 2 cdn  --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- summer note  --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    {{-- dropify  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   {{-- select tags  --}}
   <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js" integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script>

    @yield('footer_script')
  </body>
  </html>
