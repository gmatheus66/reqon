<!-- Footer -->
<footer class="page-footer font-small stylish-color-dark pt-4 footerClass">

  <!-- Footer Links -->
  <div class="text-center text-md-left">

    <!-- Grid row -->
    <div class="row a">

      <!-- Grid column -->
      <div class="col-md-1 mx-auto">

        <!-- Content -->
        <img class="footerL" src="{{ asset('img/footerImg.png') }}">

    </div>
        <hr class="clearfix w-100 d-md-none">
        <div class="col-md-4 mx-auto">
        
        	<p class="desc">Bem vindo ao ReqOn, o lugar onde você pode solicitar e acompanhar requerimentos online , tudo de forma fácil e gratuita.</p>
        
      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-auto mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4 titleFooter">Links Importantes</h5>

        <ul class="list-unstyled linkFooter">
          <li>
            <a href="{{ url('/') }}">Início</a>
          </li>
          <li>
            <a href="{{ route('register') }}">Cadastro</a>
          </li>
          <li>
            <a href="{{ route('login') }}">Login</a>
          </li>
        </ul>

      </div>
    </div>
    <!-- Grid row -->

  </div>
  

  <!-- Copyright -->
  <div class="inline">
    <img id="logoIF" src="{{ asset('img/logoIF.png') }}">
    <div class="footer-copyright text-center py-3">Todos os direitos reservados - IFPE Campus Igarassu
  </div>

  <!-- Copyright -->

</footer>
<!-- Footer -->