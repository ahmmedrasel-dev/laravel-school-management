  @include('backend.header.header')
  @include('backend.sidebar.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
  @include('backend.footer.footer')
  
  @include('backend.header.top-manu')
   
</div>
<!-- ./wrapper -->
  	
	 
	<!-- Vendor JS -->
	<script src="{{ asset('backend/assets/') }}/js/vendors.min.js"></script>
  <script src="{{ asset('backend/assets/') }}/icons/feather-icons/feather.min.js"></script>	
	<script src="{{ asset('backend/assets/') }}/vendor_components/easypiechart/dist/jquery.easypiechart.js"></script>
	<script src="{{ asset('backend/assets/') }}/vendor_components/apexcharts-bundle/irregular-data-series.js"></script>
	<script src="{{ asset('backend/assets/') }}/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>

  {{-- Sweet Alert --}}
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    $(function(){
        // add #delete in anchore tag
        $(document).on('click','#delete',function(e){
            e.preventDefault();
            var link =$(this).attr('href');
            Swal.fire({
            title: 'Are you sure?',
            text: "Remove These Product From Cart!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href=link
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
              }
            });
        });
    });
  </script>

  {{-- Twister Message JS Link --}}
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
      @if(Session::has('message'))
      var type = "{{ Session::get('alert-type','info') }}"
      switch(type){
          case 'info':
          toastr.info(" {{ Session::get('message') }} ");
          break;

          case 'success':
          toastr.success(" {{ Session::get('message') }} ");
          break;

          case 'warning':
          toastr.warning(" {{ Session::get('message') }} ");
          break;

          case 'error':
          toastr.error(" {{ Session::get('message') }} ");
          break; 
      }
      @endif 
  </script>


  <script src="{{ asset('backend/assets/') }}/vendor_components/datatable/datatables.min.js"></script>
	
	<!-- Sunny Admin App -->
  <script src="{{ asset('backend/assets') }}/js/pages/data-table.js"></script>
	<script src="{{ asset('backend/assets/') }}/js/template.js"></script>
	<script src="{{ asset('backend/assets/') }}/js/pages/dashboard.js"></script>
  @yield('footer_js')
	
</body>
</html>