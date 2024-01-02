<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>Bonjour {{$name}}</h1>
   <h3> Vous avez demandé un congé pour le période du {{$d_db}} à {{$d_df}}</h3>
   <p>La demande de votre congé est accépter bon congé</p>
   <a href="{{'http://127.0.0.1:8000/verifier_demande/'.$link }}" class="btn btn-primary">confirmer  </a>
   
    
</body>
</html>