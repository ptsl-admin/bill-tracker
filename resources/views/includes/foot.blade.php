    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/vendor/global/global.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="/js/custom.min.js"></script>
	<script src="/js/deznav-init.js"></script>
	<!-- Apex Chart -->
	<script src="/vendor/apexchart/apexchart.js"></script>    
    
    <!-- Check if there are view specific additional scripts to be loaded -->
    @if ($scripts)
        @foreach($scripts as $script)
            <script src="{{$script['src']}}"></script>
        @endforeach
    @endif

</body>
</html>