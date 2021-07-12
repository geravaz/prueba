<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Test</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body>

  <div class="container">
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">
      <img class="mr-3" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-outline.svg" alt="" width="48" height="48">
      <div class="lh-100">
        <h6 class="mb-0 text-white lh-100">Posts</h6>
        <small>Julio 2021</small>
      </div>
    </div>
    <div class="col-12" id="contenidos">
      

    </div>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>  
  <script>
   $( document ).ready(function() {

          fetch('https://jsonplaceholder.typicode.com/posts?userId=1')
          .then(response => response.json())
          .then(json => {

            for (x of json) {
                $("#contenidos").append(`<div id="post-${x.id}" class="col-12"><h3 class="border-bottom border-gray pb-2 mb-0">${x.title}</h3>
                   <p class="parrafo-1"> ${x.body}</p> <div class="comentarios"></div>
                   <small class="d-block text-right mt-3">
                    <a class="btn-add" data-post="${x.id}" href="agregar-comentario.php?post=${x.id}">Agregar comentario</a>
                   </small></div><br><br><br>`);
                fetch('https://jsonplaceholder.typicode.com/posts/'+x.id+'/comments')
                .then(response => response.json())
                .then(json => {
                  for (y of json) {
                    area = '#post-'+y.postId+' .comentarios';
                      $(area).append(
                       `<div class="media text-muted pt-3" id="coment-${y.id}">
                        <div class="acciones">
                          <a class="delete" data-coment="${y.id}"  href="verificar.php?post=${y.id}"><img src="img/delete.svg" class="img-fluid"></a>
                          <a class="edit" data-coment="${y.id}"  href="update-comentario.php?post=${y.id}"><img src="img/edit.svg"  class="img-fluid"></a>
                        </div>
                        <img data-src="https://picsum.photos/32/32" alt="32x32" class="mr-2 rounded" style="width: 32px; height: 32px;" src="https://picsum.photos/id/${y.id}/32/32" data-holder-rendered="true">
                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                          <strong class="d-block text-gray-dark"><span class="name">${y.name}</span> - <span class="email">${y.email}</span></strong>
                          <span class="body">${y.body}</span>
                        </p>
                      </div>`
                      );
                    }
                });
                
              }

          });

          $('body').on('click', '.btn-add', function(e){
            e.preventDefault();

            value = $(this).data('link');
            if(!value) {
              value = $(this).attr('href');
            }
              $.magnificPopup.open({
                  items: {
                      src: value,
                  },
                  type: 'ajax',
                  modal: false,
                  callbacks: {
              ajaxContentAdded: function() {
                
              },
            }
            });
          });

          $('body').on('click', '.edit', function(e){
            e.preventDefault();
            coment = $(this).data('coment');
            name = $(`body #coment-${coment} .name`).html();
            email = $(`body #coment-${coment} .email`).html();
            body = $(`body #coment-${coment} .body`).html();
            value = $(this).data('link');
            if(!value) {
              value = $(this).attr('href');
            }
              $.magnificPopup.open({
                  items: {
                      src: value,
                  },
                  ajax: {
                    settings: {
                      type: 'POST',
                      data: {
                        name:name,
                        email:email,
                        body:body
                      }
                    }
                  },
                  type: 'ajax',
                  modal: false,
                  callbacks: {
              ajaxContentAdded: function() {
                
              },
            }
            });
          });

          $('body').on('click',".btn-send",function(e) {
            e.preventDefault();
            postid = $('.postid').val();
            nombre = $('.nombre').val();
            email = $('.email').val();
            descripcion = $('.descripcion').val();
            fetch(`https://jsonplaceholder.typicode.com/posts/${postid}/comments`, {
              method: 'POST',
              body: JSON.stringify({
                "postId": postid,
                "name": nombre,
                "email": email,
                "body": descripcion
              }),
              headers: {
                'Content-type': 'application/json; charset=UTF-8',
              },
            })
            .then((response) => response.json())
            .then((json) => {
              area = '#post-'+json.postId+' .comentarios';
                      $(area).append(
                       `<div class="media text-muted pt-3" id="coment-${json.id}">
                        <div class="acciones">
                        <a class="delete" data-coment="${json.id}"  href="verificar.php?post=${json.id}"><img src="img/delete.svg" class="img-fluid"></a>
                          <a class="edit" data-coment="${json.id}"  href="update-comentario.php?post=${json.id}"><img src="img/edit.svg"  class="img-fluid"></a>
                        </div>
                        <img data-src="https://picsum.photos/32/32" alt="32x32" class="mr-2 rounded" style="width: 32px; height: 32px;" src="https://picsum.photos/id/${json.id}/32/32" data-holder-rendered="true">
                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark"><span class="name">${json.name}</span> - <span class="email">${json.email}</span></strong>
                          <span class="body">${json.body}</span>
                        </p>
                      </div>`
                      );
                      $.magnificPopup.close();
            });

          });

          $('body').on('click', '.delete', function(e){
            e.preventDefault();

            value = $(this).data('link');
            if(!value) {
              value = $(this).attr('href');
            }
              $.magnificPopup.open({
                  items: {
                      src: value,
                  },
                  type: 'ajax',
                  modal: false,
                  callbacks: {
              ajaxContentAdded: function() {
                
              },
            }
            });
          });

         
          $('body').on('click', '.btn-verificar', function(e){
            e.preventDefault();
            postid = $('.postid').val();
             fetch(`https://jsonplaceholder.typicode.com/comment/${postid}`, {
                method: 'DELETE',
              }); 
            $('#coment-'+postid).remove();  
            $.magnificPopup.close();
          });


          $('body').on('click', '.btn-update', function(e){
            e.preventDefault();
            postid = $('.postid').val();
            nombre = $('.nombre').val();
            email = $('.email').val();
            descripcion = $('.descripcion').val();
            fetch(`https://jsonplaceholder.typicode.com/comments/${postid}`, {
              method: 'PUT',
              body: JSON.stringify({
                "postId": postid,
                "name": nombre,
                "email": email,
                "body": descripcion
              }),
              headers: {
                'Content-type': 'application/json; charset=UTF-8',
              },
            })
            .then((response) => response.json())
            .then((json) => {
             
              $(`#coment-${json.id} .name`).html(json.name);
              $(`#coment-${json.id} .email`).html(json.email);
              $(`#coment-${json.id} .body`).html(json.body);
                      $.magnificPopup.close();
            })
            .catch(error => {
              $(`#coment-${postid} .name`).html(nombre);
              $(`#coment-${postid} .email`).html(email);
              $(`#coment-${postid} .body`).html(descripcion);
                      $.magnificPopup.close();
            });


          });

          
          $('body').on('click',".btn-cancel",function(e) {
            e.preventDefault();
            $.magnificPopup.close();
          });


       /*  fetch('https://jsonplaceholder.typicode.com/posts/1', {
          method: 'PUT',
          body: JSON.stringify({
            id: 1,
            title: 'foo',
            body: 'bar',
            userId: 1,
          }),
          headers: {
            'Content-type': 'application/json; charset=UTF-8',
          },
        })
          .then((response) => response.json())
          .then((json) => console.log(json)); */


   
    });
  </script>
</body>

</html>
