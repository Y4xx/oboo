<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <title>OBOO</title>
</head>
<style>
.btn-pointer{
    height: 150px; 
    width: 150px; 
    margin: auto; 
    margin-bottom: 1rem; 
    display: flow;
}
.logout-form{
    position: absolute;
    top: 1rem;
    right: 2rem;
}
.blur{
    filter: blur(7px);
    transition: filter 0.5s ease-in-out;
}
.text-center {
    transition: filter 0.2s ease-in-out;
}
.profile-img{
    position: relative;
    display: block;
    margin-left: auto;
    margin-right: auto;
    width:140px;
    height:140px;
    z-index:1;
    margin-top: -90px;
}

/*Estilos de la imagen del perfil*/
.img-fluid{
    transition: box-shadow 1s linear;
    cursor:pointer;
}

/*Animacion de la imagen del perfil*/
.img-fluid:hover{
    box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
}

/*Resolucion de pantalla mayor a 576px*/
@media (max-width: 576px){
    .profile-img{
        width:90px;
        height:90px;
        margin-top:-40px;
    }
}   
</style>
<body>

<!-- Section: Design Block -->
<section class="text-center">
    <!-- Background image -->
          <div class="logout-form" >
            <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="mdi mdi-power text-danger"></i> {{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> 
                @csrf
            </form>
          </div>
    <div class="p-5 bg-image" style="
          background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
          height: 200px;
          "></div>

    <!-- Background image -->
    <div class="card mx-4 mx-md-5 shadow-5-strong" style="
          margin-top: -100px;
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
          margin-bottom: 5rem;
          ">
    <div class="profile-img">
        {{-- <img src="https://th.bing.com/th/id/OIP.CbyofhapadSWo3-GT9o4VwHaHa?rs=1&pid=ImgDetMain" --}}
        <img src="{{ asset('images_profile/'.Auth::user()->Employer->photo_profile)}}"
            alt="Profile image" class="img-fluid rounded-circle rounded-circle border border-4 border-white">
            
    </div>
      <div class="card-body py-2 px-md-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h2 class="fw-bold mb-5">Bonjour {{Auth::user()->Employer->fullname}}</h2>
                <div class="row">
                    <div class="col-md-6 mb-4">
                          <button class="btn btn-primary btn-block mb-4 btn-lg" data-bs-toggle="modal" data-bs-target="#modal-1">Pointage</button>
                    </div>
                    <div class="col-md-6 mb-4">
                          <button class="btn btn-primary btn-block mb-4 btn-lg" data-bs-toggle="modal" data-bs-target="#modal-2">Demande Conge</button>
                    </div>
                </div>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
          </div>
        </div>
      </div>
    </div>
  </section>
        <!-- Modal1 -->
        <div class="modal fade" id="modal-1" tabindex="-1">
            <div class="modal-dialog" style="margin-top: 8rem;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pointage</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p style="text-align:justify;"><strong>Hola amigo!!!,</strong> Has decicido ingresar a la
                            maxima
                            comunidad de programación de
                            todo el mundo?. Si tu
                            respuesta es Si, da click en el boton de aceptar para formar parte de nuestro grupo.</p>
                        </div>
                        <form method="post" action="{{ route("pointer")}}">
                            @csrf
                            <input type="hidden" name="idemploye" value="{{Auth::user()->Employer->id}}">
                            <button type="submit" class="btn btn-success btn-lg btn-pointer">Pointer
                                    <svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 512 512">
                                        <style>svg{fill:#ffffff}</style>
                                        <path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/></svg>
                            </button>
                        </form>


                    <div class="modal-footer" >
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        {{-- <a type="button" class="btn btn-primary" href="https://coderwall.com/" target="_blank">Aceptar</a> --}}
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal2 -->
        <div class="modal fade" id="modal-2" tabindex="-1">
            <div class="modal-dialog" style="margin-top: 8rem;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title center">Demande Conge</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="demande_congeé/ajouter">
                        <div class="row container my-2">
                            <div class="form-outline col-md-6">
                                <label class="form-label" for="form2Example1">Date de debut</label>
                                <input type="date" id="form2Example1" class="form-control" name="date_debut" required/>
                            </div>
                
                            <div class="form-outline col-md-6 ">
                                <label class="form-label" for="form2Example2">Date de fin</label>
                                <input type="date" id="form2Example2" class="form-control" name="date_fin" required/>
                            </div>
                            <div class="form-group">
                                <label for="comment">Commentaire</label>
                                <textarea name="comment" class="form-control" id="comment" cols="30" rows="5" required></textarea>
                            </div>

                            <div class="form-outline col-md-12 my-3">
                                <button class="btn btn-primary btn-block btn-lg" type="submit">Demander</button>
                            </div>

                        </div>
                    </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        </div>
                </div>
            </div>
        </div>


        @include('includes.flash')

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script>
$(document).ready(function(){
  // Event handler for when the modal is shown
  $('#modal-1').on('show.bs.modal', function () {
    console.log('Modal 1 is shown');
    $('.text-center').addClass('blur');
  });
  $('#modal-1').on('hidden.bs.modal', function () {
    console.log('Modal is hidden');
    $('.text-center').removeClass('blur');
  });

  $('#modal-2').on('show.bs.modal', function () {
    console.log('Modal 1 is shown');
    $('.text-center').addClass('blur');
  });
  $('#modal-2').on('hidden.bs.modal', function () {
    console.log('Modal is hidden');
    $('.text-center').removeClass('blur');
  });
});
</script>
    </html>
</body>

</html>